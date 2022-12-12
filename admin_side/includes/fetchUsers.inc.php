<?php
include("../classes/fetchUsers.class.php");
session_start();
if ($_SESSION["auth"]) {


    $users_obj = new FetchUsers();

    $users = $users_obj->getUsers();
}
