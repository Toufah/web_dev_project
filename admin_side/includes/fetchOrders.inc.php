<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('../classes/dbh.class.php');
require_once("../classes/fetchOrders.class.php");
if ($_SESSION["auth"]) {

    $fetchOrders = new FetchOrders();

    $orders = $fetchOrders->getOrders();
}
