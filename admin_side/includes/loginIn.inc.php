<?php

    if(isset($_POST['submit_log_in'])){
        // data grabbed from the login
        $e_mail = $_POST['e_mail'];
        $password = $_POST['password'];

        //Instantiate loginContr class
        include("../classes/dbh.class.php");
        include("../classes/login.class.php");
        include("../classes/login-contr.class.php");
        $login = new LoginContr($e_mail, $password);

        //Running error handlers and user login
        $login->loginUser();

        //sending user to dashboard
        header("Location: ../pages/dashboard.php?loggedIn");
    }