<?php
$json = json_decode(file_get_contents("../JSON/users.json"));
$date = new DateTime();


//PROFILE PICTURE

$jsonIMG = json_decode(file_get_contents("../JSON/images.json"));

$newIMG->id = $jsonIMG[0]->id + 1;
$newIMG->origin = "profile";
$newIMG->origin_id = $json[count($json)-1]->id + 1;
$newIMG->path = "https:\/\/external-content.duckduckgo.com\/iu\/?u=http%3A%2F%2Fwww.accountingweb.co.uk%2Fsites%2Fall%2Fmodules%2Fcustom%2Fsm_pp_user_profile%2Fimg%2Fdefault-user.png&f=1&nofb=1";

array_unshift($jsonIMG, $newIMG);
file_put_contents("../JSON/images.json", json_encode($jsonIMG));


//USER

$newUser = new stdClass();
$newUser->id = $json[count($json)-1]->id + 1;
$newUser->username = $_POST["username"];
$newUser->email = $_POST["email"];
$newUser->password = $_POST["password"];
$newUser->description = "";
$newUser->registered = $date->getTimestamp();
$newUser->main_picture_id = $newIMG->id;

array_push($json, $newUser);
file_put_contents("../JSON/users.json", json_encode($json));


//LIKES

$jsonLikes = json_decode(file_get_contents("../JSON/likes.json"));

$newUserLikes = new stdClass();
$newUserLikes->user_id = $newUser->id;
$newUserLikes->posts = [];
array_push($jsonLikes, $newUserLikes);
file_put_contents("../JSON/likes.json", json_encode($jsonLikes));


//SESSION VARIABLES

session_start();
$_SESSION["loggedUserID"] = $newUser->id;
$_SESSION["user"] = [
    "username" => $newUser->username,
    "email" => $newUser->email,
    "description" => $newUser->description,
    "registered" => $newUser->registered,
    "pictureID" => $newIMG->id
];