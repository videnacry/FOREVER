<?php
require "functions.php";

session_start();
if(isset($_SESSION["loggedUserID"])) {  
    $user = (object)$_SESSION["user"];
    $user->id = $_SESSION["loggedUserID"];
    $user->picturePath = getImagePath((int)$user->main_picture_id, "../../JSON/images.json");
    echo json_encode($user);
} else echo "-1";
