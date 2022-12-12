<?php
session_start();
class AddProduct extends Dbh
{
    protected function insertProductIntoDataBase($product_name, $product_desc, $product_quantity, $product_price, $product_image)
    {

        $file_name = $product_image['name'];
        $valid_image_extension = ['jpeg', 'jpg', 'png'];
        $image_extension = strtolower(end(explode('.', $file_name)));

        $new_image_name = uniqid();
        $new_image_name .= '.' . $image_extension;

        move_uploaded_file($product_image['tmp_name'], '../pictures/' . $new_image_name);


        $query = "INSERT INTO products VALUES ('', ?, ?, ?, ?, ?)";
        $stmt = $this->connect()->prepare($query);

        if (!$stmt->execute(array($product_name, $product_desc, $product_quantity, $product_price, $new_image_name))) {
            $_SESSION['add_prod_error'] = 'stmt Failed';
            header('Location: ../pages/Products.php?error=stmtFailed');
            exit();
        }

        $stmt = null;
        $_SESSION['add_prod_error'] = null;
    }
}