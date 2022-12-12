<header class="di_fl_sb">
    <h1>
        <?php
            if(basename($_SERVER['PHP_SELF']) == 'dashboard.php'){
                echo 'dashboard';
            }elseif(basename($_SERVER['PHP_SELF']) == 'adminUsers.php'){
                echo 'admin users';
            }elseif(basename($_SERVER['PHP_SELF']) == 'products.php'){
                echo 'products';
            }
        ?>
    </h1>
    <div class="info">
        <span><a href="../../client_side/pages/index.php" target="_blank" class="a_norm">open the website</a></span>
        <a href="#" class="a_norm"><i class="fa-solid fa-envelope"></i></a>
        <img src="../pictures/Speaker-Unknown.jpg">
    </div>
</header>