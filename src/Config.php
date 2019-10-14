<?php


namespace Chebon\Mpesa;


class Config
{
    private static $consumer_key = "";
    private static $consumer_secret = "";
    private static $ssl = false;
    private static $environment = "sandbox";

    /**
     * @return string
     */
    public static function getConsumerKey(): string
    {
        return self::$consumer_key;
    }

    /**
     * @param string $consumer_key
     */
    public static function setConsumerKey(string $consumer_key)
    {
        self::$consumer_key = $consumer_key;
    }

    /**
     * @return string
     */
    public static function getConsumerSecret(): string
    {
        return self::$consumer_secret;
    }

    /**
     * @param string $consumer_secret
     */
    public static function setConsumerSecret(string $consumer_secret)
    {
        self::$consumer_secret = $consumer_secret;
    }

    /**
     * @return bool
     */
    public static function isSsl(): bool
    {
        return self::$ssl;
    }

    /**
     * @param bool $ssl
     */
    public static function setSsl(bool $ssl)
    {
        self::$ssl = $ssl;
    }

    /**
     * @return string
     */
    public static function getEnvironment(): string
    {
        return self::$environment;
    }

    /**
     * @param string $environment
     */
    public static function setEnvironment(string $environment)
    {
        self::$environment = $environment;
    }
}