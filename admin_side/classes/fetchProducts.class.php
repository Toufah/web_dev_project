<?php
include("dbh.class.php");
class FetchProducts extends Dbh
{
    private $products;
    private $product;

    private function fetchProductsFromDb()
    {
        $stmt = $this->connect()->query("SELECT * FROM products");

        $i = 0;
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $this->products[$i] = $row;
            $i++;
        }

        $stmt = null;
    }

    private function fetchProductWithId($product_id)
    {
        $stmt = $this->connect()->prepare('SELECT * FROM products WHERE product_id=?');

        $stmt->execute(array($product_id));

        $this->product = $stmt->fetchAll(pdo::FETCH_ASSOC);
    }

    public function getProducts()
    {
        $this->fetchProductsFromDb();

        return $this->products;
    }

    public function getProductWithId($product_id)
    {

        $this->fetchProductWithId($product_id);

        return $this->product;
    }
}
