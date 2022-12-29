<?php
require_once('../classes/dbh.class.php');
require_once("../classes/visitors.class.php");
if ($_SESSION["auth"]) {

    $visitors = new Visitors();

    $counter = $visitors->getVisitorsToday();
}