<?php
include("dbh.class.php");
class FetchUsers extends Dbh
{
    private $users;
    private $adminsNumber;
    private $userRole;

    private function fetchUsersFromDb()
    {
        $stmt = $this->connect()->query("SELECT * FROM users");

        $i = 0;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->users[$i] = $row;
            $i++;
        }

        $stmt = null;
    }

    private function fetchUserById($user_id){
        $stmt = $this->connect()->prepare('SELECT * FROM users WHERE user_id=?');
        $stmt->execute(array($user_id));

        $this->users = $stmt->fetchAll(pdo::FETCH_ASSOC);
    }

    private function fetchNumberOfAdmins(){
        $stmt = $this->connect()->prepare('SELECT role_as FROM users WHERE role_as=1');
        $stmt->execute();

        $this->adminsNumber = count($stmt->fetchAll(pdo::FETCH_ASSOC));
    }

    private function fetchUserRole($user_id){
        $stmt = $this->connect()->prepare('SELECT role_as FROM users WHERE user_id=?');
        $stmt->execute(array($user_id));

        $this->userRole = $stmt->fetchAll(pdo::FETCH_ASSOC);
        $this->userRole = $this->userRole[0]['role_as'];
    }

    public function getUsers()
    {
        $this->fetchUsersFromDb();

        return $this->users;
    }

    public function getUserWithId($user_id){

        $this->fetchUserById($user_id);

        return $this->users;
    }

    public function getUserRole($user_id){
        $this->fetchUserRole($user_id);

        return $this->userRole;
    }

    public function getNumberOfAdmins(){
        $this->fetchNumberOfAdmins();

        return $this->adminsNumber;
    }
}
