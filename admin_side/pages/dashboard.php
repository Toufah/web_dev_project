<?php include('../includes/fetchProducts.inc.php')?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <?php include('sidebar.php') ?>
    <!-- start dashboard -->
    <section id="container">
        <i class="fa-solid fa-arrow-right" id="arrow""></i>
        <!-- navbar -->
        <?php include('navbar.php') ?>
        <!-- start global data -->
        <section id="global_data">
            <div class="data di_fl_sb">
                <div class="icon">
                    <i class="fa-solid fa-eye"></i>
                </div>
                <div class="text">
                    <h5>today's visitors</h5>
                    <span>3210</span>
                </div>
            </div>
            <div class="data di_fl_sb">
                <div class="icon">
                    <i class="fa-solid fa-money-check"></i>
                </div>
                <div class="text">
                    <h5>today's income</h5>
                    <span>$4010</span>
                </div>
            </div>
            <div class="data di_fl_sb">
                <div class="icon">
                    <i class="fa-solid fa-shop"></i>
                </div>
                <div class="text">
                    <h5>orders</h5>
                    <span>18</span>
                </div>
            </div>
            <div class="data di_fl_sb">
                <div class="icon">
                    <i class="fa-solid fa-bag-shopping"></i>
                </div>
                <div class="text">
                    <h5>products</h5>
                    <span><?php echo count($products);?></span>
                </div>
            </div>
        </section>
        <section id="charts">
            <div>
                <canvas id="myChart"></canvas>
                <h4>daily sales</h4>
                <p><span>55%</span> increase in today sales.</p>
            </div>
            <div>
                <div class="user">
                    <h1>recent customors</h1>
                    <ul>
                        <li class="li_norm">
                            <img src="../pictures/Speaker-Unknown.jpg">
                            <div class="text">
                                <h3>name</h3>
                                <p>female</p>
                            </div>
                        </li>
                        <li class="li_norm">
                            <img src="../pictures/Speaker-Unknown.jpg">
                            <div class="text">
                                <h3>name</h3>
                                <p>male</p>
                            </div>
                        </li>
                        <li class="li_norm">
                            <img src="../pictures/Speaker-Unknown.jpg">
                            <div class="text">
                                <h3>name</h3>
                                <p>female</p>
                            </div>
                        </li>
                        <li class="li_norm">
                            <img src="../pictures/Speaker-Unknown.jpg">
                            <div class="text">
                                <h3>name</h3>
                                <p>male</p>
                            </div>
                        </li>
                        <li class="li_norm">
                            <img src="../pictures/Speaker-Unknown.jpg">
                            <div class="text">
                                <h3>name</h3>
                                <p>male</p>
                            </div>
                        </li>
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
                    <a href="#" class="btn a_norm">show all</a>
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
                            <tr>
                                <td>ahmed</td>
                                <td>chati</td>
                                <td>notebook</td>
                                <td>2</td>
                                <td>$19</td>
                                <td>credit card</td>
                                <td>delivered</td>
                            </tr>
                            <tr>
                                <td>ahmed</td>
                                <td>chati</td>
                                <td>notebook</td>
                                <td>2</td>
                                <td>$19</td>
                                <td>credit card</td>
                                <td>delivered</td>
                            </tr>
                            <tr>
                                <td>ahmed</td>
                                <td>chati</td>
                                <td>notebook</td>
                                <td>2</td>
                                <td>$19</td>
                                <td>credit card</td>
                                <td>delivered</td>
                            </tr>
                            <tr>
                                <td>ahmed</td>
                                <td>chati</td>
                                <td>notebook</td>
                                <td>2</td>
                                <td>$19</td>
                                <td>credit card</td>
                                <td>delivered</td>
                            </tr>
                            <tr>
                                <td>ahmed</td>
                                <td>chati</td>
                                <td>notebook</td>
                                <td>2</td>
                                <td>$19</td>
                                <td>credit card</td>
                                <td>delivered</td>
                            </tr>
                            <tr>
                                <td>ahmed</td>
                                <td>chati</td>
                                <td>notebook</td>
                                <td>2</td>
                                <td>$19</td>
                                <td>credit card</td>
                                <td>delivered</td>
                            </tr>
                            <tr>
                                <td>ahmed</td>
                                <td>chati</td>
                                <td>notebook</td>
                                <td>2</td>
                                <td>$19</td>
                                <td>credit card</td>
                                <td>delivered</td>
                            </tr>
                            <tr>
                                <td>ahmed</td>
                                <td>chati</td>
                                <td>notebook</td>
                                <td>2</td>
                                <td>$19</td>
                                <td>credit card</td>
                                <td>delivered</td>
                            </tr>
                            <tr>
                                <td>ahmed</td>
                                <td>chati</td>
                                <td>notebook</td>
                                <td>2</td>
                                <td>$19</td>
                                <td>credit card</td>
                                <td>delivered</td>
                            </tr>
                            <tr>
                                <td>ahmed</td>
                                <td>chati</td>
                                <td>notebook</td>
                                <td>2</td>
                                <td>$19</td>
                                <td>credit card</td>
                                <td>delivered</td>
                            </tr>
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
    <script src="../scripts/mychart.js"></script>
    <script src="../scripts/clickEvents.js"></script>
</body>

</html>