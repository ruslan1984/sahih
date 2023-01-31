<?php

/**
 * KoForms
 * @author https://kvin.online
 * @version 1
 * @link https://kvin.agency
 */

include_once(__DIR__.'/GeoIp.php');

class KoForms {
    const PLUGIN_NAME = 'ko-forms-hook-local';
    private $emails = [];
    private $from = '';

    public function __construct(){
        // $this->from = '<noreply@'.$_SERVER['HTTP_HOST'].'>';
    }

    public function getEmails(){
        return $this->emails ?: [];
    }
    public function setEmails($emails){
        $vs = [];
        foreach($emails as $v){
            $vs = array_merge($vs, array_map('trim', explode(',', $v)));
        }
        $this->emails = $vs;
    }

    public function checkRequest(){
        $r = true;
        if(isset($_POST['telephone'])){
            $r = false;
        }
        return $r;
    }

    static public function normalizeFormData($post){
        $rules = [
            'profile_name'      => ['name'],
            'profile_phone'     => ['phone', 'tel'],
            'profile_email'     => ['email', 'mail'],
            'profile_comment'   => ['comment', 'calltime', 'message'],
        ];
        foreach($post as $kp => $vp){
            foreach($rules as $kr => $vr){
                if(isset($post[$kr]) || $kp == $kr){
                    continue;
                }
                foreach($vr as $vv){
                    if(stripos($kp, $vv) !== false){
                        $post[$kr] = $vp;
                        unset($post[$kp]);
                        continue 2;
                    }
                }
            }
        }
        return $post;
    }

    public function actionSendForm(){
        $r = 0;
        if($this->checkRequest() == false){
            return $r;
        }
        $post = self::normalizeFormData($_POST);
        $host = self::getCurrentHost();
        $query = self::getUrlQueries();

        $contact = [];
        $out = [];

        unset($post['action']);

        if(!empty($post['profile_name'])){
            $out[] = $post['profile_name'];
        }
        unset($post['profile_name']);
        if(!empty($post['profile_phone'])){
            $out[] = '<a href="tel:'.$post['profile_phone'].'">'.$post['profile_phone'].'</a>';
            if(empty($contact)){
                $contact[] = $post['profile_phone'];
            }
        }
        unset($post['profile_phone']);
        if(!empty($post['profile_email'])){
            $out[] = '<a href="mailto:'.$post['profile_email'].'">'.$post['profile_email'].'</a>';
            if(empty($contact)){
                $contact[] = $post['profile_email'];
            }
        }
        unset($post['profile_email']);

        if(!empty($post['profile_comment'])){
            $out[] = '- комментарий: <i>'.$post['profile_comment'].'</i>';
        }
        unset($post['profile_comment']);
        $geo = $this->getGeo();
        $out[] = '- гео: <i>'.($geo ?: '(неизвестно)').'</i>';
        $out[] = '';

        $keys = ['profile_name', 'profile_phone', 'profile_email', 'profile_comment'];
        foreach($post as $k => $v){
            if(in_array($k, $keys)){
                unset($post[$k]);
            }
        }
        if(!empty($post)){
            $out[] = '<b>Анкета</b>';
        }
        foreach($post as $k => $v){
            if(preg_match('#^profile_#i', $k)){
                $k = preg_replace('#^profile_#i', '', $k);
            }
            $out[] = '- '.$k.': <i>'.$v.'</i>';
        }
        if(!empty($post)){
            $out[] = '';
        }

        $out[] = '<b>Utm</b>';
        $out[] = '- source: <i>'.$query['utm_source'].'</i>';
        $out[] = '- medium: <i>'.$query['utm_medium'].'</i>';
        $out[] = '- campaign: <i>'.$query['utm_campaign'].'</i>';
        $out[] = '- content: <i>'.$query['utm_content'].'</i>';
        $out[] = '- term: <i>'.$query['utm_term'].'</i>';

        $subject = 'Лид '.implode(', ', $contact).' | '.$host;
        $message = '<div style="font-size:14px;">'.implode("<br>", $out).'</div>';

        $emails = $this->getEmails() ?: [];
        $r = $this->sendEmails($emails, $subject, $message);
        return $r;
    }

    public function sendEmails($emails, $subject = '', $message = '', $headers = []){
        $r = 0;
        $emails = array_map('trim', $emails);
        $def_headers = [
            'Content-Type'  => 'text/html; charset=utf-8',
        ];
        if(!empty($this->from)){
            $def_headers['From'] = $this->from;
        }
        foreach($def_headers as $k => $v){
            if(!isset($headers[$k])){
                $headers[$k] = $v;
            }
        }
        $hs = [];
        foreach($headers as $k => $v){
            $hs[] = $k.': '.$v;
        }
        foreach($emails as $email){
            mail($email, $subject, $message, implode("\r\n", $hs));
            $r += 1;
        }
        return $r;
    }

    static public function getCurrentHost(){
        $host = @$_SERVER['HTTP_HOST'] ?: '';
        $host = idn_to_utf8($host);
        $host = preg_replace('#^www\.#u', '', $host);
        return $host;
    }

    static public function getUrlQueries(){
        $r = [];
        $utm = stripslashes(@$_COOKIE['ko.local.init_utm'] ?: '');
        $utm = html_entity_decode($utm);
        $t = @json_decode($utm, true);
        if(!empty($t)){
            $r = $t;
        }
        return $r;
    }

    static public function getGeo(){
        $r = '';
        $geo = new GeoIp();
        $vs = $geo->getGeo($_SERVER['REMOTE_ADDR'], 'ru');
        if(!empty($vs['city'])){
            $r = $vs['city'];
        }
        elseif(!empty($vs['region'])){
            $r = $vs['region'];
        }
        elseif(!empty($vs['country'])){
            $r = $vs['country'];
        }
        return $r;
    }

}
