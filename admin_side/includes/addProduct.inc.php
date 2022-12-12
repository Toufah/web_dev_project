<?php

if (isset($_POST['submit_add_product'])) {
    $product_name = $_POST['product_name'];
    $product_desc = $_POST['product_desc'];
    $product_quantity = $_POST['product_quantity'];
    $product_price = $_POST['product_price'];
    $product_image = $_FILES['product_image'];

    //Instantiate addProduct class
    include('../classes/dbh.class.php');
    include('../classes/addProduct.class.php');
    include('../classes/addProduct-contr.class.php');
    $product = new AddProductContr($product_name, $product_desc, $product_quantity, $product_price, $product_image);

    //Running method
    $product->addProduct();

    //go back to products.php
    header('Location: ../pages/Products.php?productAddedSuccessfully');
}
