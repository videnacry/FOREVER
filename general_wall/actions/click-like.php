<?php

require("../../src/php/functions.php");

if($_POST){

   $post = findItem("../../JSON/posts.json", "id", $_POST["post-id"]);
   if($post){
      removeItemOfJson("../../JSON/posts.json", $post);
      $num = (int)$post["likes"];
      if($_POST["like"] == "add"){
         $post["likes"] = ++$num;
      }else{
         $post["likes"] = --$num;
      }
      addItemInJson("../../JSON/posts.json", $post);
      echo "ok";
   }
}