<?php

    include 'connection.php';
    session_start();
    $user_id = $_SESSION['user_name'];

    if(!isset($user_id)){
        header('location:login.php');
    }

    if(isset($_POST['logout'])){
        session_destroy();
        header('location:login.php');
    }

    
    //addinng prodict in cart   
    if(isset($_POST['add_to_cart'])){
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = 1;
    
        $cart_num = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id='$user_id'") or die('query failed');
        if (mysqli_num_rows($cart_num) > 0) {
            $message[] ='product already exists in cart';
        } else {
            mysqli_query($conn, "INSERT INTO `cart`(`user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES ('$user_id', '$product_id', '$product_name', '$product_price', '$product_quantity', '$product_image')"); 
            $message[]='product successfully added to cart';
        }
    }

    //delete product from wishlist
    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        

        mysqli_query($conn, "DELETE FROM `wishlist` WHERE id = '$delete_id'") or die('query failed');

        header('location:wishlist.php');
    }

    //delete all product from wishlist
    if(isset($_GET['delete_all'])){
        $delete_id = $_GET['delete_all'];
        

        mysqli_query($conn, "DELETE FROM `wishlist` WHERE user_id = 'user_id'") or die('query failed');

        header('location:wishlist.php');
    }
?>

<style type = "text/css">
    <?php 
        include 'main.css';
    ?>
</style>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" type= "text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
    <title>Document</title>
</head>
<body>
<?php include 'header.php'; ?>
<div class="banner">
        <div class="detail">
            <h1>Twoja lista życzeń</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            
        </div>
    </div>

    <div class="line2"></div>


    <!-----------------about us------------------->
    <section class="shop">
            
            <h1 class="title">Produkty dodane do listy</h1>
            <?php
                if(isset($message)){
                    foreach($message as $msg){
                        echo '
                        <div class="message">
                            <span>' . $msg . '</span>
                            <i class="bi bi-x-circle" onclick="this.parentElement.remove()"></i>
                        </div>
                        ';
                    }
                }   
            ?>
            
            

        
            
                    

            <div class="box-container">

                <?php 

                $grand_total = 0;
                $select_wishlist = mysqli_query($conn, "SELECT * FROM `wishlist`") or die('query failed');  

                if(mysqli_num_rows($select_wishlist)>0){
                    while($fetch_wishlist = mysqli_fetch_assoc($select_wishlist)){

                    

                ?>
                
                <div class="box-container">
                    


                        <form method="post" class="box">
                            <img src="image/<?php echo $fetch_wishlist['image']; ?>">
                            <div class="price"><?php echo $fetch_wishlist['price']; ?> zł</div>
                            <div class="name"><?php echo $fetch_wishlist['name']; ?></div>
                            <input type="hidden" name="product_id" value="<?php echo $fetch_wishlist['id']; ?>">
                            <input type="hidden" name="product_name" value="<?php echo $fetch_wishlist['name']; ?>">
                            <input type="hidden" name="product_price" value="<?php echo $fetch_wishlist['price']; ?>">
                            <input type="hidden" name="product_image" value="<?php echo $fetch_wishlist['image']; ?>">
                            <div class="icon">
                                <a href="view_page.php?pid=<?php echo $fetch_wishlist['id']; ?>" class="bi bi-eye-fill"></a>
                                <a href="wishlist.php?delete=<?php echo $fetch_wishlist['id']; ?>" class="bi bi-x" onclick="return confirm('do you want to delete this product from wishlist?')"></a>
                                <button type="submit" name="add_to_cart" class="bi bi-cart"></button>

                                
                            </div>
                        </form>


                </div>
                
                <?php 
                            $grand_total +=$fetch_wishlist['price'];
                            }
                        } else {
                            echo '<p class = "empty"> no wishlist added yet! </p>';
                        }
                ?>
                


</div>

            <div class="wishlist_total">
                        <p>całkowita kwota do zapłaty : <span><?php echo $grand_total; ?> zł</span></p>
                        <a href="shop.php" class="btn">Kontynuj zakupy</a>
                        <a href="wishlist.php?delete_all" class="btn" <?php echo ($grand_total)?'':'disabled'?>" onclick="return confirm('do you want to delete all items n yout wishlist?')">Usuń wszystko</a>
                </div>

           

            

        
        </section>

<?php include 'footer.php'; ?>



        <script type="text/javascript" src="script.js"></script>
        
       

</body>
</html>