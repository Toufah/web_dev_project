<?php
session_start();
include("../classes/fetchProducts.class.php");
if ($_SESSION["auth"]) {

    $fetchProducts = new FetchProducts();

    $products = $fetchProducts->getProducts();

}
