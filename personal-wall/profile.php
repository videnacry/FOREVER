<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
        <title>Profile</title>
        <script src="..\node_modules\jquery\dist\jquery.js"></script>
        <link rel="stylesheet" href="..\node_modules\bootstrap\dist\css\bootstrap.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
        <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
        <script src="https://kit.fontawesome.com/de217cab6a.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="..\src\css\style.css"/>
    </head>
    <body>
        <div id="close-modals" class="all-page">

        </div>
        <?php
            session_start();
            include 'header.php';
            include '../general_wall/post_modal.php';
            include 'update-user.php';
        ?>
        <div id="profile" class="container">
            <div class="d-flex d-flex flex-row-reverse w-100">
                <button id="new-post" class="btn btn-primary mx-auto"><i class="fas fa-plus-square"></i> New post</button>
            </div>
            <div class="d-flex d-flex flex-row-reverse">
                
            </div>
        </div>
        <?php
            include '../general_wall/post.php';
        ?>
    </body>
    <script src="../src/js/app.js"></script>
</html>