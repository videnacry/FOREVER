<?php
    session_start();
    unset($_SESSION["loggedUserID"]);
    header("Location: ../../");
    