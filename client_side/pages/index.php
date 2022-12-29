<?php
require_once('../includes/visitors.inc.php');
require_once('../includes/fetchProducts.inc.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- favicon -->
    <?php require_once('../includes/favicon.inc.php'); ?>
    <!-- home.css -->
    <link rel="stylesheet" href="../style/home.css">
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
    <title>Shirrbook</title>
</head>

<body>
    <!-- including header -->
    <?php require_once('header.php'); ?>
    <!-- start body -->
    <!-- start section one : welcoming -->
    <section id="welcoming">
        <div class="container">
            <div class="content flex_sp_arr">
                <div class="text">
                    <h1>
                        we design <span class="col_gold">and</span> print
                    </h1>
                    <p>
                        we are a new design studio based in morocco.we have three years of combined experience, and know thing or two about designing and printing.
                    </p>
                    <button class="btn switch_color">contact us</button>
                </div>
                <img src="../pictures/4738059_Mesa de trabajo 1.svg">
            </div>
        </div>
    </section>
    <!-- end section one : welcoming -->
    <!-- start section two : features-->
    <section id="features">
        <div class="container">
            <div class="content">
                <div class="comp">
                    <img src="../pictures/FreeShipping2 [Converted]-01.svg">
                    <p>free shipping</p>
                </div>
                <div class="comp">
                    <img src="../pictures/1624_U1RVRElPIEtBVCAzNTctMDE [Converted]-01.svg">
                    <p>online order</p>
                </div>
                <div class="comp">
                    <img src="../pictures/envio-05 [Converted]-01.svg">
                    <p>save money</p>
                </div>
                <div class="comp">
                    <img src="../pictures/4738059_Mesa de trabajo 1.svg">
                    <p>f24/7 support</p>
                </div>
                <div class="comp">
                    <img src="../pictures/1624_U1RVRElPIEtBVCAzNTctMDE [Converted]-01.svg">
                    <p>promotions</p>
                </div>
            </div>
        </div>
    </section>
    <!-- end section two : features-->
    <!-- start section three : featured products -->
    <section id="featured_prod">
        <div class="container">
            <div class="content">
                <h1>featured products</h1>
                <div class="items_cont flex_sp_ev">

                    <?php
                    if (count($products) <= 8) {
                        $end = count($products);
                    } else {
                        $end = 8;
                    }
                    for ($i = 0; $i < $end; $i++) {
                    ?>
                        <div class="item" id="et">
                            <img src="../../admin_side/pictures/<?php echo $products[$i]['product_image']; ?>">
                            <div class="des">
                                <span>shirrbook</span>
                                <h4><?php echo $products[$i]['product_name']; ?></h4>
                                <div class="star">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <h3><span class="col_gold">$</span><?php echo $products[$i]['product_price']; ?></h3>
                            </div>
                            <form action="../includes/myCart.inc.php?product_id=<?php echo $products[$i]['product_id']; ?>" method="POST">
                                <button type="submit" name="addToCart" style="cursor: pointer;"><i class="fa-solid fa-cart-shopping col_gold ft_si_20"></i></button>
                            </form>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- end section three : featured products -->
    <!-- start section four : call to action -->
    <section id="call">
        <div class="container">
            <div class="content">
                <h2>up to <span class="col_gold">70% off</span> - all notebooks <span class="col_gold">&</span> cups</h2>
                <button class="btn switch_color">explore more</button>
            </div>
        </div>
    </section>
    <!-- end section four : call to action -->
    <!-- start section five : new arrival -->
    <section id="featured_prod">
        <div class="container">
            <div class="content">
                <h1>new arrival</h1>
                <div class="items_cont flex_sp_ev">
                    <?php
                    if (count($products) <= 8) {
                        $end = count($products);
                    } else {
                        $end = 8;
                    }
                    for ($i = 0; $i < $end; $i++) {
                    ?>
                        <div class="item" id="et">
                            <img src="../../admin_side/pictures/<?php echo $products[$i]['product_image']; ?>">
                            <div class="des">
                                <span>shirrbook</span>
                                <h4><?php echo $products[$i]['product_name']; ?></h4>
                                <div class="star">
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                    <i class="fa-solid fa-star"></i>
                                </div>
                                <h3><span class="col_gold">$</span><?php echo $products[$i]['product_price']; ?></h3>
                            </div>
                            <form action="../includes/myCart.inc.php?product_id=<?php echo $products[$i]['product_id']; ?>" method="POST">
                                <button type="submit" name="addToCart" style="cursor: pointer;"><i class="fa-solid fa-cart-shopping col_gold ft_si_20"></i></button>
                            </form>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
    </section>
    <!-- end section five : new arrival -->
    <!-- start section six : newsletter -->
    <div id="newsletter">
        <div class="container flex_sp_bet">
            <div class="newstext">
                <h4>sign up for newsletters</h4>
                <p>get e_mail updates about latest collections and <span class="col_gold">special offers.</span></p>
            </div>
            <form action="../includes/e_mails.inc.php" method="POST">
                <input type="mail" placeholder="email adress" name="e_mail">
                <button type="submit" name="submit_e_mail">sign up</button>
            </form>
        </div>
    </div>
    <!-- end section six : newsletter -->
    <!-- including footer -->
    <?php require_once('footer.php') ?>
    <!-- end body -->
    <script src="../scripts/index.js"></script>
</body>

</html>