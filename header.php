<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

    <link rel="stylesheet" type= "text/css" href="style.css">
    <title>Document</title>

</head>
<body>

    <header class="header">
        

        
            <a href="admin_pannel.php" class="logo"><img src="img/logo.png" alt="">PALETAZ</a>
            <nav class="navbar">
                <a href="index.php">Główna</a>
                
                <a href="shop.php">Sklep</a>
                <a href="order.php">Zamówienia</a>
                <a href="about.php">O nas</a>
                <a href="contact.php">Kontakt</a>
            </nav>
            <div class="icons">
                <i class="bi bi-person" id="user-btn"></i>
                <?php 
                    $select_wishlist = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE user_id='$user_id'") or die('query failed');

                    $wishlist_num_rows = mysqli_num_rows($select_wishlist);
                ?>
                <a href="wishlist.php"><i class="bi bi-heart"></i><sup><?php echo $wishlist_num_rows; ?></sup></a>

                <?php 
                    $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE user_id='$user_id'") or die('query failed');

                    $cart_num_rows = mysqli_num_rows($select_cart);
                ?>

                <a href="cart.php"><i class="bi bi-cart"></i><sup><?php echo $cart_num_rows; ?></sup></a>
                <i class="bi bi-list" id="menu-btn"></i>
            </div>
            <div class="user-box">
                <p>Twoja nazwa : <span><?php echo $_SESSION['user_name']; ?></span></p>
                <p>Twój email : <span><?php echo $_SESSION['user_email']; ?></span></p>
                <form method="post">
                    <button class="submit" name="logout" class="logout-btn">wyloguj</button>
                </form>
            </div>
        
    </header>
    

</body>
</html>