<?php
session_start();
class RemoveProduct extends Dbh
{
    protected function removeProduct($product_id)
    {
        $stmt = $this->connect()->prepare('SELECT product_image FROM products WHERE product_id=?');

        if (!$stmt->execute(array($product_id))) {
            $stmt = null;
            $_SESSION["removeProductError"] = "stmtfailed";
            header('Location: ../pages/products.php?error=stmtfailed');
            exit();
        }

        if ($stmt->rowCount() == 0) {
            $stmt = null;
            $_SESSION["removeProductError"] = "can't find image name";
            header('Location: ../pages/products.php?error=cantFindImageName');
            exit();
        }

        $image_name = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $path = '../pictures/' . $image_name[0]['product_image'];

        $stmt = $this->connect()->prepare('DELETE FROM products WHERE product_id = ?');

        if (!$stmt->execute(array($product_id))) {
            $stmt = null;
            $_SESSION["removeProductError"] = "stmtfailed";
            header('Location: ../pages/products.php?error=stmtfailed');
            exit();
        }

        $stmt = null;

        if (!unlink($path)) {
            $stmt = null;
            $_SESSION["removeProductError"] = "can't delete image from pictures folder";
            header('Location: ../pages/products.php?error=cantDeleteImageFromPicturesFolder');
            exit();
        }

    }
}
