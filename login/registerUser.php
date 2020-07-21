<?php
$json = json_decode(file_get_contents("../JSON/users.json"));

$newUser = new stdClass();
$newUser->id = $json[count($json)]->id;
$newUser->username = $_POST["username"];
$newUser->email = $_POST["email"];
$newUser->password = $_POST["password"];
$newUser->profilePicture = "none";
$newUser->postsID = [];

array_push($json, $newUser);

header("index.php");//Temporal line