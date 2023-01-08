<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- favicon -->
    <?php require_once('../includes/favicon.inc.php'); ?>
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
    <!-- contact.css -->
    <link rel="stylesheet" href="../style/contact.css">
    <title>Contact</title>
</head>

<body>
    <!-- including header -->
    <?php require_once('header.php'); ?>
    <section>
        <div class="container">
            <div class="content">
                <h1>contact us</h1>
                <form action="">
                    <div class="userbox">
                        <input type="text" name="firstname" required="" id="lastname"/>
                        <label for="firstname">firstname</label>
                    </div>
                    <div class="userbox">
                        <input type="text" name="lastname" required="" id="lastname"/>
                        <label for="lastname">lastname</label>
                    </div>
                    <div class="userbox">
                        <input type="text" name="e_mail" required="" id="e_mail"/>
                        <label for="e_mail">e_mail</label>
                    </div>
                    <div class="userbox">
                        <input type="text" name="msg" required="" id="msg"/>
                        <label for="msg">message</label>
                    </div>
                    <button type="submit" name="submit">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        submit
                    </button>
                </form>
            </div>
        </div>
    </section>
    <!-- including footer -->
    <?php require_once('footer.php') ?>
    <script src="../scripts/index.js"></script>
</body>

</html>