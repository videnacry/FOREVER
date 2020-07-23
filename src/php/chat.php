<?php
   require("functions.php");
   session_start();
    if(isset($_POST['text'])){
        /* Update messages */
    $messagesList = json_decode(file_get_contents('../../JSON/messages.json'));
    if(!$messagesList) $messagesList = [];
      $id = count($messagesList) == 0 ? 1 : end($messagesList)->id + 1;
      $newMessage = new stdClass();
      $newMessage->id = $id;
      $newMessage->user_id = $_SESSION["loggedUserID"];
      $newMessage->user_name = $_SESSION["user"]["username"];
      $newMessage->image = $_SESSION["user"]["main_picture_id"];
      $newMessage->text = $_POST["text"];
      array_push($messagesList, $newMessage);
      updateJson('../../JSON/messages.json', $messagesList);
    }
    $userIds = [1];
    $chats = json_decode(file_get_contents('../../JSON/chats.json'));
    $messages = json_decode(file_get_contents('../../JSON/messages.json'));
    $chatFound = true;
    $response = "";

    if(count($messages)){
        foreach($messages as $message){
            if($message->user_id != $_SESSION["loggedUserID"]){
               $messageTags = '<div class="d-flex flex-nowrap border rounded mt-2 mb-2 p-2 bg-light">'
                                 .'<div class="w-100 order-0 text-right">' . $message->text . '</div>'
                                 .'<div class="order-1">'
                                    . '<div class="image-chat rounded-circle bg-primary" style="background-image: url(\'' . getImagePath($message->image, "../../JSON/images.json") . '\');"></div>'
                                 . '</div>'
                              . '</div>';

               $response .= $messageTags;
            }
            else{
               $messageTags = '<div class="d-flex flex-nowrap border rounded mt-2 mb-2 p-2 no-bs-bg-primary">'
                                 .'<div class="w-100 order-1">' . $message->text . '</div>'
                                 .'<div class="order-0">'
                                    . '<div class="image-chat rounded-circle bg-primary" style="background-image: url(\'' . getImagePath($message->image, "../../JSON/images.json") . '\');"></div>'
                                 . '</div>'
                              . '</div>';
   
               $response .= $messageTags;
            }
        }
    }else{
        echo "Couldn't be found a chat with those participants";
        die();
    }
    echo $response;
    die();