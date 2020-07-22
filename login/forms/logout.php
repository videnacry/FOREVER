<?php
    session_start();
    unset($_SESSION["loggedUserID"]);
    unset($_SESSION["user"]);
    header("Location: ../../");
    