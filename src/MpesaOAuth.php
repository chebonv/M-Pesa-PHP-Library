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
        if (Config::getEnvironment() == "live")
        {
            $url = "https://api.safaricom.co.ke/oauth/v1/generate";
        }else{
            $url = "https://sandbox.safaricom.co.ke/oauth/v1/generate";
        }
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        $credentials = base64_encode(Config::getConsumerKey().':'.Config::getConsumerSecret());
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Authorization: Basic '.$credentials)); //setting a custom header
        curl_setopt($curl, CURLOPT_HEADER, false);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, Config::isSsl());
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $curl_response = curl_exec($curl);
        return json_decode($curl_response)->access_token;
    }
}