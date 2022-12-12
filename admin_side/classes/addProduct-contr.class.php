<?php
class AddProductContr extends AddProduct
{
    private $product_name;
    private $product_desc;
    private $product_quantity;
    private $product_price;
    private $product_image;

    public function __construct($product_name, $product_desc, $product_quantity, $product_price, $product_image)
    {
        $this->product_name = $product_name;
        $this->product_desc = $product_desc;
        $this->product_quantity = $product_quantity;
        $this->product_price = $product_price;
        $this->product_image = $product_image;
    }

    private function checkInput()
    {
        if (empty($this->product_name) || empty($this->product_desc) || empty($this->product_quantity) || empty($this->product_price) || empty($this->product_image)) {
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

    private function check_image()
    {
        $file_name = $this->product_image['name'];
        $file_size = $this->product_image['size'];

        $valid_image_extension = ['jpeg', 'jpg', 'png'];
        $image_extension = explode('.', $file_name);
        $image_extension = strtolower(end($image_extension));

        if (!in_array($image_extension, $valid_image_extension)) {
            $_SESSION['add_prod_error'] = 'invalid image extension';
            header('Location: ../pages/Products.php?error=invalidImageExtension');
            exit();
        } elseif ($file_size > 1000000) {
            $_SESSION['add_prod_error'] = 'image size is too large';
            header('Location: ../pages/Products.php?error=imageSizeTooLarge');
            exit();
        }
    }

    public function addProduct()
    {
        if ($this->checkInput() == false) {
            $_SESSION['add_prod_error'] = 'empty input';
            header('Location: ../pages/Products.php?error=emptyInput');
            exit();
        }

        if ($this->positifNumbers() == false) {
            $_SESSION['add_prod_error'] = 'negative values';
            header('Location: ../pages/Products.php?error=negativeValues');
            exit();
        }

        $this->check_image();

        $this->insertProductIntoDataBase($this->product_name, $this->product_desc, $this->product_quantity, $this->product_price, $this->product_image);
    }
}
