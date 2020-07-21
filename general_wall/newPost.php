<?php
session_start();
require "../src/php/functions.php";

$date = new DateTime();

$json = json_decode(file_get_contents("../JSON/images.json"));
$json2 = json_decode(file_get_contents("../JSON/posts.json"));

$jsonIMG = new stdClass();
$jsonIMG->id = null;
//CREATING NEW IMAGE IN JSON
if(strlen($_POST["image"]) > 0) {
    $jsonIMG->id = $json[count($json)-1]->id + 1;
    $jsonIMG->origin = "post";
    $jsonIMG->origin_id = $json2[count($json2)-1]->id + 1;
    $jsonIMG->path = $_POST["image"];
    $jsonIMG->description = "";
    $jsonIMG->likes = 0;
    
    array_push($json, $jsonIMG);
    file_put_contents("../JSON/images.json", json_encode($json));
}

//CREATING NEW POST IN JSON
$jsonPOST = new stdClass();
$jsonPOST->id = $json2[count($json2)-1]->id + 1;
$jsonPOST->author_id = (int)$_SESSION["loggedUserID"];
$jsonPOST->image_id = $jsonIMG->id;
$jsonPOST->created = date("F jS, Y");
$jsonPOST->content = $_POST["text"];
$jsonPOST->likes = 0;

array_push($json2, $jsonPOST);
file_put_contents("../JSON/posts.json", json_encode($json2));