<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Develop Your Project with PHP</title>
    <!-- Own stylesheet -->
    <link href="../../src/css/style.css" rel="stylesheet" />
    <!-- Font awesome -->
    <script src="https://kit.fontawesome.com/de217cab6a.js" crossorigin="anonymous"></script>
    <!--NPM Packages -->
    <script src="../../node_modules/jquery/dist/jquery.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.js"></script>
    <link href="../../node_modules/bootstrap/dist/css/bootstrap.css" rel="stylesheet" />
</head>

<body>
    <main>
        <div class="container">
            <div class="row align-items-center login-cont">
                <div class="col-md-3"></div>
                <div class="col-md-6">
                    <h3 class="text-center m-5">Login</h3>
                    <form action="">
                        <div class="form-group">
                            <fieldset>
                                <label for="usermail">
                                    Username or Email
                                </label>
                                <input class="form-control" name="usermail" id="usermail" type="text" autocomplete="off"
                                    placeholder="CoolName80">
                            </fieldset>
                        </div>
                        <div class="form-group">
                            <fieldset>
                                <label for="password">
                                    Password
                                </label>
                                <input class="form-control" name="password" id="password" type="password">
                            </fieldset>
                        </div>
                        <input id="login_f_SEND" type="button" value="Log in" class="btn btn-primary">
                        <p class="mt-3">
                            Don't have an account?
                            <a href="index.php?register">
                                Register Now!
                            </a>
                        </p>
                    </form>
                </div>
                <div class="col-md-3"></div>
            </div>
        </div>


        <!-- <form action="">
            <div class="form-group">
                <fieldset>
                    <label for="usermail">
                        Username or Email
                    </label>
                    <input class="form-control" name="usermail" id="usermail" type="text" autocomplete="off" placeholder="CoolName80">
                </fieldset>
            </div>
            <div class="form-group">
                <fieldset>
                    <label for="password">
                        Password
                    </label>
                    <input name="password" id="password" type="password">
                </fieldset>
            </div>
            <input id="login_f_SEND" type="button" value="Log in">
            <p>
                You don't have an account?
                <a href="index.php?register">
                    Register Now!
                </a>
            </p>
        </form> -->
    </main>
    <script src="../login.js"></script>
</body>

</html>