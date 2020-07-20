<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GoTatoe</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script src="login.js" defer></script>
    <script src="../node_modules/jquery/dist/jquery.js"></script>
</head>
<body>
    <form id="lg_form">
        <?php if(isset($_GET["register"])) include "forms/register.php"; else include "forms/login.php" ?>
    </form>
</body>
</html>