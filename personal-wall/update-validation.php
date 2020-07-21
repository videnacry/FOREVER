<?php
require("functions.php");
session_start();
$_SESSION["user"] = findItem("../JSON/users.json", "id", 0);

if (isset($_POST)) {
   if ($_POST["username"] != $_SESSION["user"]["username"]) {
      $username = $_POST["username"];
      if (empty($username) || strlen($username) < 3) {
         echo json_encode([
            "type" => "error",
            "input" => "username",
            "message" => "This information is required. (more than 3 characteres)"
         ]);
         die();
      }
   }
   $userCompareUserName = findItem("../JSON/users.json", "username", $_POST["username"]);
   if($userCompareUserName["id"] != $_SESSION["user"]["id"] && $userCompareUserName["username"] == $_POST["username"]){
      echo json_encode([
         "type" => "error",
         "input" => "email",
         "message" => "Already exist an user with this username."
      ]);
      die();
   }
   if ($_POST["email"] != $_SESSION["user"]["email"]) {
      if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
         echo json_encode([
            "type" => "error",
            "input" => "email",
            "message" => "Please entry a valid email."
         ]);
         die();
      }
   }

   $userCompareEmail = findItem("../JSON/users.json", "email", $_POST["email"]);
   if($userCompareEmail && $userCompareEmail["id"] != $_SESSION["user"]["id"] && $userCompareEmail["email"] == $_POST["email"]){
      echo json_encode([
         "type" => "error",
         "input" => "email",
         "message" => "Already exist an user with this email."
      ]);
      die();
   }

   if (empty($_POST["password"]) || strlen($_POST["password"]) < 6) {
      echo json_encode([
         "type" => "error",
         "input" => "password",
         "message" => "Your password is required. (More than 6 characters)"
      ]);
      die();
   }

   if ($_POST["password"] != $_POST["password-confirm"]) {
      echo json_encode([
         "type" => "error",
         "input" => "password-confirm",
         "message" => "Password and confirm Password aren't equals"
      ]);
      die();
   }

   $toUpdate = findItem("../JSON/users.json", "id", $_SESSION["user"]["id"]);

   //Update User
   removeItemOfJson("../JSON/users.json", $toUpdate);
   $toUpdate["username"] = $_POST["username"];
   $toUpdate["email"] = $_POST["email"];
   addItemInJson("../JSON/users.json", $toUpdate);


   $_SESSION["user"] = $toUpdate;
   echo json_encode([
      "type" => "ok",
      "userData" => $_SESSION["user"]
   ]);
   die();

}






