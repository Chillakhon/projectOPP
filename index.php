<?php
require_once 'init.php';
echo 'HOME';
var_dump(Session::get(
    Config::get('session.name_session')));

