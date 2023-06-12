<?php

namespace external\libraries;

Class image {
    /** Comprueba que la imagen existe en remoto, si no, devuelve otra */
    public static function checkImage($imgUrl,$imgFailUrl = ''){
        $resultadoimgUrl = $imgUrl;
        if(!empty($imgUrl)){
            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL,$imgUrl);
            // don't download content
            curl_setopt($ch, CURLOPT_NOBODY, 1);
            curl_setopt($ch, CURLOPT_FAILONERROR, 1);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $result = curl_exec($ch);
            curl_close($ch);
            if($result !== FALSE)
            {
                return $imgUrl;
            }
            else
            {
                return $imgFailUrl;
            }
                }
    }
}