<?php
session_start();
class EditUser extends Dbh
{
    protected function editUser($user_id, $name, $lastname, $phone_number, $e_mail, $old_pwd, $new_pwd, $role_as)
    {
        $stmt = $this->connect()->prepare('SELECT e_mail FROM users WHERE user_id != ? AND e_mail = ?;');

        if (!$stmt->execute(array($user_id, $e_mail))) {
            $_SESSION['edit_user_error'] = 'stmt Failed';
            $_SESSION["user_id"] = $user_id;
            header('Location: ../pages/editUser.php?error=stmtFailed');
            exit();
        }

        if ($stmt->rowCount() != 0) {
            $stmt = null;
            $_SESSION["edit_user_error"] = "user already exists try a different e_mail";
            $_SESSION["user_id"] = $user_id;
            header('Location: ../pages/editUser.php?error=userAlreadyExistsTryADifferentE_mail');
            exit();
        }
        
        $stmt = $this->connect()->prepare('SELECT user_pwd FROM users WHERE e_mail = ?');

        if (!$stmt->execute(array($e_mail))) {
            $_SESSION['edit_user_error'] = 'stmt Failed';
            $_SESSION["user_id"] = $user_id;
            header('Location: ../pages/editUser.php?error=stmtFailed');
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            $_SESSION["edit_user_error"] = "user password not found";
            $_SESSION["user_id"] = $user_id;
            header('Location: ../pages/editUser.php?error=userPasswordNotFound');
            exit();
        }

        $old_pwd_hashed = $stmt->fetchAll(pdo::FETCH_ASSOC);

        if ($old_pwd_hashed[0]['user_pwd'] != $old_pwd) {
            $stmt = null;
            $_SESSION["edit_user_error"] = "incorrect Old Password";
            $_SESSION["user_id"] = $user_id;
            header('Location: ../pages/editUser.php?error=incorrectOldPassword');
            exit();
        }

        $stmt = $this->connect()->prepare('UPDATE users SET name=?, lastname=?, phone_number=?, e_mail=?, user_pwd=?, role_as=? WHERE user_id=?');

        if (!$stmt->execute(array($name, $lastname, $phone_number, $e_mail, $new_pwd, $role_as, $user_id))) {
            $_SESSION['edit_user_error'] = 'stmt Failed';
            $_SESSION["user_id"] = $user_id;
            header('Location: ../pages/editUser.php?error=stmtFailed');
            exit();
        }

        $stmt = null;
        $_SESSION['edit_user_error'] = null;
        $_SESSION["user_id"] = null;
    }
}
