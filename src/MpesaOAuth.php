<?php


namespace Chebon\Mpesa;


class MpesaOAuth
{
    /**
     * Use this API to generate an OAuth access token to access other APIs
     * @return mixed
     */
    public static function generateToken()
    {
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, Config::$OAuth);
        $credentials = base64_encode(Config::$consumer_key.':'.Config::$consumer_secret);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, Config::$ssl);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        return json_decode($curl_response)->access_token;
    }
}