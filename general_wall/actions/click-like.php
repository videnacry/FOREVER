<?php
session_start();
require("../../src/php/functions.php");

if($_POST){
   // Update posts.json
   $arrayPosts = json_decode(file_get_contents("../../JSON/posts.json"));
   $index = findIndex($arrayPosts, "id", $_POST["post-id"]);
   if($arrayPosts[$index]){

      $num = (int)$arrayPosts[$index]->likes;
      if($_POST["like"] == "add"){
         $arrayPosts[$index]->likes = ++$num;
      }else{
         $arrayPosts[$index]->likes = --$num;
      }
      updateJson("../../JSON/posts.json", $arrayPosts);
   }

   //update likes.json
   $arrayLikes = json_decode(file_get_contents("../../JSON/likes.json"));
   $index = findIndex($arrayLikes, "user_id", $_SESSION["loggedUserID"]);
   $arrayLikes[$index]->posts += ["post_id" => $_POST["post-id"]];
   updateJson("../../JSON/likes.json", $arrayLikes);
}
