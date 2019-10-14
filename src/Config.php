<?php


namespace Chebon\Mpesa;


class Config
{
    public static $consumer_key = "";
    public static $consumer_secret = "";
    public static $ssl = false;
    public static $OAuth = "https://sandbox.safaricom.co.ke/oauth/v1/generate";
    public static $c2b_url = "https://sandbox.safaricom.co.ke/mpesa/c2b/v1/simulate";
    public static $c2b_register_url = "https://sandbox.safaricom.co.ke/mpesa/c2b/v1/registerurl";
}