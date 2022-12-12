<?php

    if(isset($_POST['submit_new_user'])){
        // data grabbed from the login
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $phone_number = $_POST['phone_number'];
        $e_mail = $_POST['e_mail'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];
        $userRole = $_POST['userRole'];

        //Instantiate loginContr class
        include("../classes/dbh.class.php");
        include("../classes/addUser.class.php");
        include("../classes/addUser-contr.class.php");
        $add_user = new AddUserContr($name, $lastname, $phone_number, $e_mail, $password, $cpassword, $userRole);

        //Running error handlers and user login
        $add_user->add_new_user();

        //sending user to dashboard
        header("Location: ../pages/adminUsers.php?UserAddedSuccessfuly");
    }