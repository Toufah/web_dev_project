<?php
require_once('../includes/fetchOrders.inc.php');
require_once('../includes/fetchProducts.inc.php');
require_once('../includes/fetchClients.inc.php');
if (isset($_SESSION['auth'])) {
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php include('../includes/favicon.inc.php');?>
        <!-- orders.css -->
        <link rel="stylesheet" href="../style/orders.css">
        <!-- font style -->
        <link rel="stylesheet" href="../style/all.min.css">
        <!-- frame.css -->
        <link rel="stylesheet" href="../style/frame.css">
        <!-- sidebar.css -->
        <link rel="stylesheet" href="../style/sidebar.css">
        <!-- navbar -->
        <link rel="stylesheet" href="../style/navbar.css">
        <!-- media.css -->
        <link rel="stylesheet" href="../style/media.css">
        <title>orders</title>
    </head>

    <body>
        <!-- sidebar -->
        <?php require_once('sidebar.php'); ?>
        <section id="container">
            <i class="fa-solid fa-arrow-right" id="arrow""></i>
        <!-- navbar -->
        <?php require_once('navbar.php'); ?>
        <div class=" content">
                <div class=" table">
                    <table>
                        <thead>
                            <tr>
                                <td>order id</td>
                                <td>products ids(quantiy)</td>
                                <td>client id</td>
                                <td>price</td>
                                <td>payement method</td>
                                <td>date</td>
                                <td>state</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $orders = $fetchOrders->getOrders();

                            for ($i = count($orders) - 1; $i >= 0; $i--) {

                                $arrId = explode('/', $orders[$i]['order_product_id']);
                                $arrQuantity = explode('/', $orders[$i]['order_product_quantity']);
                                $client = $clients->getClientWithId($orders[$i]['order_client_id']);

                            ?>
                                <tr>
                                    <td><?php echo $orders[$i]['order_id']; ?></td>
                                    <td>
                                        <?php
                                        for ($j = 0; $j < count($arrId); $j++) {
                                            echo '<span>' . $arrId[$j] . '(' . $arrQuantity[$j] . ')' . '</span>';
                                            if ($j != count($arrId)) {
                                                echo '<br>';
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if (empty($client[0]['client_id']) ||  $client[0]['client_id'] == null) {
                                            echo 'unknown';
                                        } else {
                                            echo $client[0]['client_id'];
                                        }
                                        ?>
                                    </td>
                                    <td>$<?php echo $orders[$i]['order_invoice']; ?></td>
                                    <td>cash</td>
                                    <td><?php echo $orders[$i]['order_date']; ?></td>
                                    <td>
                                        <form action="../includes/editOrder.inc.php?order_id=<?php echo $orders[$i]['order_id']; ?>" method="post">
                                            <select name="state" id="state">
                                                <?php
                                                if ($orders[$i]['state'] == 0) {
                                                ?>
                                                    <option value="0" selected>pending</option>
                                                    <option value="2">treating</option>
                                                    <option value="1">delivered</option>
                                                    <option value="-1">cancel</option>
                                                <?php
                                                } elseif ($orders[$i]['state'] == 1) {
                                                ?>
                                                    <option value="0">pending</option>
                                                    <option value="2">treating</option>
                                                    <option value="1" selected>delivered</option>
                                                    <option value="-1">cancel</option>
                                                <?php
                                                } elseif ($orders[$i]['state'] == 2) {
                                                ?>
                                                    <option value="0">pending</option>
                                                    <option value="2" selected>treating</option>
                                                    <option value="1">delivered</option>
                                                    <option value="-1">cancel</option>
                                                <?php
                                                } else {
                                                ?>
                                                    <option value="0">pending</option>
                                                    <option value="2">treating</option>
                                                    <option value="1">delivered</option>
                                                    <option value="-1" selected>cancel</option>
                                                <?php
                                                }
                                                ?>
                                            </select>
                                            <button type="submit" name="submitState"><i class="fa-solid fa-floppy-disk"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                </div>
        </section>
        <!-- scripts -->
        <script src="../scripts/clickEvents.js"></script>
    </body>

    </html>
<?php
}
?>