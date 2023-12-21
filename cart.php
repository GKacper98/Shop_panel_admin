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
            $message[] ='Produkt juz został dodany do koszyka!';
        } else {
            mysqli_query($conn, "INSERT INTO `cart`(`user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES ('$user_id', '$product_id', '$product_name', '$product_price', '$product_quantity', '$product_image')"); 
            $message[]='Pomyslnie dodano produkt do koszyka!';
        }
    }

    if(isset($_POST['update_qty_btn'])){
        $update_qty_id = $_POST['update_qty_id'];
        $update_value = $_POST['update_qty'];

        $update_query = mysqli_query($conn, "UPDATE `cart` SET quantity ='$update_value' WHERE id='$update_qty_id'") or die('query failed');
        if($update_query){
            header('location:cart.php');
        }
    }

    //delete product from wishlist
    if(isset($_GET['delete'])){
        $delete_id = $_GET['delete'];
        

        mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$delete_id'") or die('query failed');

        header('location:cart.php');
    }

    //delete all product from wishlist
    if(isset($_GET['delete_all'])){
        $delete_id = $_GET['delete_all'];
        

        mysqli_query($conn, "DELETE FROM `cart` WHERE user_id = '$user_id'") or die('query failed');

        header('location:cart.php');
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
            <h1>Twój koszyk</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            
        </div>
    </div>

    <div class="line2"></div>


    <!-----------------about us------------------->
    <section class="shop">
            
            <h1 class="title">Twoje produkty</h1>

            
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
                $select_cart = mysqli_query($conn, "SELECT * FROM `cart`") or die('query failed');  

                if(mysqli_num_rows($select_cart)>0){
                    while($fetch_cart = mysqli_fetch_assoc($select_cart)){

                    

                ?>
                
                <div class="box-container">
                    


                    <div class="box">
                    <div class="icon">
                            <a href="view_page.php?pid=<?php echo $fetch_cart['id']; ?>" class="bi bi-eye-fill"></a>
                            <a href="cart.php?delete=<?php echo $fetch_cart['id']; ?>" class="bi bi-x" onclick="return confirm('do you want to delete this product from cart?')"></a>
                            <button type="submit" name="add_to_cart" class="bi bi-cart"></button>
                    </div>
                        <img src="image/<?php echo $fetch_cart['image']; ?>">
                        <div class="price"><?php echo $fetch_cart['price']; ?> zł</div>
                        <div class="name"><?php echo $fetch_cart['name']; ?></div>
                        <form method = "post">
                            <input type="hidden" name="update_qty_id" value="<?php echo $fetch_cart['id']; ?>">
                            <div class="qty">
                                <input type="number" min="1" name="update_qty" value="<?php echo $fetch_cart['quantity']; ?>">
                                <input type="submit" name="update_qty_btn" value="zaktualizuj">
                            </div>
                        </form>
                        
                        <div class="total-amt">
                            Suma : <span><?php echo $total_amt = ($fetch_cart['price']*$fetch_cart['quantity'])?> zł</span>
                        </div>

                            
                        </div>
                        


                </div>
                
                <?php 
                            $grand_total +=$total_amt;
                            }
                        } else {
                            echo '<p class = "empty"> no cart added yet! </p>';
                        }
                ?>
                


</div>
                        <div class="dlt">
                        <a href="cart.php?delete_all" class= "btn2" onclick="return confirm('do you want to delete all items n yout cart?')">Usuń wszystko</a>
                        </div>

            <div class="wishlist_total">
                        <p>całkowita kwota do zapłaty : <span><?php echo $grand_total; ?> zł</span></p>
                        <a href="shop.php" class="btn">kontynuj zakupy</a>
                        <a href="checkout.php" class="btn" <?php echo ($grand_total>1)?'':'disabled'?>" onclick="return confirm('do you want to delete all items n yout cart?')">przejdź do kasy</a>
                </div>

           

            

        
        </section>

<?php include 'footer.php'; ?>



        <script type="text/javascript" src="script.js"></script>
        
       

</body>
</html>