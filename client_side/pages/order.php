<?php
if (isset($_POST['validate']) || isset($_GET['error'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- favicon -->
        <?php require_once('../includes/favicon.inc.php'); ?>
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
        <!-- order.css -->
        <link rel="stylesheet" href="../style/order.css">
        <title>Document</title>
    </head>

    <body>
        <?php include('header.php');?>
        <section>
            <div class="container">
                <div class="content">
                    <div class="order_info">
                        <table>
                            <thead>
                                <tr>
                                    <td>
                                        product
                                    </td>
                                    <td>
                                        quantity
                                    </td>
                                    <td>
                                        price
                                    </td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (isset($_SESSION['myCart'])) {
                                    //fetching products from database to display them in the cart
                                    require_once('../classes/fetchProducts.class.php');
                                    $products = new FetchProducts();
                                    $count = count($_SESSION['myCart']);
                                    $price = 0;
                                    for ($i = 0; $i < $count; $i++) {
                                        $product[$i] = $products->getProductWithId($_SESSION['myCart'][$i]['product_id']);
                                        $price += ($product[$i][0]['product_price']) * ($_SESSION['myCart'][$i]['quantity']);
                                    }
                                    for ($i = 0; $i < $count; $i++) {
                                ?>
                                        <tr>
                                            <td>
                                                <?php echo $product[$i][0]['product_name']; ?>
                                            </td>
                                            <td>
                                                <?php echo $_SESSION['myCart'][$i]['quantity'] ?>
                                            </td>
                                            <td>
                                                <?php echo '$'.$product[$i][0]['product_price']; ?>
                                            </td>
                                        </tr>
                                <?php
                                    }
                                }
                                ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td>
                                        total
                                    </td>
                                    <td colspan="2">
                                        <?php
                                        echo '$'.$price + 2;
                                        ?>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <form action="../includes/orders.inc.php?total=<?php echo $price+2;?>" method="POST">
                        <div>
                            <label for="client_name">name</label>
                            <input type="text" name="client_name" id="client_name" required>
                        </div>
                        <div>
                            <label for="client_lastname">lastname</label>
                            <input type="text" name="client_lastname" id="client_lastname" required>
                        </div>
                        <div>
                            <label for="client_cin">cin</label>
                            <input type="text" name="client_cin" id="client_cin" required>
                        </div>
                        <div>
                            <label for="client_phone_number">phone number</label>
                            <input type="tel" name="client_phone_number" id="client_phone_number" required>
                        </div>
                        <div>
                            <label for="client_e_mail">e_mail</label>
                            <input type="mail" name="client_e_mail" id="client_e_mail" required>
                        </div>
                        <div>
                            <label for="client_adress">adress</label>
                            <input type="text" name="client_adress" id="client_adress" required>
                        </div>
                        <div>
                            <div>
                                <label for="client_city">city</label>
                                <input type="text" name="client_city" id="client_city" required>
                            </div>
                            <div>
                                <label for="client_zip">zip</label>
                                <input type="text" name="client_zip" id="client_zip" required>
                            </div>
                        </div>
                        <div>
                            <input type="submit" value="submit" name="submit_order" class="btn">
                        </div>
                    </form>
                </div>
            </div>
        </section>
        <?php include('footer.php');?>
    </body>

    </html>
<?php
}
?>