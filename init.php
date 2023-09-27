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
            ]
    ];
