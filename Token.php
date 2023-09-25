<?php
class Token
{
    public static function generate()
    {
        return Session::put(Config::get('session.name_token') , md5(uniqid()));
    }

    public static function check($token)
    {
        $tokenName = Config::get('session.name_token');
        if (Session::exists($tokenName) && $token == Session::get($tokenName))
        {
            unset($tokenName);
            return true;
        }
        return false;
    }
}
