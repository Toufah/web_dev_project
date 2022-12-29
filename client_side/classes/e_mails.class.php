<?php
class E_mails extends Dbhc
{
    protected function setE_mail($e_mail){
        //checking if e_mail already exists
        $stmt = $this->connect()->prepare('SELECT e_mail FROM e_mails WHERE e_mail = ?');

        if(!$stmt->execute(array($e_mail))){
            $_SESSION['add_e_mail_error'] = 'stmt failed';
            header('Location: ../pages/index.php?error=stmtFailed');
            exit();
        }

        if($stmt->rowCount() != 0){
            $_SESSION['add_e_mail_error'] = 'e_mail already exists';
            header('Location: ../pages/index.php?error=e_mailAlreadyExists');
            exit();
        }

        $stmt = $this->connect()->prepare('INSERT INTO e_mails (e_mail) VALUES (?)');

        if(!$stmt->execute(array($e_mail))){
            $_SESSION['add_e_mail_error'] = 'stmt failed';
            header('Location: ../pages/index.php?error=stmtFailed');
            exit();
        }

        $stmt = null;
        $_SESSION['add_e_mail_error'] = null;
    }
}
