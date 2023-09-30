<?php
session_start();
require_once "Classes/Config.php";
require_once "Classes/Database.php";
require_once "Classes/Input.php";
require_once "Classes/Validate.php";
require_once "Classes/Session.php";
require_once "Classes/Token.php";
require_once "Classes/User.php";
require_once "Classes/Redirect.php";
require_once "classes/Cookie.php";


$GLOBALS['config'] =
    [
        'mysql'=>
            [
                'host'=>'localhost',
                'username'=>'root',
                'password'=>'root',
                'database'=>"testOPP",
            ],
        'session'=>
            [
                'name_token'=>'token',
                'name_session'=>'user'
            ],
        'cookie'=>
        [
            'cookie_name'=>'hash',
            'cookie_expiry'=>604800
        ]
    ];

if (Cookie::exists(Config::get('cookie.cookie_name')) && !Session::exists('session.name_session'))
{
    $hash = Cookie::get(Config::get('cookie.cookie_name'));
    $hashCheck = Database::getInstance()->get('user_sessions',['hash','=',"$hash"]);

    if ($hashCheck->count()){
        $user = new User($hashCheck->first()->user_id);
        $user->login();
    }
}
