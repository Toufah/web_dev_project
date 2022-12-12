<?php
include('../classes/fetchUsers.class.php');
include('../classes/removeUser.class.php');
include('../classes/removeUser-contr.class.php');
if (isset($_GET['user_id'])) {
    //user id
    $user_id = $_GET['user_id'];

    //fetching the number of admins using fetchUsers class
    $user = new FetchUsers();
    $numberOfAdmins = $user->getNumberOfAdmins();

    //fetching role of user by id
    $userRole = $user->getUserRole($user_id);

    //removing with removeUser class controller
    $removeUser = new RemoveUserContr($user_id, $numberOfAdmins, $userRole);
    $removeUser->removeUserWithId();

    //sending user back to adminUsers
    header('Location: ../pages/adminUsers.php?userRemovedSuccefuly');
}
