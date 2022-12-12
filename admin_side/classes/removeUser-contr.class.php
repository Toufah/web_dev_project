<?php
class RemoveUserContr extends RemoveUser
{
    private $user_id;
    private $numberOfAdmins;
    private $userRole;

    public function __construct($user_id, $numberOfAdmins, $userRole)
    {
        $this->user_id = $user_id;
        $this->numberOfAdmins = $numberOfAdmins;
        $this->userRole = $userRole;
    }

    private function checkNumberOfAdmins()
    {
        if (($this->numberOfAdmins <= 1) && ($this->userRole == 1)) {
            return false;
        } else {
            return true;
        }
    }

    public function removeUserWithId()
    {

        if (!$this->checkNumberOfAdmins()) {
            $_SESSION["removeError"] = "give another user the admin role";
            header('Location: ../pages/adminUsers.php?error=giveAnotherUserTheAdminRole');
            exit();
        }
        
        $this->removeUser($this->user_id);
    }
}
