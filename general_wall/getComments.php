<?php

  require "../src/php/functions.php";

  $postId = intval($_POST["postId"]);
  $origin = $_POST["origin"];

  $commentsArray = getData("../JSON/comments.json");
  $usersArray = getData("../JSON/users.json");
  $imagesArray = getData("../JSON/images.json");

  $selectedComments = [];
  foreach ($commentsArray as $comment){
    if ($comment["origin"] == $origin && $comment["origin_id"] == $postId){
      array_push($selectedComments, $comment);
    }
  }

  $formattedComments = [];
  foreach ($selectedComments as $comment){
    $newCommentData = new stdClass();
    $newCommentData->creationDate = $comment["created"];
    $newCommentData->content = $comment["content"];
    foreach($usersArray as $user){
      if ($user["id"] == $comment["author_id"]){
        $newCommentData->authorName = $user["username"];
        foreach($imagesArray as $image){
          if ($image["id"] == $user["main_picture_id"]){
            $newCommentData->authorPictureUrl = $image["path"];
          }
        }
      }
    }
    array_push($formattedComments, $newCommentData);
  }

  // function cmp($a, $b) {
  //   if ($a == $b) {
  //       return 0;
  //   }
  //   return ($a->creationDate > $b->creationDate) ? -1 : 1;
  // }

  // uasort($formattedComments, 'cmp');

  foreach($formattedComments as $comment){
    $comment->creationDate = date('F jS, Y', $comment->creationDate);
  }

  echo json_encode($formattedComments);