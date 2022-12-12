<?php
class AddUserContr extends AddUser
{
    private $name;
    private $lastname;
    private $phone_number;
    private $e_mail;
    private $password;
    private $cpassword;
    private $userRole;

    public function __construct($name, $lastname, $phone_number, $e_mail, $password, $cpassword, $userRole)
    {
        $this->name = $name;
        $this->lastname = $lastname;
        $this->phone_number = $phone_number;
        $this->e_mail = $e_mail;
        $this->password = $password;
        $this->cpassword = $cpassword;
        $this->userRole = strtolower($userRole);
    }

    private function emptyInput()
    {
        if (empty($this->name) || empty($this->lastname) || empty($this->phone_number) || empty($this->e_mail) || empty($this->password) || empty($this->cpassword) || empty($this->userRole)) {
            return false;
        } else {
            return true;
        }
    }

    private function password_match()
    {
        if ($this->password != $this->cpassword) {
            return false;
        } else {
            return true;
        }
    }

    private function e_mail_verification()
    {
        if (filter_var($this->e_mail, FILTER_VALIDATE_EMAIL)) {
            return true;
        } else {
            return false;
        }
    }

    private function userRoleVerification()
    {
        if ($this->userRole === 'admin' || $this->userRole === 'user') {
            return true;
        } else {
            return false;
        }
    }

    private function userRoleTobool(){
        if($this->userRole === 'admin'){
            return 1;
        }else{
            return 0;
        }
    }

    public function add_new_User()
    {
        if ($this->emptyInput() == false) {
            $_SESSION["addUserError"] = "empty input";
            header('Location: ../pages/adminUsers.php?error=emptyInput');
            exit();
        }

        if ($this->e_mail_verification() == false) {
            $_SESSION["addUserError"] = "invalid e_mail";
            header('Location: ../pages/adminUsers.php?error=invalidE_mail');
            exit();
        }

        if ($this->password_match() == false) {
            $_SESSION["addUserError"] = "passwords not matching";
            header('Location: ../pages/adminUsers.php?error=passwordsNotMatching');
            exit();
        }

        if ($this->userRoleVerification() == false) {
            $_SESSION["addUserError"] = "invalid user role";
            header('Location: ../pages/adminUsers.php?error=invalidUserRole');
            exit();
        }

        $this->_add_new_user($this->name, $this->lastname, $this->phone_number, $this->e_mail, $this->password, $this->userRoleTobool());
    }
}
