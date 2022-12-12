<?php
    if(isset($_POST['save'])){
        
        include('../classes/dbh.class.php');
        include('../classes/editUser.class.php');
        include('../classes/editUser-contr.class.php');

        $user_id = $_POST['user_id'];
        $name = $_POST['name'];
        $lastname = $_POST['lastname'];
        $phone_number = $_POST['phone_number'];
        $e_mail = $_POST['e_mail'];
        $old_pwd = $_POST['old_user_pwd'];
        $new_pwd = $_POST['new_user_pwd'];
        $new_cpwd = $_POST['new_user_cpwd'];
        $role_as = $_POST['role'];

        //new object from the editUserContr class
        $edit_user = new EditUserContr($user_id, $name, $lastname, $phone_number, $e_mail, $old_pwd, $new_pwd, $new_cpwd, $role_as);
        $edit_user->edit_user();

        header('Location: ../pages/adminUsers.php?userEditedSuccefully');
    }
    if(isset($_POST['cancel'])){
        header('Location: ../pages/adminUsers.php');
    }