<?php
session_start();
require("../../src/php/functions.php");

if($_POST){
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
}
