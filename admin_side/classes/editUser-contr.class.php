<?php
class EditUserContr extends EditUser
{
    private $user_id;
    private $name;
    private $lastname;
    private $phone_number;
    private $e_mail;
    private $old_pwd;
    private $new_pwd;
    private $new_cpwd;
    private $role_as;

    public function __construct($user_id, $name, $lastname, $phone_number, $e_mail, $old_pwd, $new_pwd, $new_cpwd, $role_as)
    {
        $this->user_id = $user_id;
        $this->name = $name;
        $this->lastname = $lastname;
        $this->phone_number = $phone_number;
        $this->e_mail = $e_mail;
        $this->old_pwd = $old_pwd;
        $this->new_pwd = $new_pwd;
        $this->new_cpwd = $new_cpwd;
        $this->role_as = $role_as;
    }

    private function emptyInput()
    {
        if (empty($this->name) || empty($this->lastname) || empty($this->phone_number) || empty($this->e_mail) || empty($this->old_pwd) || empty($this->new_pwd) || empty($this->new_cpwd) || empty($this->user_id)) {
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

    private function password_match()
    {
        if ($this->new_pwd != $this->new_cpwd) {
            return false;
        } else {
            return true;
        }
    }

    private function userRoleVerification()
    {
        if ($this->role_as === 'admin' || $this->role_as === 'user') {
            return true;
        } else {
            return false;
        }
    }

    private function userRoleTobool()
    {
        if ($this->role_as === 'admin') {
            return 1;
        } else {
            return 0;
        }
    }

    public function edit_user()
    {
        if ($this->emptyInput() == false) {
            $_SESSION["edit_user_error"] = "empty input";
            $_SESSION["user_id"] = $this->user_id;
            header('Location: ../pages/editUser.php?error=emptyInput');
            exit();
        }

        if ($this->e_mail_verification() == false) {
            $_SESSION["edit_user_error"] = "invalid e_mail";
            $_SESSION["user_id"] = $this->user_id;
            header('Location: ../pages/editUser.php?error=invalidE_mail');
            exit();
        }

        if ($this->password_match() == false) {
            $_SESSION["edit_user_error"] = "new passwords not matching";
            $_SESSION["user_id"] = $this->user_id;
            header('Location: ../pages/editUser.php?error=newPasswordsNotMatching');
            exit();
        }

        if ($this->userRoleVerification() == false) {
            $_SESSION["edit_user_error"] = "invalid user role";
            $_SESSION["user_id"] = $this->user_id;
            header('Location: ../pages/editUser.php?error=invalidUserRole');
            exit();
        }

        $this->editUser($this->user_id, $this->name, $this->lastname, $this->phone_number, $this->e_mail, $this->old_pwd, $this->new_pwd, $this->role_as);
    }
}
