<?php
session_start();

class Login extends Dbh
{
    protected function getUser($e_mail, $user_pwd)
    {
        $stmt = $this->connect()->prepare('SELECT user_pwd FROM users WHERE e_mail = ?;');

        if (!$stmt->execute(array($e_mail))) {
            $stmt = null;
            $_SESSION["errorMessage"] = "stmtfailed";
            header('Location: ../pages/index.php?error=stmtfailed');
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            $_SESSION["errorMessage"] = "user not found";
            header('Location: ../pages/index.php?error=usernotfound');
            exit();
        }

        $pwdHashed = $stmt->fetchAll(PDO::FETCH_ASSOC);
        // password_verify() -> returns true or false

        if ($user_pwd === $pwdHashed[0]['user_pwd']) {
            $checkPwd = true;
        } else {
            $checkPwd = false;
        }

        if ($checkPwd == false) {
            $stmt = null;
            $_SESSION["errorMessage"] = "wrong password";
            header('Location: ../pages/index.php?error=wrongpassword');
            exit();
        } elseif ($checkPwd == true) {
            $stmt = $this->connect()->prepare('SELECT * FROM users WHERE e_mail = ? AND user_pwd= ?;');

            if ($stmt->execute(array($e_mail, $user_pwd)) == false) {
                $stmt = null;
                $_SESSION["errorMessage"] = "stmtfailed";
                header('Location:../pages/index.php?error=stmtfailed');
                exit();
            }

            if ($stmt->rowCount() == 0) {
                $stmt = null;
                $_SESSION["errorMessage"] = "user not found";
                header('Location: ../pages/index.php?error=usernotfound');
                exit();
            }

            $user = $stmt->fetchAll(PDO::FETCH_ASSOC);

            $_SESSION["errorMessage"] = null;
            $_SESSION['auth'] = true;
            $_SESSION['e_mail'] = $user[0]['e_mail'];
            $_SESSION['role_as'] = $user[0]['role_as'];
            
            $stmt = null;
        }
        $stmt = null;
    }
}
