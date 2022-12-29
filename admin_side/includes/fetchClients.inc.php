<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('../classes/dbh.class.php');
require_once("../classes/fetchClients.class.php");
if ($_SESSION["auth"]) {

    $clients = new FetchClients();
}
