<?php
session_start();
require_once "Config.php";
require_once "Database.php";
require_once "Input.php";
require_once "Validate.php";
require_once "Session.php";
require_once "Token.php";

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

            ],
        'session'=>
            [
                   'name_token'=>'token'
            ]
    ];

if (Input::exists())
{
    if (Token::check(Input::get('token'))) {
        $validate = new Validate();
        $validation = $validate->check($_POST,
            [
                "username" => [
                    "required" => true,
                    "min" => 2,
                    "max" => 15,
                    "unique" => "users"
                ],
                "password" => [
                    "required" => true,
                    "min" => 3
                ],
                "password_again" => [
                    "required" => true,
                    "matches" => "password"
                ],

            ]);
        if ($validation->passed()) {
            echo 'passed';
        } else {
            foreach ($validation->errors() as $error) {
                echo $error . "<br>";
            }
        }
    }
}

?>

<form action="" method="post">

    <div class="field">
        <label for="username">Username</label>
        <input name="username" type="text" value="<?php echo Input::get('username')?>">
    </div>

    <div class="field">
        <label for="">Password</label>
        <input type="text" name="password">
    </div>

    <div class="field">
        <label for="">Password Again</label>
        <input type="text" name="password_again">
    </div>

    <input type="hidden" name="token" value="<?php echo Token::generate() ?>">

    <div class="field">
        <button type="submit">Submit</button>
    </div>
</form>




