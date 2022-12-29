<?php
class E_mailsContr extends E_mails
{
    private $e_mail;

    public function __construct($e_mail)
    {
        $this->e_mail = $e_mail;
    }
    
    private function e_mail_verification()
    {
        if (filter_var($this->e_mail, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    public function addE_mail(){
        if($this->e_mail_verification() == false){
            $_SESSION['add_e_mail_error'] = 'invalid e_mail';
            header('Location: ../pages/index.php?error=invalidE_mail');
            exit();
        }

        $this->setE_mail($this->e_mail);
    }
}
