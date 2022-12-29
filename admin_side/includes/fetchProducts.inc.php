<?php
if (!isset($_SESSION)) {
    session_start();
}
require_once('../classes/dbh.class.php');
require_once("../classes/fetchProducts.class.php");
if ($_SESSION["auth"]) {

    $fetchProducts = new FetchProducts();

    $products = $fetchProducts->getProducts();
}
