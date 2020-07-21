<?php

if (isset($_POST)) {

   if ($_POST["username"] != $_SESSION["username"]) {
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

   if ($_POST["email"] != $_SESSION["email"]) {
      if (!filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
         echo json_encode([
            "type" => "error",
            "input" => "email",
            "message" => "Please entry a valid email."
         ]);
         die();
      }
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

   $userCompareEmail = findItem("email", $_POST["email"]);
   if($userCompareEmail != $_SESSION["id"] && $userCompareEmail["email"] == $_POST["email"]){
      echo json_encode([
         "type" => "error",
         "input" => "email",
         "message" => "Already exist an user with this email."
      ]);
      die();
   }
}

function getData(string $jsonFile)
{
   $data = file_get_contents("../JSON/" . $jsonFile . ".json");
   $arrayData = json_decode($data, true);
   return $arrayData;
}

function findItem($attr, $value)
{
   $arrayData = getData("users");
   foreach ($arrayData as $item) {
      if ($item[$attr] == $value) {
         return $item;
      }
   }
   return false;
}


