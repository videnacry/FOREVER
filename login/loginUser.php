<?php
require "../src/php/functions.php";

$user = findItem("../JSON/users.json", "username", $_POST["usermail"]);
$email = findItem("../JSON/users.json", "email", $_POST["usermail"]);
$usermail;

if(!$user && !$email) {
    echo "This email or username does not exist!";
    die();
} else {
    if(!$user) $usermail = $email;
    else $usermail = $user;
}

if($usermail["password"] == $_POST["password"]) {
    session_start();
    $_SESSION["loggedUserID"] = $usermail["id"];
    $_SESSION["user"] = [
        "username" => $usermail["username"],
        "email" => $usermail["email"],
        "description" => $usermail["description"],
        "registered" => $usermail["registered"],
        "main_picture_id" => $usermail["main_picture_id"]
    ];

    echo "SUCCESS";
} else {
    echo "Password does not match!";
    die();
}

