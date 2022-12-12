<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- adminUsers.css -->
    <link rel="stylesheet" href="../style/adminUsers.css">
    <!-- font style -->
    <link rel="stylesheet" href="../style/all.min.css">
    <!-- frame.css -->
    <link rel="stylesheet" href="../style/frame.css">
    <!-- sidebar.css -->
    <link rel="stylesheet" href="../style/sidebar.css">
    <!-- navbar -->
    <link rel="stylesheet" href="../style/navbar.css">
    <!-- media.css -->
    <link rel="stylesheet" href="../style/media.css">
    <title>Admin Users</title>
</head>

<body>
    <!-- sidebar -->
    <?php include('sidebar.php') ?>
    <!-- start dashboard -->
    <section id="container" style="position: relative;">
        <?php
        if (isset($_SESSION['addUserError'])) {
        ?>
            <h1 class="alert">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <?php
                echo $_SESSION["addUserError"];
                ?>
            </h1>
        <?php } ?>
        <i class="fa-solid fa-arrow-right" id="arrow"></i>
        <!-- navbar -->
        <?php include('navbar.php') ?>
        <!-- fetchUsers.inc.php -->
        <?php include('../includes/fetchUsers.inc.php'); ?>
        <!-- start adminUsers body -->
        <section id="admin_cont">
            <div class="admin_cont">
                <div class="text di_fl_sb">
                    <h1>Users</h1>
                    <div>
                        <?php
                        if ($_SESSION['role_as'] == 1) {
                        ?>
                            <button class="btn" id="addUs">add user</button>
                        <?php
                        }
                        ?>
                    </div>
                </div>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <td>user id</td>
                                <td>name</td>
                                <td>lastname</td>
                                <td>phone number</td>
                                <td>e_mail</td>
                                <td>role</td>
                                <td>
                                    <?php
                                    if ($_SESSION['role_as'] == 1) {
                                    ?>
                                        actions
                                    <?php
                                    }
                                    ?>
                                </td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if ($users != null) {
                                for ($i = 0; $i < count($users); $i++) {
                            ?>
                                    <tr>
                                        <td><?php echo $users[$i]['user_id']; ?></td>
                                        <td><?php echo $users[$i]['name']; ?></td>
                                        <td><?php echo $users[$i]['lastname']; ?></td>
                                        <td>0<?php echo $users[$i]['phone_number']; ?></td>
                                        <td><?php echo $users[$i]['e_mail']; ?></td>
                                        <td>
                                            <?php
                                            if ($users[$i]['role_as'] == 0) {
                                                echo 'user';
                                            } elseif ($users[$i]['role_as'] == 1) {
                                                echo 'admin';
                                            }
                                            ?>
                                        </td>
                                        <td>
                                            <?php
                                            if ($_SESSION['role_as'] == 1) {
                                            ?>
                                                <a href="editUser.php?user_id=<?php echo $users[$i]['user_id']; ?>" class="a_norm"><button class='edit_delete edit'>edit</button></a>
                                                <?php
                                                if ($_SESSION['e_mail'] != $users[$i]['e_mail']) {
                                                ?>
                                                    <a href="../includes/removeUser.inc.php?user_id=<?php echo $users[$i]['user_id']; ?>" class="a_norm"><button class='edit_delete delete'>remove</button></a>
                                        <?php
                                                }
                                            }
                                        }
                                        ?>
                                        </td>
                                    </tr>
                                <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- end adminUsers body -->
    </section>
    <section id="add_user" class="close">
        <div class="content">
            <i class="fa-solid fa-xmark" id="xmark"></i>
            <div>
                <h1>add user</h1>
            </div>
            <form action="../includes/addUser.inc.php" method="POST">
                <div>
                    <label for="name">name</label>
                    <input type="text" name="name" autofocus required>
                </div>
                <div>
                    <label for="lastname">lastname</label>
                    <input type="text" name="lastname" required>
                </div>
                <div>
                    <label for="phone_number">phone number</label>
                    <input type="number" name="phone_number" required>
                </div>
                <div>
                    <label for="e_mail">e_mail</label>
                    <input type="text" name="e_mail" required>
                </div>
                <div>
                    <label for="password">password</label>
                    <input type="password" name="password" required>
                </div>
                <div>
                    <label for="cpassword">confirm password</label>
                    <input type="password" name="cpassword" required>
                </div>
                <div>
                    <label for="userRole">user role</label>
                    <input type="text" name="userRole" required placeholder="admin/user">
                </div>
                <input type="submit" name="submit_new_user" value="add user">
            </form>
        </div>
        <!-- clickEvents.js -->
        <script src="../scripts/clickEvents.js"></script>
</body>

</html>