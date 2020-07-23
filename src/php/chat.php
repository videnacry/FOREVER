<?php
    $update = false;
    if(isset($_POST['text'])){
        $update = true;
    }
    $userIds = [1];
    $chats = json_decode(file_get_contents('../../JSON/chats.json'));
    $messages = json_decode(file_get_contents('../../JSON/messages.json'));
    $chatFound = true;
    $messageId;
    $response;
    foreach($chats as $chat){
        foreach($userIds as $userId){
            if(array_search($userId,$chat->participants)>=0){
            }else{
                $chatFound = false;
            break;
            }
        }
        if($chatFound == false){
            $chatFound = true;
        }else{
            $messageId = $chat->id;
        break;
        }
    }
    if($messageId >= 0){
        foreach($messages as $message){
            if($message->id == $messageId){
                if($update){
                    $message->text = $message->text . '<br>' . $_POST['text'];
                    file_put_contents('../../JSON/messages.json',json_encode($messages));
                }
                $response = $message->text;
            }
            else{
                $response = "Couldn't be found the chat with that id";
            }
        }
    }else{
        echo "Couldn't be found a chat with those participants";
        die();
    }
    echo $response;
    die();