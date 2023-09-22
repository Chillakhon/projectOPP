<?php
require_once "Database.php";
//$users = Database::getInstance()->query("SELECT * FROM users WHERE email IN (?)",['Shoev']);
$users = Database::getInstance()->get('users',['email','=','Shoev']);
if ($users->error())
{
    echo "error";
}else
{
    foreach ($users->result() as $user)
    {
        echo $user->email . "<br>";
    }
}



