<?php
class Visitors extends Dbh
{
    private $counter;
    private function todaysVisitorsNumber()
    {
        $stmt = $this->connect()->prepare('SELECT * FROM visitors WHERE DAY(date)=DAY(CURRENT_TIMESTAMP);');
        $stmt->execute();

        $this->counter = $stmt->fetchAll(pdo::FETCH_ASSOC);
        $stmt = null;
    }

    public function getVisitorsToday()
    {
        $this->todaysVisitorsNumber();

        return count($this->counter);
    }
}
