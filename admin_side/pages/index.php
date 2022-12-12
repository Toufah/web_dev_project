<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- main style -->
    <link rel="stylesheet" href="../style/login.css">
    <!-- font style -->
    <link rel="stylesheet" href="../style/all.min.css">
    <!-- frame -->
    <link rel="stylesheet" href="../style/frame.css">
    <title>User Connection</title>
</head>

<body>
    <header>
        <h1>shirrbook</h1>
    </header>
    <?php
    if (isset($_SESSION["errorMessage"])) {
    ?>
        <h1 class="alert">
            <i class="fa-solid fa-triangle-exclamation"></i>
            <?php
                echo $_SESSION["errorMessage"];
            ?>
        </h1>
    <?php
    }
    ?>
    <div class="form">
        <div class="head">
            <i class="fa-solid fa-lock"></i>
            <p>connect</p>
        </div>
        <form action="../includes/loginIn.inc.php" method="post">
            <label for="e_mail">e_mail</label>
            <div class="cont">
                <i class="fa-solid fa-user"></i>
                <input type="text" name="e_mail">
            </div>
            <label for="password">password</label>
            <div class="cont">
                <i class="fa-solid fa-key"></i>
                <input type="password" name="password">
            </div>
            <a href="#">forgot password</a>
            <input type="submit" value="login" name="submit_log_in">
        </form>
    </div>
    <footer>
        <p><span>&#169;</span>2022-2023 all rights preserved</p>
    </footer>
</body>

</html>