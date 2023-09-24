<?php
require_once "Config.php";
require_once "Database.php";
$id = 4;



//$users = Database::getInstance()->query("SELECT * FROM users WHERE email IN (?)",['Shoev']);

//$users = Database::getInstance()->delete('users',['email','=','shoev']);
//Database::getInstance()->insert('users',["email"=>"shoev-03","password"=>"4321"]);
//Database::getInstance()->update('users',$id, ["email"=>"string", "password" =>"1242"]);

$GLOBALS['config'] =
    [
        'mysql'=>
            [
                'host'=>'localhost',
                'username'=>'root',
                'password'=>'root',
                'database'=>"testOPP",

            ]
    ];

$users = Database::getInstance()->get('users',['password','=','4321']);
var_dump($users->first()->email);

/*$users = Database::getInstance()->get('users',['email','=','str']);

echo $users->first()->email;

if ($users->error())
{
    echo "error";
}else
{
    foreach ($users->result() as $user)
    {
        echo $user->email . "<br>";
    }
}*/



