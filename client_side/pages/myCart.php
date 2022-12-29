<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- favicon -->
    <?php require_once('../includes/favicon.inc.php'); ?>
    <!-- myCart.css -->
    <link rel="stylesheet" href="../style/myCart.css">
    <!-- framework.css -->
    <link rel="stylesheet" href="../style/framework.css">
    <!-- all.min.css -->
    <link rel="stylesheet" href="../style/all.min.css">
    <!-- normalize.css -->
    <link rel="stylesheet" href="../style/normalize.css">
    <!-- animation.css -->
    <link rel="stylesheet" href="../style/animation.css">
    <!-- hover.css -->
    <link rel="stylesheet" href="../style/hover.css">
    <!-- media.css -->
    <link rel="stylesheet" href="../style/media.css">
    <!-- footer.css -->
    <link rel="stylesheet" href="../style/footer.css">
    <title>My Cart</title>
</head>

<body>
    <!-- including header -->
    <?php include('header.php'); ?>
    <section>
        <div class="container">
            <div class="content">
                <div class="products">
                    <h1>
                        my cart
                        <?php
                        if (isset($_SESSION['myCart']) && count($_SESSION['myCart']) > 0) {
                            echo '<span>';
                            $count = count($_SESSION['myCart']);
                            echo '(' . $count . ')';
                            echo '</span>';
                        }
                        ?>
                    </h1>
                    <?php
                    require_once('../includes/myCart.inc.php');
                    if (isset($_SESSION['myCart'])) {
                        //fetching products from database to display them in the cart
                        require_once('../classes/fetchProducts.class.php');
                        $products = new FetchProducts();
                        $count = count($_SESSION['myCart']);
                        for ($i = 0; $i < $count; $i++) {
                            $product[$i] = $products->getProductWithId($_SESSION['myCart'][$i]['product_id']);
                        }
                        for ($i = 0; $i < $count; $i++) {
                    ?>
                            <div class="element">
                                <div class="img">
                                    <img src="../../admin_side/pictures/<?php echo $product[$i][0]['product_image']; ?>" width="250px">
                                </div>
                                <div>
                                    <div>
                                        <h3><?php echo $product[$i][0]['product_name']; ?></h3>
                                        <span>$<?php echo $product[$i][0]['product_price']; ?></span>
                                    </div>
                                    <p>
                                        <?php
                                        $arr = explode(" ", $product[$i][0]['product_desc']);
                                        $state = 0;
                                        for ($j = 0; $j < 10; $j++) {
                                            if (isset($arr[$j])) {
                                                echo $arr[$j] . " ";
                                            } else {
                                                $state = 1;
                                                break;
                                            }
                                        }
                                        if ($state == 0) {
                                            echo '<span title="' . $product[$i][0]['product_desc'] . '">...</span>';
                                        }
                                        ?>
                                    </p>
                                    <span>stock: <?php echo $product[$i][0]['product_quantity']; ?></span>
                                    <span>product id: <?php echo $product[$i][0]['product_id']; ?></span>
                                    <div>
                                        <form action="../includes/myCart.inc.php?product_id=<?php echo $product[$i][0]['product_id']; ?>" method="POST">
                                            <input type="number" name="quantity" value="<?php echo $_SESSION['myCart'][$i]['quantity']; ?>">
                                            <div>
                                                <input type="submit" value="save" name="saveToCart">
                                                <input type="submit" value="remove" name="removeFromCart">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
                <?php
                if (isset($_SESSION['myCart']) && count($_SESSION['myCart']) > 0) {
                    //fetching products from database to display them in the cart
                    require_once('../classes/fetchProducts.class.php');
                    $products = new FetchProducts();
                    $count = count($_SESSION['myCart']);
                    $price = 0;
                    for ($i = 0; $i < $count; $i++) {
                        $product[$i] = $products->getProductWithId($_SESSION['myCart'][$i]['product_id']);
                        $price += ($product[$i][0]['product_price']) * ($_SESSION['myCart'][$i]['quantity']);
                    }
                ?>
                    <div class="voucher">
                        <div>
                            <h1>voucher</h1>
                            <div>
                                <div>
                                    <p>subtotal</p>
                                    <span>$<?php echo $price; ?></span>
                                </div>
                                <div>
                                    <p>shipping cost</p>
                                    <span>$2</span>
                                </div>
                                <div>
                                    <p>tax</p>
                                    <span>$--</span>
                                </div>
                                <div>
                                    <p>total</p>
                                    <span>$<?php echo $price + 2; ?></span>
                                </div>
                            </div>
                            <form action="order.php" method="POST">
                                <input type="submit" value="validate" name="validate">
                                <span>OR</span>
                                <input type="submit" value="paypal" name="" disabled>
                            </form>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>
    </section>
    <!-- including footer -->
    <?php include('footer.php') ?>
    <script src="../scripts/index.js"></script>
</body>

</html>