<?php
class Visitors extends Dbhc
{
    protected function setVisitor($ip)
    {

        $stmt = $this->connect()->prepare('SELECT ip_adress FROM visitors WHERE ip_adress= ? AND DAY(date)=DAY(CURRENT_TIMESTAMP)');

        $stmt->execute(array($ip));

        if ($stmt->rowCount() == 0) {

            $stmt = $this->connect()->prepare('INSERT INTO visitors (ip_adress) VALUES (?)');

            if (!$stmt->execute(array($ip))) {
                $_SESSION['track'] = false;
            } else {
                $_SESSION['track'] = true;
            }

            $stmt = null;
        }
    }
}
