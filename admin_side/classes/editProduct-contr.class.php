<?php
class EditProductContr extends EditProduct
{
    private $product_id;
    private $product_name;
    private $product_desc;
    private $product_quantity;
    private $product_price;
    private $product_image;

    public function __construct($product_id, $product_name, $product_desc, $product_quantity, $product_price, $product_image)
    {
        $this->product_id = $product_id;
        $this->product_name = $product_name;
        $this->product_desc = $product_desc;
        $this->product_quantity = $product_quantity;
        $this->product_price = $product_price;
        $this->product_image = $product_image;
    }

    private function checkInput()
    {
        if (empty($this->product_id) || empty($this->product_name) || empty($this->product_desc) || empty($this->product_quantity) || empty($this->product_price)) {
            return false;
        } else {
            return true;
        }
    }

    private function checkProductImageInput()
    {
        if ($this->product_image['size'] == 0) {
            return false;
        } else {
            return true;
        }
    }

    private function positifNumbers()
    {
        if (($this->product_quantity < 0) || ($this->product_price < 0)) {
            return false;
        } else {
            return true;
        }
    }

    public function edit_product()
    {
        if ($this->checkInput() == false) {
            $_SESSION['edit_prod_error'] = 'empty input';
            $_SESSION['product_id'] = $this->product_id;
            header('Location: ../pages/editProduct.php?error=emptyInput');
            exit();
        }

        if ($this->positifNumbers() == false) {
            $_SESSION['edit_prod_error'] = 'negative values';
            $_SESSION['product_id'] = $this->product_id;
            header('Location: ../pages/editProduct.php?error=negativeValues');
            exit();
        }

        if($this->checkProductImageInput() == true){
            $this->editProductInDataBaseWithImage($this->product_id, $this->product_name, $this->product_desc, $this->product_quantity, $this->product_price, $this->product_image);
        }

        $this->editProductInDataBase($this->product_id, $this->product_name, $this->product_desc, $this->product_quantity, $this->product_price);

    }
}
