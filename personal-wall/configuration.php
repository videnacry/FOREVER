<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <title>Configuration</title>
        <script src="..\node_modules\jquery\dist\jquery.js"></script>
        <link rel="stylesheet" href="..\node_modules\bootstrap\dist\css\bootstrap.css"/>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
        <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
        <script src="https://kit.fontawesome.com/de217cab6a.js" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="..\src\css\style.css"/>
    </head>
    <body>
        <?php
            session_start();
            include "header.php";
        ?>
        <div class="d-flex flex-nowrap">
            <nav class="navbar navbar-dark">
                <ul class="navbar-nav list-group text-light flex-column">
                    <li class="nav-item list-group-item list-group-item-secondary">
                        <button class="btn">General</button>
                    </li>
                </ul>
            </nav>
            <main class="col-7">
                <h3>Account general configuration</h3>
                <div class="modal-body">
                    <form name="formUpdateUser" id="formUpdateUser" action="/" method="POST">
                      <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between"> 
                            <span class="font-weight-bold px-0 col-1">Username</span>
                            <input type="text" class="no-style text-muted ml-4 pl-4" name="username" id="username" value="<?php echo $_SESSION['user']['username']?>" disabled>
                            <button class="btn" data-toggle="text-muted" data-target="#username" type="button">Edit</button>
                        </li>
                        <li class="list-group-item d-flex justify-content-between"> 
                            <span class="font-weight-bold px-0 col-1">Email</span>
                            <input type="text" class="no-style text-muted ml-4 pl-4" name="email" id="email" value="<?php echo $_SESSION['user']['email']?>" disabled>
                            <button class="btn" data-toggle="text-muted" data-target="#email" type="button">Edit</button>
                        </li>
                        <li class="list-group-item d-flex justify-content-between"> 
                            <span class="font-weight-bold px-0 col-1">Password</span>
                            <div class="ml-4 pl-4">
                                <input class="no-style" type="password" name="password" id="password" placeholder="**********************" disabled></input >
                                <input class="no-style collapse" type="password" placeholder="**********************" name="password-confirm" id="password-confirm"></input>
                            </div>
                            <button class="btn" type="button" data-toggle="collapse" data-target="#password-confirm" >Edit</button>
                        </li>
                      </ul>
                      <div class="form-group text-right pt-3">
                         <input type="submit" class="btn btn-primary" value="Save">
                         <button type="button" class="btn btn-danger" class="close" data-dismiss="modal" aria-label="Close">Cancel</button>
                      </div>
                    </form>
                 </div>
            </main>
        </div>
    </body>
    <script src="../src/js/app.js"></script>
</html>