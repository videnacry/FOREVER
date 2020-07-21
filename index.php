<!DOCTYPE html>
<html lang="en"><head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Develop Your Project with PHP</title>
    <!-- Own stylesheet -->
    <link href="src/css/style.css" rel="stylesheet" />
    <!-- Font awesome -->
    <script src="https://kit.fontawesome.com/de217cab6a.js" crossorigin="anonymous"></script>
    <!--NPM Packages -->
    <script src="node_modules/jquery/dist/jquery.js"></script>
    <script src="node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <link href="node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet" />
</head>
<body>
    <main>
        <form id="lg_form">
            <?php
                session_start();
                if(isset($_SESSION["loggedUserID"])) header("Location: personal-wall/profile.php");
                
                if(isset($_GET["register"])) include "login/forms/register.php"; else include "login/forms/login.php"
            ?>
        </form>
    </main>
    <script src="login/login.js"></script>
</body>
</html>