<?php
include('../includes/fetchProducts.inc.php');
if (isset($_GET['product_id']) || isset($_SESSION['product_id'])) {
    if(isset($_GET['product_id'])){
        $productWithId = $fetchProducts->getProductWithId($_GET['product_id']);
    }else if(isset($_SESSION['product_id'])){
        $productWithId = $fetchProducts->getProductWithId($_SESSION['product_id']);
    }
?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- font style -->
        <link rel="stylesheet" href="../style/all.min.css">
        <!-- frame.css -->
        <link rel="stylesheet" href="../style/frame.css">
        <!-- media.css -->
        <link rel="stylesheet" href="../style/media.css">
        <!-- editUser.css -->
        <link rel="stylesheet" href="../style/editUser.css">
        <style>
            .pi_in span {
                display: flex;
                justify-content: flex-start;
                align-items: center;
                gap: 20px;
                margin-bottom: 20px;
                margin-top: 10px;
            }

            .pi_in span img {
                border-radius: 5px;
                box-shadow: 0 0 10px 0 #00000050;
                transition: 0.4s all;
                outline: 1px solid var(--main-color);
            }

            .pi_in span img:hover {
                box-shadow: 4px 4px 10px 0 #00000050;
            }

            .round {
                position: absolute;
                background-color: var(--main-color);
                color: #fff;
                width: 40px;
                height: 40px;
                display: flex;
                justify-content: center;
                align-items: center;
                border-radius: 50%;
                top: 50%;
                cursor: pointer;
                box-shadow: 0 0 8px 0 #00000050;
                transform: translateY(-50%);
            }
            .round:hover{
                box-shadow: 2px 2px 8px 0 #00000050;
            }
        </style>
        <title>Edit Product</title>
    </head>

    <body>
        <section>
            <div class="container">
                <h1>edit product</h1>
                <form action="../includes/editProduct.inc.php" method="POST" enctype="multipart/form-data">
                    <div>
                        <label for="product_id">product id</label>
                        <input type="text" name="product_id" id="product_id" value="<?php echo $productWithId[0]['product_id']?>" readonly>
                    </div>
                    <div>
                        <label for="product_name">name</label>
                        <input type="text" name="product_name" id="product_name" value="<?php echo $productWithId[0]['product_name']?>">
                    </div>
                    <div>
                        <label for="product_desc">description</label>
                        <input type="text" name="product_desc" id="product_desc" value="<?php echo $productWithId[0]['product_desc']?>">
                    </div>
                    <div>
                        <label for="product_quantity">quantity</label>
                        <input type="number" name="product_quantity" id="product_quantity" value="<?php echo $productWithId[0]['product_quantity']?>">
                    </div>
                    <div>
                        <label for="product_price">price</label>
                        <input type="number" name="product_price" id="product_price" value="<?php echo $productWithId[0]['product_price']?>">
                    </div>
                    <div class="pi_in">
                        <label for="product_image">image</label>
                        <span>
                            <img src="../pictures/<?php echo $productWithId[0]['product_image'];?>" alt="" width="150px">
                            <label for="product_image" style="position: relative;"><i class="fa-solid fa-upload round"></i></label>
                            <input type="file" name="product_image" id="product_image" style="display: none;">
                        </span>
                    </div>
                    <input type="submit" class='btn_s' name="save" value="save">
                    <input type="submit" class='btn_s' name="cancel" value="cancel">
                </form>
            </div>
        </section>
    </body>

    </html>
<?php
}
?>