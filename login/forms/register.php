<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Develop Your Project with PHP</title>
    <!-- Own stylesheet -->
    <link href="../src/css/style.css" rel="stylesheet" />
    <!-- Font awesome -->
    <script src="https://kit.fontawesome.com/de217cab6a.js" crossorigin="anonymous"></script>
    <!--NPM Packages -->
    <script src="../node_modules/jquery/dist/jquery.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <link href="../node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet" />
</head>

<body>
    <main>
        <div class="container">
            <div class="row align-items-center form-cont">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h3 class="text-center m-5 text-primary">Create an account</h3>
                    <form action="">
                        <div class="form-group">
                            <fieldset>
                                <label for="username">
                                    Username
                                </label>
                                <input class="form-control" name="username" id="username" type="text" autocomplete="off"
                                    placeholder="CoolName80">
                            </fieldset>
                        </div>
                        <div class="form-group">
                            <fieldset>
                                <label for="email">Email</label>
                                <input class="form-control" id="email" name="email" type="text" autocomplete="off"
                                    placeholder="myemail@gmail.com">
                            </fieldset>
                        </div>
                        <div class="form-group">
                            <fieldset>
                                <label for="password">Password</label>
                                <input class="form-control" id="password" name="password" type="password">
                            </fieldset>
                        </div>
                        <div class="form-group">
                            <fieldset>
                                <label for="Cpassword">Confirm password</label>
                                <input class="form-control" id="Cpassword" name="Cpassword" type="password">
                            </fieldset>
                        </div>
                        <input id="register_f_SEND" type="button" value="Register" class="btn btn-primary">
                        <p class="mt-3">
                            Already have an account?
                            <a href="index.php">Log in!</a>
                        </p>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>
    </main>
    <script src="login.js"></script>
</body>

</html>

<!-- <fieldset>
    <label>Username</label>
    <input name="username" type="text" autocomplete="off" placeholder="CoolName80">
</fieldset>
<fieldset>
    <label>Email</label>
    <input name="email" type="text" autocomplete="off" placeholder="myemail@gmail.com">
</fieldset>
<fieldset>
    <label>Password</label>
    <input name="password" type="password">
</fieldset>
<fieldset>
    <label>Confirm password</label>
    <input name="Cpassword" type="password">
</fieldset>
<input id="register_f_SEND" type="button" value="Register">
<p>You already have an account? <a href="index.php">Log in!</a></p> -->