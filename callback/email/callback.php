<?php

/**
 * Local Ko Callback
 * @author https://kvin.online
 * @version 1
 * @link https://kvin.agency
 */

$gEmails = [
    'support@sahihinvest.ru',
];

ignore_user_abort(true);
set_time_limit(120);
mb_internal_encoding('utf-8');

header('Content-Type: application/json; charset=utf-8');
// header('Content-Type: text/plain; charset=utf-8');

$r = [
    'status'        => '',
];
if($_SERVER['REQUEST_METHOD'] == 'POST'){
    try{
        include_once(__DIR__.'/KoForms.php');
        $koForms = new KoForms();
        $koForms->setEmails($gEmails);
        $t = $koForms->actionSendForm();
        $r['status'] = ($t ? 'ok' : 'error');
    }
    catch(Exception $er){
        $r['status'] = 'fail';
        $r['error'] = $er->getMessage();
    }
}
else{
    $r['status'] = 'ignored';
}

$r = json_encode($r, JSON_UNESCAPED_UNICODE);
exit($r);
