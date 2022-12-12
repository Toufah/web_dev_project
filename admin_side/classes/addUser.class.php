<?php
session_start();

class AddUser extends Dbh
{
    protected function _add_new_user($name, $lastname, $phone_number, $e_mail, $password, $userRole)
    {
        $stmt = $this->connect()->prepare('SELECT e_mail FROM users WHERE e_mail = ?;');

        if (!$stmt->execute(array($e_mail))) {
            $stmt = null;
            $_SESSION["addUserError"] = "stmtfailed";
            header('Location: ../pages/adminUsers.php?error=stmtfailed');
            exit();
        }

        if ($stmt->rowCount() != 0) {
            $stmt = null;
            $_SESSION["addUserError"] = "user already exists";
            header('Location: ../pages/adminUsers.php?error=UserAlreadyExists');
            exit();
        }

        $query = "INSERT INTO users (name, lastname, phone_number, e_mail, user_pwd, role_as) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($query);

        if (!$stmt->execute(array($name, $lastname, $phone_number, $e_mail, $password, $userRole))) {
            $stmt = null;
            $_SESSION["addUserError"] = "stmtfailed";
            header('Location: ../pages/adminUsers.php?error=stmtfailed');
            exit();
        }

        $_SESSION['addUserError'] = Null;
        $stmt = null;
    }
}
