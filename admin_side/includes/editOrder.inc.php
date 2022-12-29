<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('../classes/dbh.class.php');
require_once('../classes/fetchOrders.class.php');
if (isset($_POST["submitState"])) {
    $order_id = +$_GET['order_id'];
    $order_state = +$_POST['state'];

    $order = new FetchOrders();
    $order->editOrderState($order_id, $order_state);

    header('Location: ../pages/orders.php');
}