<?php
require_once 'init.php';

$user = new User();

echo Session::flash('success')."<br>";

if ($user->isLoggedIn()) {

    echo "Hi, <a href='#'>{$user->data()->username}</a>";
    echo "<p> </p><a href='logout.php'> Logout </a> ";
    echo "<p> <a href='update.php'> Update Profile </a> </p>";
    echo "<p> <a href='changepassword.php'> Change Password </a> </p>";

    if ($user->hasPermission('admin')){
        echo 'you are admin';
    }

}else{
    echo "<a href='login.php'> Login </a>  or  <a href='register.php'> Register </a> ";
}






