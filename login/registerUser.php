<?php
$json = json_decode(file_get_contents("../JSON/users.json"));

$newUser = new stdClass();
$newUser->id = $json[count($json)-1]->id + 1;
$newUser->username = $_POST["username"];
$newUser->email = $_POST["email"];
$newUser->password = $_POST["password"];
$newUser->description = "";
$newUser->registered = new DateTime();
$newUser->main_picture_id = 0;

array_push($json, $newUser);
file_put_contents("../JSON/users.json", json_encode($json));

session_start();
$_SESSION["loggedUserID"] = $newUser->id;