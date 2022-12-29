<?php
require_once('../classes/dbhc.class.php');
require_once("../classes/fetchProducts.class.php");

$fetchProducts = new FetchProducts();

$products = $fetchProducts->getProducts();
