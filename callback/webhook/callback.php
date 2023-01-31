<?php

error_reporting(0);
ini_set('display_errors', 0);
ini_set('display_startup_errors', 0);

header('Content-Type: application/json; charset=utf-8');

$r = [];
if($_SERVER['REQUEST_METHOD'] != 'POST'){
    exit('{"error": "disallow method"}');
}

include_once(__DIR__.'/ko-webhook-leads.php');

define('KO_WEBHOOK_URL', '');
define('KO_EXT_URL', '');

$r = [
    'boomerang'     => [],
    'kvinonline'    => [],
];

$def_data = [
    'name'      => '',
    'phone'     => '',
    'email'     => '',
    'comment'   => '',
    'org_inn'   => '',
    'form_name' => '',
    'site_url'  => '',
    'touch_id'  => 0,
];
$data = array_merge($def_data, $_REQUEST);

$check_company = true;
if(!empty($data['org_inn'])){
    $r['boomerang']['company'] = company_get($data['org_inn']);
    if(isset($r['boomerang']['company']['status'])){
        $check_company = (bool)$r['boomerang']['company']['status'];
    }
}
else{
    // $check_company = false;
}

if($check_company && (!empty($data['phone']) || !empty($data['email']))){
    try{
        $url = KO_EXT_URL;
        if(!empty($url)){
            $debug = false;
            $koWebhookLeads = new KoWebhookLeads($url, $debug);
            $post = [
                'name'          => $data['name'],
                'phone'         => $data['phone'],
                'email'         => $data['email'],
                'message'       => $data['comment'],
                'name_form'     => $data['form_name'],
                'inn'           => $data['org_inn'],
                'site_url'      => $data['site_url'],
                'source'        => 'kvin',
                'user_ip'       => $koWebhookLeads->getUserIp(),
                'user_agent'    => @$_SERVER['HTTP_USER_AGENT'] ?: '',
            ];
            $r['boomerang']['response'] = @json_decode($koWebhookLeads->requestPost(json_encode($post, JSON_UNESCAPED_UNICODE)), true);
        }
    }
    catch(\Exception $er){
        $r['boomerang']['error_message'] = $er->getMessage();
    }
    try{
        $url = KO_WEBHOOK_URL; // set webhook url
        if(!empty($url)){
            $debug = false;
            $post = [
                'contact'       => [
                    'name'          => $data['name'],
                    'phone'         => $data['phone'],
                    'email'         => $data['email'],
                ],
                'lead'          => [
                    'profile'       => [
                        'org_inn'       => $data['org_inn'],
                        'comment'       => $data['comment'],
                    ], // add form fields
                ], // amount, currency, profile
                'touch'         => [
                    'touch_id'      => $data['touch_id'],
                    'site_url'      => $data['site_url'],
                    'page'          => [
                        'form'          => $data['form_name'],
                    ],
                ], // touch_id, site_url, user_ip
            ];
            $koWebhookLeads = new KoWebhookLeads($url, $debug);
            $r['kvinonline']['response'] = @json_decode($koWebhookLeads->postData($post), true);
        }
    }
    catch(\Exception $er){
        $r['kvinonline']['error_message'] = $er->getMessage();
    }
}

echo json_encode($r, JSON_UNESCAPED_UNICODE);
exit;


function company_get($inn){
    $r = [];
    $post = [
        'inn'       => $inn,
    ];
    $url = 'https://boomerang.group/restapi/add-company-json/';
    $debug = false;
    $koWebhookLeads = new KoWebhookLeads($url, $debug);
    $r = @json_decode($koWebhookLeads->requestPost(json_encode($post, JSON_UNESCAPED_UNICODE)), true) ?: [];
    return $r;
}