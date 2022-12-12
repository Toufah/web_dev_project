<?php

if (isset($_GET['product_id'])) {
    include('../classes/dbh.class.php');
    include('../classes/removeProduct.class.php');
    include('../classes/removeProduct-contr.class.php');
    //product id
    $product_id = $_GET['product_id'];
    
    //removing with removeProduct class controller
    $product = new RemoveProductContr($product_id);
    $product->removeProductWithId();

    //sending user back to adminUsers
    header('Location: ../pages/products.php?productRemovedSuccefuly');
}