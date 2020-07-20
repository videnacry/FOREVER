<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width,initial-scale=1.0"/>
        <title>Profile</title>
        <link rel="stylesheet" href="..\node_modules\bootstrap\dist\css\bootstrap.css"/>
        <script src="https://kit.fontawesome.com/de217cab6a.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="..\src\css\style.css"/>
    </head>
    <body>
        <?php
            include 'header.php';
            include '../general_wall/general_wall.php';
        ?>
        <div id="profile" class="">
            <div class="d-flex justify-content-center py-4">
                <div id="profile-photo" class="rounded-circle vw-third"></div>
            </div>
            <div class="d-flex justify-content-center py-4">
                <h1 id="profile-name">Beronidas</h1>
            </div>
            <div class="d-flex d-flex flex-row-reverse">
                <button class="btn btn-secondary mx-2"><i class="fas fa-pencil-alt"></i> Editar perfil</button>
                <button class="btn btn-secondary mx-2"><i class="fas fa-plus-square"></i> Awesome post</button>
            </div>
            <div class="d-flex d-flex flex-row-reverse">
                
            </div>
        </div>
    </body>
</html>