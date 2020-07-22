<?php
require "../src/php/functions.php";

session_start();
$arrayLikes = json_decode(file_get_contents("../JSON/likes.json"));
$index = findIndex($arrayLikes, "user_id", $_SESSION["loggedUserID"]);

$json = json_decode(file_get_contents("../JSON/posts.json"));

$data = [];

for($i = $_POST["index"]; $i < $_POST["index"] + 10; $i++) {
   $user = findItem("../JSON/users.json", "id", $json[$i]->author_id);
   $isLike;
   if($arrayLikes[$index]){
      $isLike = array_search($json[$i]->id, $arrayLikes[$index]->posts);

      if(is_int($isLike) && $isLike >= 0){
         $isLike = "active";
      }else{
         $isLike = "";
      }
   }

    $post = new stdClass();
    $post->id = $json[$i]->id;
    $post->userName = $user["username"];
    $post->userImage = getImagePath($user["main_picture_id"]);
    $post->postImage = getImagePath($json[$i]->image_id);
    $post->dateFormated = date('F jS, Y \a\t H:i', $json[$i]->created);
    $post->content = $json[$i]->content;
    $post->likes = $json[$i]->likes;
    $post->isLike = $isLike;
    $post->comments = $json[$i]->comments;

    array_push($data, $post);
    if($i+1 == count($json)) break;
}

echo json_encode($data);