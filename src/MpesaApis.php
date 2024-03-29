<?php


namespace Chebon\Mpesa;


class MpesaApis
{

    /**
     * Use this function to initiate a MpesaApis transaction
     * @param $ShortCode | 6 digit M-Pesa Till Number or PayBill Number
     * @param $CommandID | Unique command for each transaction type.
     * @param $Amount | The amount been transacted.
     * @param $Msisdn | MSISDN (phone number) sending the transaction, start with country code without the plus(+) sign.
     * @param $BillRefNumber | 	Bill Reference Number (Optional).
     * @return mixed|string
     */
    public  static  function  c2b($ShortCode, $CommandID, $Amount, $Msisdn, $BillRefNumber )
    {
        if (Config::getEnvironment() == "live")
        {
            $url = "https://api.safaricom.co.ke/mpesa/c2b/v1/simulate";
        }else{
            $url = "https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate";
        }
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json','Authorization:Bearer '.self::accessToken()));
        $curl_post_data = array(
            'ShortCode' => $ShortCode,
            'CommandID' => $CommandID,
            'Amount' => $Amount,
            'Msisdn' => $Msisdn,
            'BillRefNumber' => $BillRefNumber
        );
        $data_string = json_encode($curl_post_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, Config::isSsl());
        curl_setopt($curl, CURLOPT_HEADER, false);
        $curl_response = curl_exec($curl);
        return $curl_response;
    }

    /**
     * Use this API to register validation and confirmation URLs on M-Pesa
     * @param $shortcode
     * @param $ResponseType
     * @param $ConfirmationURL
     * @param $ValidationURL
     * @return bool|string
     */
    public static function register_url($shortcode, $ResponseType, $ConfirmationURL, $ValidationURL)
    {
        if (Config::getEnvironment() == "live")
        {
            $url = "https://api.safaricom.co.ke/mpesa/c2b/v1/registerurl";
        }else{
            $url = "https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl";
        }
        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array('Content-Type:application/json', 'Authorization:Bearer '.self::accessToken())); //setting custom header
        $curl_post_data = array(
            //Fill in the request parameters with valid values
            'ShortCode' => $shortcode,
            'ResponseType' => $ResponseType,
            'ConfirmationURL' => $ConfirmationURL,
            'ValidationURL' => $ValidationURL
        );
        $data_string = json_encode($curl_post_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_POST, true);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
        curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, Config::isSsl());
        curl_setopt($curl, CURLOPT_HEADER, false);
        $curl_response = curl_exec($curl);
        return $curl_response;
    }

    public static function accessToken()
    {
        return MpesaOAuth::generateToken();
    }
}