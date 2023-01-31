<?php

// $url = 'https://webhook.kvin.online/607e706b80aeb0714834b7a02da701aa'; // set webhook url
// $debug = false;
// $post = [
//     'contact'       => [
//         'name'          => '',
//         'phone'         => '',
//         'email'         => '',
//         'profile'       => [], // add form fields
//     ],
//     'lead'          => [], // amount, currency, profile
//     'touch'         => [], // touch_id, site_url, user_ip
// ];
// $koWebhookLeads = new KoWebhookLeads($url, $debug);
// $koWebhookLeads->postData($post);



class KoWebhookLeads {
    private $server_url_template = 'https://webhook.kvin.online/{hash}';
    private $server_url = '';
    private $debug = false;

    public function __construct($url_or_hash = '', $debug = false){
        $this->setUrlHash($url_or_hash);
        $this->setDebug($debug);
    }

    public function setDebug($state = true){
        $r = true;
        $this->debug = $state;
        return $r;
    }
    public function isDebug(){
        $r = $this->debug;
        return $r;
    }

    public function logMessage($value = ''){
        if($this->isDebug()){
            var_dump($value);
        }
    }

    public function setUrlHash($hash){
        $r = false;
        if(preg_match('#^[0-9a-f]{32}$#i', $hash)){
            $this->server_url = str_replace('{hash}', $hash, $this->server_url_template);
            $r = true;
        }
        elseif(stripos($hash, 'https://') === 0){
            $this->server_url = $hash;
            $r = true;
        }
        return $r;
    }

    public function getTouchId(){
        $r = 0;
        if(isset($_COOKIE['_ko_touch_id']) && !empty($_COOKIE['_ko_touch_id'])){
            $r = floatval($_COOKIE['_ko_touch_id']);
        }
        return $r;
    }

    public function getClientId(){
        $r = 0;
        if(isset($_COOKIE['_ko_client_id']) && !empty($_COOKIE['_ko_client_id'])){
            $r = $_COOKIE['_ko_client_id'];
        }
        return $r;
    }

    public function getUserIp(){
        $r = '';
        $keys = ['HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR'];
        foreach($keys as $key){
            if(isset($_SERVER[$key]) && !empty($_SERVER[$key])){
                $r = $_SERVER[$key];
                break;
            }
        }
        return $r;
    }

    public function postData($post = []){
        $r = false;
        $def_post = [
            'contact'   => [],
            'lead'      => [],
            'touch'     => [
                'communication'     => 'site',
                'action'            => 'lead',
                'touch_id'          => $this->getTouchId(),
                'client_id'         => $this->getClientId(),
                'user_ip'           => $this->getUserIp(),
            ],
        ];
        $post = array_merge($def_post, $post);
        $post['touch'] = array_merge($def_post['touch'], $post['touch']);
        if(empty($post['contact']) || (empty($post['contact']['phone']) && empty($post['contact']['email']))){
            $this->logMessage('Empty contact');
            return $r;
        }
        $r = $this->requestPost($post);
        return $r;
    }

    public function requestPost($post = []){
        $r = false;
        if(empty($this->server_url)){
            $this->logMessage('Empty server_url');
            return $r;
        }
        $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '';
        $options = [
            'http'      => [
                'method'            => 'POST',
                'timeout'           => 5,
                'follow_location'   => true,
                'ignore_errors'     => true,
                'header'            => [
                    'Content-Type'      => 'application/json',
                ],
                'user_agent'        => __CLASS__.': '.$host.'',
                'content'           => is_array($post) ? http_build_query($post) : $post,
            ],
            'ssl'       => [
                'verify_peer'       => false,
                'verify_peer_name'  => false,
            ],
        ];
        $this->logMessage('Request:');
        $this->logMessage($post);
        try{
            $context = stream_context_create($options);
            $r = @file_get_contents($this->server_url, false, $context);
        }
        catch(\Exception $er){
            if($this->isDebug()){
                $this->logMessage('Error: '.__FILE__.':'.__LINE__, $er->getMessage());
                exit;
            }
        }
        $this->logMessage('Result:');
        $this->logMessage($r);
        return $r;
    }
}
