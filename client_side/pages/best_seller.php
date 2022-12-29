<?php
include('../includes/fetchProducts.inc.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>best seller</title>
    <!-- best_seller.css -->
    <link rel="stylesheet" href="../style/best_seller.css">
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
    <!-- home.css -->
    <link rel="stylesheet" href="../style/home.css">
</head>

<body>
    <?php include('header.php'); ?>
    <!-- start section one -->
    <section id="featured_prod">
        <div class="containr">
            <div class="content">
                <div class="items_cont flex_sp_ev">
                    <h1>best seller</h1>
                    <div class="items_cont flex_sp_ev">

                        <?php
                        for ($i = 0; $i < count($products); $i++) {
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
        </div>
    </section>
    <!-- end section one -->
    <?php include('footer.php'); ?>
</body>

</html>