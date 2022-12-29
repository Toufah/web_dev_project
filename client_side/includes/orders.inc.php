<?php
session_start();
if (isset($_POST['submit_order'])) {
    $client_name = $_POST['client_name'];
    $client_lastname = $_POST['client_lastname'];
    $client_cin = $_POST['client_cin'];
    $client_phone_number = $_POST['client_phone_number'];
    $client_e_mail = $_POST['client_e_mail'];
    $client_adress = $_POST['client_adress'];
    $client_city = $_POST['client_city'];
    $client_zip = $_POST['client_zip'];
    $product_invoice = (float)$_GET['total'];

    //passing the order from session to a new variable
    $order = $_SESSION['myCart'];


    //passing order
    require_once('../classes/dbhc.class.php');
    require_once('../classes/orders.class.php');
    require_once('../classes/orders-contr.class.php');
    $passOrder = new OrdersContr($client_name, $client_lastname, $client_cin, $client_phone_number, $client_e_mail, $client_adress, $client_city, $client_zip, $order, $product_invoice);
    $passOrder->newOrder();

    //go back
    header('Location: ../pages/index.php?OrderAddedSuccefuly');
}
