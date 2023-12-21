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


    //addinng prodict in wishlist
    if(isset($_POST['add_to_wishlist'])){
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];

        $wishlist_number = mysqli_query($conn, "SELECT * FROM `wishlist` WHERE name = '$product_name' AND user_id='$user_id'") or die('query failed');
        $cart_num =mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id='$user_id'") or die('query failed');
        if(mysqli_num_rows($wishlist_number)>0){
            $message[] ='product alredy exist in wishlist';
        }else if (mysqli_num_rows($cart_num)>0) {
            $message[] ='Produkt juz został dodany do ulubionych!';
        }else{
            mysqli_query($conn, "INSERT INTO `wishlist`(`user_id`,`pid`, `name`, `price`, `image`) VALUES ('$user_id','$product_id', '$product_name', '$product_price', '$product_image')"); 
            $message[]='Produkt pomyślnie dodany do ulubionych!';
        }
    }
    //addinng prodict in cart   
    if(isset($_POST['add_to_cart'])){
        $product_id = $_POST['product_id'];
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = $_POST['product_quantity'];
    
        $cart_num = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name' AND user_id='$user_id'") or die('query failed');
        if (mysqli_num_rows($cart_num) > 0) {
            $message[] ='Produkt juz został dodany do koszyka!';
        } else {
            mysqli_query($conn, "INSERT INTO `cart`(`user_id`, `pid`, `name`, `price`, `quantity`, `image`) VALUES ('$user_id', '$product_id', '$product_name', '$product_price', '$product_quantity', '$product_image')"); 
            $message[]='Produkt pomyślnie dodany do koszyka!';
        }
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


<!-------------------- home slider --------------------------------->
<div class="container-fluid">
        <div class="hero-slider">
            <div class="slider-item">
                <img src="image/home1.jpg" alt="">
                <div class="slider-caption">
                   
                    <h1>Sklep  <span>Paletaz</span></h1>
                    <p>Sprzedaż artykułów RTV i AGD, sprzętu gospodarstwa domowego ze
                        <br> zwrotów konsumenckich, nadwyżek i likwidacji magazynów.</p>
                    <!-- <a href="shop.php" class="btn">shop now</a> -->
                </div>
            </div>

            <div class="slider-item">
                <img src="image/home2.webp" alt="">
                <div class="slider-caption">
                    
                    <h1>Szybka wysyłka</h1>
                    <p>Realizujemy wysyłke na terenie całego kraju jak i za granice.</p>
                    
                </div>
            </div>

            <div class="slider-item">
                <img src="image/home2.webp" alt="">
                <div class="slider-caption">
                    
                    <h1>Nasze oferty</h1>
                    <p>Posiadamy szereg palet z różnych dziedzin, elektronika, dom i wiele wiecej...</p>
                    <a href="shop.php" class="btn">Sprawdź</a>
                </div>
            </div>

           

            
            

            
        </div>

            <div class="controls">
                <i class="bi bi-chevron-left prev"></i>
                <i class="bi bi-chevron-right next"></i>
            </div>
</div>

<!-------------------- services --------------------------------->
        <div class="line2"></div>
            <div class="services">
                <div class="row">
                    <div class="box">
                        <img src="image/service1.png" alt="">
                        <div>
                            <h1>Gwarancja zarobku</h1>
                            <p>Dajemy gwarancje że zarobisz na sprzedaży produktów od 150%-300%.</p>
                        </div>
                    </div>

                    <div class="box">
                    <img src="https://www.pngkey.com/png/detail/392-3923016_shipping-box-icon-png-shipping-box-icon.png" alt="Shipping Box Icon Png - Shipping Box Icon@pngkey.com">
                        <div>
                            <h1>Brak segregacji</h1>
                            <p>Wszystkie palety kupione u nas, są dostarczane bez przebierania. Czyli dostajesz to co wychodzi z magazynu Amazon.</p>
                        </div>
                    </div>

                    <div class="box">
                        <img src="image/service2.png" alt="">
                        <div>
                            <h1>Szybka wysyłka</h1>
                            <p>Palety zakupione u nas, wysyłamy w ciągu 2 dni roboczych.</p>
                        </div>
                    </div>
                </div>
            </div>

         <div class="line2"></div>
            <div class="story">
                <div class="row">
                    <div class="box">
                        <span>Nasza historia</span>
                        
                        <p>Specjalizacją naszej firmy jest sprzedaż paletowa – oferujemy palety i boxy Amazon z różnorodnym towarem, który obejmuje m.in. elektronikę, sprzęt RTV i AGD, zabawki, elektronarzędzia i akcesoria sportowe. Dlaczego my? Bo wyróżnia nas uczciwość – gwarantujemy brak segregacji towaru. Co więcej, wszystkie boxy i palety dostępne w sprzedaży posiadają specyfikację. Dzięki temu wiesz, co kupujesz i możesz liczyć na zysk ze sprzedaży produktów.</p>
                        <br>
                        <a href="shop.php" class="btn">Sprawdź nasz sklep</a>
                    </div>

                    <div class="box">
                        <img src="image/company1.png" alt="">
                    </div>
                </div>
            </div>
            <div class="line3"></div>


            <!-------------------- testimonial --------------------------------->
            <div class="line4"></div>
                <div class="testimonial-fluid">
                    <h1 class="title">Sprawdź opinie naszych klientów</h1>
                    <div class="testimonial-slider">

                        <div class="testimonial-item">
                            <img src="image/test1.jpg" alt="">
                            <div class="testimonial-caption">
                                <span>Test zawartości</span>
                                <h1>Paleta zwrotów z elektroniką</h1>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel porro inventore illo sunt quaerat nemo ipsa, molestiae ad deleniti, officia omnis, autem dolores? Officia corporis voluptatem saepe, illum veniam mollitia.</p>
                            </div>
                        </div>

                        <div class="testimonial-item">
                            <img src="image/test2.jpg" alt="">
                            <div class="testimonial-caption">
                                <span>Test zawartości i ocena firmy.</span>
                                <h1>Paleta zwrotów z elektroniką</h1>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel porro inventore illo sunt quaerat nemo ipsa, molestiae ad deleniti, officia omnis, autem dolores? Officia corporis voluptatem saepe, illum veniam mollitia.Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel porro inventore illo sunt quaerat nemo ipsa, molestiae ad deleniti, officia omnis, autem dolores? Officia corporis voluptatem saepe, illum veniam mollitia.</p>
                            </div>
                        </div>

                        <div class="testimonial-item">
                            <img src="image/test3.jpg" alt="">
                            <div class="testimonial-caption">
                            <span>Test zawartości i ocena firmy.</span>
                                <h1>Paleta zwrotów z elektroniką</h1>
                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Vel porro inventore illo sunt quaerat nemo ipsa, molestiae ad deleniti, officia omnis, autem dolores? Officia corporis voluptatem saepe, illum veniam mollitia.</p>
                            </div>
                        </div>
                        
                    </div>
                    <div class="controls">
                        <i class="bi bi-chevron-left prev1"></i>
                        <i class="bi bi-chevron-right next1"></i>
                    </div>
                    

                </div>
                

                <!-------------------- discover section --------------------------------->
                <div class="line2"></div>
                <div class="discover">
                    <div class="detail">
                        <div class="title">
                            <h1 class="title">Losowa paleta za 8 000 zł</h1>
                            <span>kup teraz -50% zniżki</span>
                            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quasi corporis quis nulla vitae sed odio maiores accusantium ullam obcaecati a explicabo assumenda dicta incidunt, vero fuga eius, deserunt quidem doloremque.</p>
                            <a href="shop.php" class="btn">discover now</a>
                        </div>
                        <div class="img-box">
                            <img src="image/discover1.jpg" alt="">
                        </div>
                    </div>
                    
                </div>

                
                <div class="line3"></div>
        <?php include 'homeshop.php'; ?>


        <div class="newslatter">
            <h1 class="title"> DOŁĄCZ DO NASZEGO NEWSLETTERA</h1>
            <p>Discont Lorem, ipsum dolor sit amet consectetur adipisicing elit. Accusantium nemo cum dolores eaque magni natus, nam quia corporis magnam amet quasi ipsum totam? Nulla ipsam cupiditate nisi placeat repellat consequatur?</p>
            <input type="text" name="" placeholder="Twój adres email">
            <button>Zapisz się</button>
        </div>
        <div class="line2"></div>
        <div class="client">
            <div class="box">
                <img src="img/client1.png" alt="">
            </div>
            <div class="box">
                <img src="img/client2.png" alt="">
            </div>
            <div class="box">
                <img src="img/client3.png" alt="">
            </div>
            <div class="box">
                <img src="img/client4.png" alt="">
            </div>
            <div class="box">
                <img src="img/client5.png" alt="">
            </div>
        </div>
        <?php include 'footer.php'; ?>


        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

        <script type="text/javascript" src="script2.js"></script>
        
       

</body>
</html>