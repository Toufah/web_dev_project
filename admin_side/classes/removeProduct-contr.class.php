<?php
class RemoveProductContr extends RemoveProduct
{
    private $product_id;

    public function __construct($product_id)
    {
        $this->product_id= $product_id;
    }

    public function removeProductWithId()
    {
        
        $this->removeProduct($this->product_id);
    }
}
