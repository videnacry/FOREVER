<?php
  session_start();
  $userId = $_SESSION["loggedUserID"];
  $postId = $_POST["postId"];
  $postContent = $_POST["postContent"];
  $origin = $_POST["origin"];

  // echo $userId;
  // echo '<br>';
  // echo $postId;
  // echo '<br>';
  // echo $postContent;
  // echo '<br>';
  // echo $origin;
  // echo '<br>';

  $commentsArray = json_decode(file_get_contents("../JSON/comments.json"));
  $postsArray = json_decode(file_get_contents("../JSON/posts.json"));

  $newComment = new stdClass();
  $newComment->id = $commentsArray[count($commentsArray) - 1]->id + 1;
  $newComment->origin = $origin;
  $newComment->origin_id = intval($postId);
  $newComment->author_id = $userId;
  $date = new DateTime();
  $newComment->created = $date->getTimestamp();
  $newComment->content = $postContent;

  array_push($commentsArray, $newComment);
  file_put_contents("../JSON/comments.json", json_encode($commentsArray));

  foreach ($postsArray as &$post){
    if ($post["id"] == $postId){
      $post["comments"] = $post["comments"] + 1;
      break;
    }
  }
  file_put_contents("../JSON/posts.json", json_encode($postsArray));


  $newComment->creationDate = date('F jS, Y \a\t H:i', $newComment->creationDate);

  echo json_encode($newComment);