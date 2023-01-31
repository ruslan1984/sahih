<?php

require(__DIR__.'/GeoIp/vendor/autoload.php');
use GeoIp2\Database\Reader;

class GeoIp {
    const FILE_DATABASE_CITY = __DIR__.'/GeoIp/database/GeoLite2-City.mmdb';

    static public function getGeo($ip = null, $language = 'en', $prefix = '', $postfix = '', $keys = []){
        $r = [];
        if($ip == null){
            $ip = $_SERVER['REMOTE_ADDR'];
        }
        if(!preg_match('#^([\d\.]+|[\da-f:]+)$#i', $ip)){
            return $r;
        }
        $d = [];
        try{
            $reader = new Reader(self::FILE_DATABASE_CITY);
            $record = $reader->city($ip);
            $d = [
                'ip'            => $ip,
                'country_iso'   => $record->country->isoCode,
                'country'       => $record->country->names[$language],
                'region'        => $record->mostSpecificSubdivision->names[$language],
                'region_iso'    => $record->mostSpecificSubdivision->isoCode,
                'city'          => $record->city->names[$language],
                'postal'        => $record->postal->code,
                'latitude'      => $record->location->latitude,
                'longitude'     => $record->location->longitude,
            ];
        }
        catch(Exception $er){

        }
        if(!empty($keys)){
            foreach($d as $k => $v){
                if(!in_array($k, $keys)){
                    unset($d[$k]);
                }
            }
        }
        foreach($d as $k => $v){
            $r[$prefix.$k.$postfix] = $v;
        }
        return $r;
    }
}
