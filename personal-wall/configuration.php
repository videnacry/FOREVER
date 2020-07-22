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
            include 'header.php';
        ?>
        <div class="d-flex flex-nowrap">
            <main class="container">
                <div class="mx-4 px-4">
                    <h3 class="my-4">Account general configuration</h3>
                    <form name="formUpdateUser" id="formUpdateUser" action="/" method="POST">
                        <?php
                            include 'gallery.php';
                        ?>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Username:</label>
                            <div class="d-flex">
                                <input type="text" class="form-control" name="username" id="username" value="<?php echo $_SESSION['user']['username']?>" disabled>
                                <button class="btn" type="button"><i class="fas fa-pencil-alt"></i>&nbsp;Edit</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Email:</label>
                            <div class="d-flex">
                                <input type="text" class="form-control" name="email" id="email" value="<?php echo $_SESSION['user']['email']?>" disabled>
                                <button class="btn" type="button"><i class="fas fa-pencil-alt"></i>&nbsp;Edit</button>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Description:</label>
                            <div class="d-flex">
                                <input type="text" class="form-control" name="description" id="description" value="<?php echo $_SESSION['user']['description']?>" disabled>
                                <button class="btn" type="button"><i class="fas fa-pencil-alt"></i>&nbsp;Edit</button>
                            </div>
                        </div>
                        <div class="modal fade" id="modal-update-user" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                            <div class="container">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content px-4">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Update User</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Password:</label>
                                            <input class="form-control" name="password" id="password"></input>
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">Confirm Password:</label>
                                            <input class="form-control" name="password-confirm" id="password-confirm"></input>
                                        </div>
                                        <div class="modal-footer">
                                            <input type="submit" class="btn btn-primary" data-toggle="modal" data-target="#modal-update-user" value="Save">
                                            <button type="button" class="btn btn-danger" class="close" data-dismiss="modal" aria-label="Close">Cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-right pt-3">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-update-user">Save</button>
                            <button type="button" class="btn btn-danger" class="close" data-dismiss="modal" aria-label="Close">Cancel</button>
                        </div>
                    </form>
                </div>
                <?php /*
                <div class="modal-body">
                    <form name="formUpdateUser" id="formUpdateUser" action="/" method="POST">
                      <ul id="update-login" class="list-group list-group-flush">
                        <li class="list-group-item d-flex justify-content-between"> 
                            <span class="font-weight-bold px-0 col-1">Username</span>
                            <div>
                                <input type="text" class="no-style text-muted ml-4 pl-4" name="username" id="username" value="<?php echo $_SESSION['user']['username']?>" disabled>
                            </div>
                            <button class="btn" data-toggle="text-muted" data-target="#username" type="button">Edit</button>
                        </li>
                        <li class="list-group-item d-flex justify-content-between"> 
                            <span class="font-weight-bold px-0 col-1">Email</span>
                            <div>
                                <input type="text" class="no-style text-muted ml-4 pl-4" name="email" id="email" value="<?php echo $_SESSION['user']['email']?>" disabled>
                            </div>
                            <button class="btn" data-toggle="text-muted" data-target="#email" type="button">Edit</button>
                        </li>
                        <li class="list-group-item d-flex justify-content-between"> 
                            <span class="font-weight-bold px-0 col-1">Password</span>
                            <div class="ml-4 pl-4">
                                <input class="no-style text-muted" type="password" name="password" id="password" placeholder="**********************" disabled></input >
                                <input class="no-style collapse text-muted" type="password" placeholder="**********************" name="password-confirm" id="password-confirm"></input>
                            </div>
                            <button class="btn" type="button" data-toggle="collapse" data-target="#password-confirm" >Edit</button>
                        </li>
                      </ul>
                      <div class="form-group text-right pt-3">
                         <input type="submit" class="btn btn-primary" value="Save">
                         <button type="button" class="btn btn-danger" class="close" data-dismiss="modal" aria-label="Close">Cancel</button>
                      </div>
                    </form>
                 </div>*/
                 ?>
            </main>
        </div>
    </body>
    <script src="../src/js/app.js"></script>
</html>