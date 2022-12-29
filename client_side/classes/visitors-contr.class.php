<?php
class VisitorsContr extends Visitors
{
    private $ip;

    public function __construct($ip)
    {
        $this->ip = $ip;
    }

    private function emptyInput()
    {
        if (empty($this->ip)) {
            return false;
        } else {
            return true;
        }
    }

    public function newVisitor()
    {
        if ($this->emptyInput()) {
            $this->setVisitor($this->ip);
        }
    }
}
