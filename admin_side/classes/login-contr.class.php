<?php
    session_start();
    class LoginContr extends Login{
        private $e_mail;
        private $password;

        public function __construct($e_mail, $password){
            $this->e_mail = $e_mail;
            $this->password = $password;
        }

        private function emptyInput(){
            if(empty($this->e_mail) || empty($this->password)){
                return false;
            }else{
                return true;
            }
        }

        public function loginUser(){
            if($this->emptyInput() == false){
                $_SESSION["errorMessage"] = "empty input";
                header('Location: ../pages/index.php?emptyInput');
                exit();
            }

            $this->getUser($this->e_mail, $this->password);
        }
    }