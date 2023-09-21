<?php
require_once "Database.php";
$users = Database::getInstance()->query("SELECT * FROM usersj");
if ($users->error())
{
    echo "error";
}else
{
    foreach ($users->result() as $user)
    {
        echo $user->password . "<br>";
    }
}


