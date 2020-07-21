<?php
require "../personal-wall/control-data.php/functions.php";

$user = findItem("../JSON/users.json", "username", $_POST["usermail"]);
$email = findItem("../JSON/users.json", "email", $_POST["usermail"]);
$usermail;

if(!$user && !$email) {
    echo "This email or username does not exist!";
    die();
} else {
    if(!$user) $usermail = $json->$email;
    else $usermail = $json->$user;
}

if($usermail->password == $_POST["password"]) {
    session_start();
    $_SESSION["loggedUserID"] = $usermail->id;
} else {
    echo "Password does not match!";
    die();
}

