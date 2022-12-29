<?php
session_start();
if (isset($_POST['addToCart'])) {
    $product_id = $_GET['product_id'];

    if (isset($_SESSION['myCart'])) {
        $item_array_id = array_column($_SESSION['myCart'], 'product_id');

        //checking if product id already exists in the cart
        if (in_array($product_id, $item_array_id)) {
            $_SESSION['add_to_cart_error'] = 'product already exists in the cart';
            header('Location: ../pages/index.php?error=productAlreadyExistsInTheCart');
        } else {
            $count = count($_SESSION['myCart']);
            $item_array = ['product_id' => +$product_id, 'quantity' => 1];
            $_SESSION['myCart'][$count] = $item_array;
            $_SESSION['add_to_cart_error'] = 'product added to the cart';
            header('Location: ../pages/index.php?productAddedToTheCart');
        }
    } else {
        $item_array = ['product_id' => +$product_id, 'quantity' => 1];
        // creating new session variable
        $_SESSION['myCart'][0] = $item_array;
        $_SESSION['add_to_cart_error'] = 'product added to the cart';
        header('Location: ../pages/index.php?productAddedToTheCart');
    }
}

//remove From Cart
if (isset($_POST['removeFromCart'])) {
    $product_id = $_GET['product_id'];

    //removing the product from the cart
    function removeProduct($product_id)
    {
        $count = count($_SESSION['myCart']);
        for ($i = 0; $i < $count; $i++) {
            if ($product_id == $_SESSION['myCart'][$i]['product_id']) {
                unset($_SESSION['myCart'][$i]);
            }
        }
    }

    removeProduct($product_id);

    //reIndexing the array
    function reIndex()
    {
        //extracting array value from session
        $arr = array_values($_SESSION['myCart']);

        $_SESSION['myCart'] = $arr;
    }

    reIndex();

    $_SESSION['remove_from_cart_error'] = 'product removed from the cart';
    header('Location: ../pages/myCart.php?productRemovedFromTheCart');
}

//updating the product in the cart
if (isset($_POST['saveToCart'])) {
    require_once('../classes/fetchProducts.class.php');

    //finding product index
    function findIndex($product_id){
        $count = $_SESSION['myCart'];
        for($i = 0; $i < $count; $i++){
            if($_SESSION['myCart'][$i]['product_id'] == $product_id){
                return $i;
            }
        }
    }
    $product_id = +$_GET['product_id'];
    $quantity = +$_POST['quantity'];

    //getting product quantity from db
    $product = new FetchProducts();
    $productWithId = $product->getProductWithId($product_id);
    $productQuantity = $productWithId[0]['product_quantity'];

    if($quantity > $productQuantity){
        $_SESSION['update_cart_error'] = 'there is only ' . $productQuantity . 'item left in the stock';
        header('Location: ../pages/myCart.php?error=thereIsOnly'.$productQuantity.'ItemLeftInTheStock');
    }else{
        $index = findIndex($product_id);
        $_SESSION['myCart'][$index]['quantity'] = $quantity;

        $_SESSION['update_cart_error'] = 'product updated';
        header('Location: ../pages/myCart.php?productUpdated');
    }
}
