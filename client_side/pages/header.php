<?php 
    include('../includes/myCart.inc.php');
?>
<!-- start header -->
<header>
    <!-- start top header -->
    <div class="topHeader flex_sp_bet  ft_si_14">
        <div class="leftSide">
            <div class="welcomeMsg inl_bl wi_100">
                <p class="no_wrap walk ch_to_gold">welcome to shirrbook</p>
            </div>
            <div class="lang inl_bl">
                <select name="lang" class="bor_remo back_remo sel cap ch_to_gold">
                    <option value="en" default><img src="../pictures/united-states.png">english</option>
                    <option value="en"><img src="../pictures/france.png">french</option>
                </select>
            </div>
            <div class="currency inl_bl bor_remo">
                <select name="currency" class="bor_remo back_remo sel upper ch_to_gold">
                    <option value="usd" default class="upper">usd</option>
                    <option value="mad" class="upper">mad</option>
                </select>
            </div>
        </div>
        <div class="rightSide">
            <div class="callUs inl_bl ch_to_gold">
                <p class="sel">call us +212687595845</p>
            </div>
            <div class="helpCenter inl_bl ch_to_gold">
                <a href="#" class="a_norm">help center</a>
            </div>
            <div class="myAccount inl_bl ch_to_gold">
                <a href="#" class="a_norm">my account</a>
            </div>
            <div class="login inl_bl bor_remo ch_to_gold">
                <a href="#" class="a_norm">login</a>
            </div>
        </div>
    </div>
    <!-- end top header -->
    <!-- start middle header -->
    <div class="middleHeader flex_sp_bet">
        <div class="logo">
            <a href="index.php" class="a_norm">
                <p class="sel">shirr<span class="col_gold">book</span></p>
            </a>
        </div>
        <div class="search">
            <form action="#" method="POST" style="position: relative">
                <input type="text" placeholder="enter your search" class="sear_in">
                <button type="submit" class="bor_remo back_remo"><i class="fa-solid fa-magnifying-glass sea_icon"></i></button>
            </form>
        </div>
        <div class="myCart">
            <a href="myCart.php" class="a_norm" id="mymyCart" style="position: relative;">
                <?php
                if (isset($_SESSION['myCart']) && count($_SESSION['myCart']) > 0) {
                    echo '<span id="dot">';
                    $count = count($_SESSION['myCart']);
                    echo $count;
                    echo '</span>';
                }
                ?>
                <i class="fa-solid fa-cart-shopping col_gold ft_si_20"></i>
                <p class="inl_bl bor_remo ft_w_600 .sel">my myCart</p>
            </a>
        </div>
    </div>
    <!-- end middle header -->
    <!-- start bottom header -->
    <div class="bottomHeader">
        <div class="fit_cont centerX">
            <ul class="li_norm" style="color: #fff;">
                <li class="inl_bl bor_remo centerY_li ft_w_500 mar_side_10"><a href="index.php" class="a_norm">home</a></li>
                <li class="inl_bl bor_remo centerY_li ft_w_500 mar_side_10"><a href="best_seller.php" class="a_norm">best seller</a></li>
                <li class="inl_bl bor_remo centerY_li ft_w_500 mar_side_10"><a href="newArrivals.php" class="a_norm">new arrivals</a></li>
                <li class="inl_bl bor_remo centerY_li ft_w_500 mar_side_10"><a href="contact.php" class="a_norm">contact</a></li>
            </ul>
        </div>
    </div>
    <!-- end bottom header -->
    <div class="mediaHeader flex_sp_bet" style="display: none;">
        <div class="logo">
            <p class="sel">shirr<span class="col_gold">book</span></p>
        </div>
        <i class="fa-solid fa-list" id="bar"></i>
        <div class="fit_cont centerX list" id="navbar">
            <ul class="li_norm" style="color: #fff;">
                <li class="centerY_li ft_w_500 mar_side_10"><a href="index.php" class="a_norm">home</a></li>
                <li class="centerY_li ft_w_500 mar_side_10"><a href="best_seller.php" class="a_norm">best seller</a></li>
                <li class="centerY_li ft_w_500 mar_side_10"><a href="newArrivals.php" class="a_norm">new arrivals</a></li>
                <li class="centerY_li ft_w_500 mar_side_10"><a href="contact.php" class="a_norm">contact</a></li>
                <i class="fa-solid fa-xmark" id="close"></i>
            </ul>
        </div>
    </div>
</header>
<!-- end header -->