<?php
session_start();
class EditProduct extends Dbh
{
    protected function editProductInDataBase($product_id, $product_name, $product_desc, $product_quantity, $product_price)
    {
        $stmt = $this->connect()->prepare('UPDATE products SET product_name=?, product_desc=?, product_quantity=?, product_price=? WHERE product_id=?');

        if (!$stmt->execute(array($product_name, $product_desc, $product_quantity, $product_price, $product_id))) {
            $_SESSION['edit_prod_error'] = 'stmt failed';
            $_SESSION['product_id'] = $product_id;
            header('Location: ../pages/editProduct.php?error=stmtFailed');
            exit();
        }
        $stmt = null;
        $_SESSION['edit_prod_error'] = null;
    }

    protected function editProductInDataBaseWithImage($product_id, $product_name, $product_desc, $product_quantity, $product_price, $product_image)
    {
        //moving new image to pictures folder
        $file_name = $product_image['name'];
        $valid_image_extension = ['jpeg', 'jpg', 'png'];
        $image_extension = strtolower(end(explode('.', $file_name)));

        $new_image_name = uniqid();
        $new_image_name .= '.' . $image_extension;

        move_uploaded_file($product_image['tmp_name'], '../pictures/' . $new_image_name);

        //deleting image from pictures folder

        $stmt = $this->connect()->prepare('SELECT product_image FROM products WHERE product_id=?');

        if (!$stmt->execute(array($product_id))) {
            $_SESSION['edit_prod_error'] = 'stmt failed';
            $_SESSION['product_id'] = $product_id;
            header('Location: ../pages/editProduct.php?error=stmtFailed');
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            $_SESSION['edit_prod_error'] = 'can\'t find image name';
            $_SESSION['product_id'] = $product_id;
            header('Location: ../pages/editProduct.php?error=cantFindImageName');
            exit();
        }

        $image_name = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $path = '../pictures/' . $image_name[0]['product_image'];

        //putting the new image name into the database
        
        $query = 'UPDATE products SET product_name=?, product_desc=?, product_quantity=?, product_price=?, product_image=? WHERE product_id=?';
        $stmt = $this->connect()->prepare($query);

        if (!$stmt->execute(array($product_name, $product_desc, $product_quantity, $product_price, $new_image_name, $product_id))) {
            $_SESSION['edit_prod_error'] = 'stmt failed';
            $_SESSION['product_id'] = $product_id;
            header('Location: ../pages/editProduct.php?error=stmtFailed');
            exit();
        }

        $stmt = null;
        $_SESSION['edit_prod_error'] = null;
    }
}
