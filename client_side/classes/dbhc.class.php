<?php

class Dbhc
{
    public function connect()
    {
        try {
            $e_mail = 'root';
            $password = '';
            $dbh = new PDO('mysql:host=localhost;dbname=shirrbook', $e_mail, $password);
            return $dbh;
        } catch (Exception $e) {
            print "Error: " . $e->getMessage() . "<br>";
            die();
        }
    }
}
