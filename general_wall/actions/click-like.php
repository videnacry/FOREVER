<?php
session_start();
require("../../src/php/functions.php");

if($_POST){
   $arrayPosts = json_decode(file_get_contents("../../JSON/posts.json"));
   $indexPosts = findIndex($arrayPosts, "id", $_POST["post-id"]);

   $arrayLikes = json_decode(file_get_contents("../../JSON/likes.json"));
   $index = findIndex($arrayLikes, "user_id", $_SESSION["loggedUserID"]);

   if($arrayPosts[$indexPosts]){

      $num = (int)$arrayPosts[$indexPosts]->likes;
      if($_POST["like"] == "add"){
         $arrayPosts[$indexPosts]->likes = ++$num;

         if($arrayLikes[$index]){
            $arrayLikes[$index]->posts[] = $_POST["post-id"];
         }
      }else{
         $arrayPosts[$indexPosts]->likes = --$num;
         if($arrayLikes[$index]){
            array_splice($arrayLikes[$index]->posts, array_search($_POST["post-id"],$arrayLikes[$index]->posts), 1);
         }
      }
   }
   updateJson("../../JSON/posts.json", $arrayPosts);
   updateJson("../../JSON/likes.json", $arrayLikes);
}
