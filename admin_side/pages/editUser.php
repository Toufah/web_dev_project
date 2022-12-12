<?php
include('../includes/fetchUsers.inc.php');
if (isset($_GET['user_id']) || $_SESSION['user_id']) {

    $userWithId;
    if (isset($_GET['user_id'])) {
        $userWithId = $users_obj->getUserWithId($_GET['user_id']);
    } else {
        $userWithId = $users_obj->getUserWithId($_SESSION['user_id']);
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- frame.css -->
        <link rel="stylesheet" href="../style/frame.css">
        <!-- editUser.css -->
        <link rel="stylesheet" href="../style/editUser.css">
        <title>Edit User : <?php echo $userWithId[0]['name']; ?></title>
    </head>

    <body>
        <section>
            <div class="container">
                <h1>
                    edit <?php echo $userWithId[0]['name']; ?>
                </h1>
                <form action="../includes/editUser.inc.php" method="POST">
                    <div>
                        <label for="user_id">user id</label>
                        <input type="text" name="user_id" id="user_id" value="<?php echo $userWithId[0]['user_id']; ?>" readonly>
                    </div>
                    <div>
                        <label for="name">name</label>
                        <input type="text" name="name" id="name" value="<?php echo $userWithId[0]['name']; ?>">
                    </div>
                    <div>
                        <label for="lastname">lastname</label>
                        <input type="text" name="lastname" id="lastname" value="<?php echo $userWithId[0]['lastname']; ?>">
                    </div>
                    <div>
                        <label for="phone_number">phone number</label>
                        <input type="number" name="phone_number" id="phone_number" value="<?php echo '0' . $userWithId[0]['phone_number']; ?>">
                    </div>
                    <div>
                        <label for="e_mail">e_mail</label>
                        <input type="text" name="e_mail" id="e_mail" value="<?php echo $userWithId[0]['e_mail']; ?>">
                    </div>
                    <div>
                        <label for="old_user_pwd">old password</label>
                        <input type="password" name="old_user_pwd" id="old_user_pwd">
                    </div>
                    <div>
                        <label for="new_user_pwd">new password</label>
                        <input type="password" name="new_user_pwd" id="new_user_pwd">
                    </div>
                    <div>
                        <label for="new_user_cpwd">confirm new password</label>
                        <input type="password" name="new_user_cpwd" id="new_user_cpwd">
                    </div>
                    <div>
                        <label for="role">role</label>
                        <input type="password" name="role" id="role" placeholder="admin/user">
                    </div>
                    <input type="submit" class='btn_s' name="save" value="save">
                    <input type="submit" class='btn_s' name="cancel" value="cancel">
                </form>
            </div>
        </section>
    </body>

    </html>
<?php
}
?>