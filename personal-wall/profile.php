<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
        <title>Profile</title>
        <link rel="stylesheet" href="..\node_modules\bootstrap\dist\css\bootstrap.css"/>
        <script src="..\node_modules\jquery\dist\jquery.js"></script>
        <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
        <script src="https://kit.fontawesome.com/de217cab6a.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="..\src\css\style.css"/>
    </head>
    <body>
        <div id="close-modals" class="all-page">

        </div>
        <?php
            include 'header.php';
            include '../general_wall/post_modal.php';
            include 'update-user.php';
        ?>
        <div id="profile" class="">
            <div class="d-flex justify-content-center py-4">
                <div id="profile-photo" class="rounded-circle vw-third"></div>
            </div>
            <div class="d-flex justify-content-center py-4">
                <h1 id="profile-name">Beronidas</h1>
            </div>
            <div class="d-flex justify-content-center">
                <p id="profile-description">After some time it was discover and with it who would say for that time the consecuences.</p>
            </div>
            <div class="d-flex d-flex flex-row-reverse">
                <button type="button" data-toggle="modal" data-target="#modal-update-user" class="btn btn-secondary mx-2">
                    <i class="fas fa-pencil-alt"></i> Editar perfil
                </button>
                <button id="new-post" class="btn btn-secondary mx-2"><i class="fas fa-plus-square"></i> Awesome post</button>
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