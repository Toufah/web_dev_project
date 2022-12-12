<?php
session_start();
class RemoveUser extends Dbh
{
    protected function removeUser($user_id)
    {
        $stmt = $this->connect()->prepare('DELETE FROM users WHERE user_id = ?');

        if (!$stmt->execute(array($user_id))) {
            $stmt = null;
            $_SESSION["removeError"] = "stmtfailed";
            header('Location: ../pages/adminUsers.php?error=stmtfailed');
            exit();
        }

        $_SESSION["removeError"] = null;
        $stmt = null;
    }
}
