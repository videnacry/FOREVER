<?php

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Develop Your Project with PHP</title>
  <!-- Own stylesheet -->
  <link href="../src/css/style.css" rel="stylesheet"/>
  <!-- Font awesome -->
  <script src="https://kit.fontawesome.com/de217cab6a.js" crossorigin="anonymous"></script>
  <!--NPM Packages -->
  <script src="../node_modules/jquery/dist/jquery.js"></script>
  <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
  <link href="../node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet"/>
</head>
<body>
        <?php
            include '../personal-wall/header.php';
            include 'post_modal.php';
            include 'post.php';
        ?>
  <script src="../src/js/app.js"></script>
</body>
</html>