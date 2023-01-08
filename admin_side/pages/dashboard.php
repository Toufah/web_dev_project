<?php
require_once('../includes/fetchOrders.inc.php');
require_once('../includes/fetchProducts.inc.php');
require_once('../includes/visitors.inc.php');
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
        <!-- dashboard.css -->
        <link rel="stylesheet" href="../style/dashboard.css">
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
        <title>Shirrbook Dashboard</title>
    </head>

    <body>
        <!-- sidebar -->
        <?php require_once('sidebar.php'); ?>
        <!-- start dashboard -->
        <section id="container">
            <i class="fa-solid fa-arrow-right" id="arrow""></i>
        <!-- navbar -->
        <?php require_once('navbar.php'); ?>
        <!-- start global data -->
        <section id="global_data">
                <div class="data di_fl_sb">
                    <div class="icon">
                        <i class="fa-solid fa-eye"></i>
                    </div>
                    <div class="text">
                        <h5>today's visitors</h5>
                        <span>
                            <?php
                            echo $counter;
                            ?>
                        </span>
                    </div>
                </div>
                <div class="data di_fl_sb">
                    <div class="icon">
                        <i class="fa-solid fa-money-check"></i>
                    </div>
                    <div class="text">
                        <h5>today's income</h5>
                        <span>$
                            <?php
                            $orders = $fetchOrders->getTodaysIncome();
                            $income = 0;
                            for ($i = 0; $i < count($orders); $i++) {
                                $income += $orders[$i]['order_invoice'];
                            }
                            echo $income;
                            ?>
                        </span>
                    </div>
                </div>
                <div class="data di_fl_sb">
                    <div class="icon">
                        <i class="fa-solid fa-shop"></i>
                    </div>
                    <div class="text">
                        <h5>orders</h5>
                        <span>
                            <?php
                            $orders = $fetchOrders->getPendingOrders();

                            echo count($orders);
                            ?>
                        </span>
                    </div>
                </div>
                <div class="data di_fl_sb">
                    <div class="icon">
                        <i class="fa-solid fa-bag-shopping"></i>
                    </div>
                    <div class="text">
                        <h5>products</h5>
                        <span><?php echo count($products); ?></span>
                    </div>
                </div>
        </section>
        <section id="charts">
            <div>
                <canvas id="myChart"></canvas>
                <h4>daily sales</h4>
                <?php
                $sales = $fetchOrders->getSales();
                ?>
                <p><span><?php echo ($sales[0] - $sales[1]) * 100; ?>%</span> <?php if (($sales[0] - $sales[1]) * 100 < 0) {
                                                                                    echo 'decrease';
                                                                                } else {
                                                                                    echo 'increase';
                                                                                } ?> in today sales.</p>
            </div>
            <div>
                <div class="user">
                    <h1>recent customors</h1>
                    <ul>
                        <?php
                        $client = $clients->getClients();
                        $end;
                        if (count($client) > 6) {
                            $end = count($client) - 6;
                        } else {
                            $end = 0;
                        }
                        for ($i = count($client) - 1; $i >= $end; $i--) {
                        ?>
                            <li class="li_norm">
                                <img src="../pictures/Speaker-Unknown.jpg">
                                <div class="text">
                                    <h3><?php echo $client[$i]['client_name'] . ' ' . $client[$i]['client_lastname']; ?></h3>
                                    <p>0<?php echo $client[$i]['client_phone_number']; ?></p>
                                </div>
                            </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </section>
        <!-- end global data -->
        <!-- start recent orders -->
        <section id="recent_ord">
            <div class="content">
                <div class="text di_fl_sb">
                    <h1>recent orders</h1>
                    <a href="orders.php" class="btn a_norm">show all</a>
                </div>
                <div class="table">
                    <table>
                        <thead>
                            <tr>
                                <td>name</td>
                                <td>lastname</td>
                                <td>product</td>
                                <td>quantity</td>
                                <td>price</td>
                                <td>payment method</td>
                                <td>status</td>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $orders = $fetchOrders->getOrders();

                            if (count($orders) < 20) {
                                $end = 0;
                            } else {
                                $end = count($orders) - 20;
                            }

                            for ($i = count($orders) - 1; $i >= $end; $i--) {
                                //fetching client with id from db
                                $client = $clients->getClientWithId($orders[$i]['order_client_id']);

                                //fetching product with id from db
                                $arrId = explode('/', $orders[$i]['order_product_id']);
                                $arrQuantity = explode('/', $orders[$i]['order_product_quantity']);

                                $product = array();
                                for ($j = 0; $j < count($arrId); $j++) {
                                    array_push($product, $fetchProducts->getProductWithId(+$arrId[$j]));
                                }
                            ?>
                                <tr>
                                    <td>
                                        <?php if (empty($client[0]['client_name']) || $client[0]['client_name'] == null) {
                                            echo 'unknown';
                                        } else {
                                            echo $client[0]['client_name'];
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php if (empty($client[0]['client_lastname']) || $client[0]['client_lastname'] == null) {
                                            echo 'unknown';
                                        } else {
                                            echo $client[0]['client_lastname'];
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        for ($j = 0; $j < count($arrId); $j++) {
                                            if (empty($product[$j][0]['product_name']) || $product[$j][0]['product_name'] == null) {
                                                echo 'product removed from db';
                                            } else {
                                                echo $product[$j][0]['product_name'];
                                                if ($j != count($arrId) - 1) {
                                                    echo '<br>';
                                                }
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        for ($j = 0; $j < count($arrQuantity); $j++) {
                                            echo $arrQuantity[$j];
                                            if ($j != count($arrQuantity) - 1) {
                                                echo '<br>';
                                            }
                                        }
                                        ?>
                                    </td>
                                    <td>$<?php echo $orders[$i]['order_invoice']; ?></td>
                                    <td>
                                        <?php
                                        if ($orders[$i]['order_payment_method'] == 0) {
                                            echo 'cash';
                                        } else {
                                            echo 'paypal';
                                        }
                                        ?>
                                    </td>
                                    <td>
                                        <?php
                                        if ($orders[$i]['state'] == 0) {
                                            echo 'pending';
                                        } elseif ($orders[$i]['state'] == 1) {
                                            echo 'delivered';
                                        } elseif ($orders[$i]['state'] == 2) {
                                            echo 'working on it';
                                        } else {
                                            echo 'canceled';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
        <!-- end recent orders -->
        </section>
        <!-- end dashboard -->
        <!-- chart.js -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.0.1/chart.min.js" integrity="sha512-tQYZBKe34uzoeOjY9jr3MX7R/mo7n25vnqbnrkskGr4D6YOoPYSpyafUAzQVjV6xAozAqUFIEFsCO4z8mnVBXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script>
            const ctx = document.getElementById('myChart');
            const col = 'rgb(5, 70, 108)';
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: [
                        // 'Monday','Tuesday','Wednesday','Thursday','Friday','Saturday','Sunday'
                        <?php
                        // echo date('l', strtotime('23.12.2022'));
                        for ($i = 6; $i >= 0; $i--) {
                            echo "'" . $currentDate = date('d.m', strtotime("-$i days")) . "'";
                            // echo date('D', strtotime($currentDate));
                            // echo date('l', strtotime($currentDate));
                            if ($i != 0) {
                                echo ',';
                            }
                        }
                        ?>
                    ],
                    datasets: [{
                        label: 'Sales',
                        data: [
                            <?php
                            $sales = $fetchOrders->getSales();
                            for ($i = 6; $i >= 0; $i--) {
                                echo $sales[$i];
                                if ($i != 0) {
                                    echo ',';
                                }
                            }
                            ?>
                        ],
                        borderWidth: 1,
                        backgroundColor: col,
                        Fill: true,
                        borderColor: col
                    }]
                },
                options: {
                    Responsive: true,
                }
            });
        </script>
        <script src="../scripts/clickEvents.js"></script>
    </body>

    </html>
<?php } ?>