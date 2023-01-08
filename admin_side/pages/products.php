<!-- including fetchProducts -->
<?php 
include('../includes/fetchProducts.inc.php'); 
if(isset($_SESSION['auth'])){
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php include('../includes/favicon.inc.php');?>
    <!-- products.css -->
    <link rel="stylesheet" href="../style/products.css">
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
    <title>products</title>
</head>

<body>
    <!-- sidebar -->
    <?php include('sidebar.php') ?>
    <section id="container" style="position: relative;">
        <i class="fa-solid fa-arrow-right" id="arrow"></i>
        <!-- navbar -->
        <?php include('navbar.php') ?>
        <!-- error handler -->
        <?php
        if (isset($_SESSION["add_prod_error"])) {
        ?>
            <h1 class="alert">
                <i class="fa-solid fa-triangle-exclamation"></i>
                <?php
                echo $_SESSION["add_prod_error"];
                ?>
            </h1>
        <?php
        }
        ?>
        <section id="products">
            <div class="content">
                <!-- start add product -->
                <div class="addProduct">
                    <h1>
                        add product
                    </h1>
                    <form action="../includes/addProduct.inc.php" method="POST" enctype="multipart/form-data">
                        <div>
                            <label for="product_name">product name</label>
                            <input type="text" name="product_name" id="product_name" required>
                        </div>
                        <div>
                            <label for="product_desc">product description</label>
                            <textarea name="product_desc" id="product_desc" required></textarea>
                        </div>
                        <div>
                            <label for="product_quantity">product quantity</label>
                            <input type="number" name="product_quantity" id="product_quantity" required>
                        </div>
                        <div>
                            <label for="product_price">product price</label>
                            <input type="number" name="product_price" id="product_price" required>
                        </div>
                        <div>
                            <label for="product_image">product image</label>
                            <label for="product_image"><i class="fa-solid fa-upload"></i></label>
                            <input type="file" name="product_image" id="product_image" required>
                        </div>
                        <div>
                            <input type="submit" value="add product" class="btn" style="border: none; cursor: pointer;" name="submit_add_product">
                        </div>
                    </form>
                </div>
                <!-- end add product -->
            </div>
        </section>
        <section id="products">
            <div class="container">
                <table>
                    <thead>
                        <tr>
                            <td>id</td>
                            <td>name</td>
                            <td>description</td>
                            <td>quantity</td>
                            <td>price</td>
                            <td>image</td>
                            <td>
                                <?php
                                if ($_SESSION['role_as'] == 1) {
                                ?>
                                    actions
                                <?php
                                }
                                ?>
                            </td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($products != null) {
                            for ($i = 0; $i < count($products); $i++) {
                        ?>
                                <tr>
                                    <td><?php echo $products[$i]['product_id']; ?></td>
                                    <td><?php echo $products[$i]['product_name']; ?></td>
                                    <td class="desc"><?php echo $products[$i]['product_desc']; ?></td>
                                    <td><?php echo $products[$i]['product_quantity']; ?></td>
                                    <td><?php echo $products[$i]['product_price']; ?></td>
                                    <td><img src="../pictures/<?php echo $products[$i]['product_image']; ?>" width="100px"></td>
                                    <td>
                                        <a href="editProduct.php?product_id=<?php echo $products[$i]['product_id']; ?>" class="a_norm"><button class='edit_delete edit'>edit</button></a>
                                        <a href="../includes/removeProduct.inc.php?product_id=<?php echo $products[$i]['product_id']; ?>" class="a_norm"><button class='edit_delete delete'>remove</button></a>
                                    </td>
                                </tr>
                        <?php }
                        } ?>
                    </tbody>
                </table>
            </div>
        </section>
    </section>
    <!-- clickEvents.js -->
    <script src="../scripts/clickEvents.js"></script>
</body>

</html>
<?php
}
?>