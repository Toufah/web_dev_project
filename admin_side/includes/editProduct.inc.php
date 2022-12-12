<?php
if (isset($_POST['save'])) {

    include('../classes/dbh.class.php');
    include('../classes/editProduct.class.php');
    include('../classes/editProduct-contr.class.php');

    $product_id = $_POST['product_id'];
    $product_name = $_POST['product_name'];
    $product_desc = $_POST['product_desc'];
    $product_quantity = $_POST['product_quantity'];
    $product_price = $_POST['product_price'];
    $product_image = $_FILES['product_image'];

    $product = new EditProductContr($product_id, $product_name, $product_desc, $product_quantity, $product_price, $product_image);
    $product->edit_product();

    header('Location: ../pages/products.php?productEditedSuccessfuly');

}
if (isset($_POST['cancel'])) {
    header('Location: ../pages/products.php');
}
