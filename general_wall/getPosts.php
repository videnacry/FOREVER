<?php
require "../src/php/functions.php";

$json = json_decode(file_get_contents("../JSON/posts.json"));

$data = [];

for($i = $_POST["index"]; $i < $_POST["index"] + 10; $i++) {
    $user = findItem("../JSON/users.json", "id", $json[$i]->author_id);

    $post = new stdClass();
    $post->id = $json[$i]->id;
    $post->userName = $user["username"];
    $post->userImage = getImagePath($user["main_picture_id"]);
    $post->postImage = getImagePath($json[$i]->image_id);
    $post->dateFormated = $json[$i]->created;
    $post->content = $json[$i]->content;
    $post->likes = $json[$i]->likes;
    $post->comments = 0; //This part is 0 until the COMMENTS CODE is made and there is something to count

    array_push($data, $post);
    if($i+1 == count($json)) break;
}

echo json_encode($data);