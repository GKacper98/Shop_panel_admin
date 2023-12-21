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

    if(isset($_POST['submit-btn'])){
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $number = mysqli_real_escape_string($conn, $_POST['number']);
        $message = mysqli_real_escape_string($conn, $_POST['message']);

        $select_message = mysqli_query($conn, "SELECT * FROM `message` WHERE name= '$name' AND email = '$email' AND number = '$number' AND message = '$message'") or die ('query failed');
            if(mysqli_num_rows($select_message) > 0){
                echo 'message already sent';
            } else {
                mysqli_query($conn, "INSERT INTO `message` (`user_id`,`name`, `email`, `number`, `message`) VALUES ('$user_id', '$name', '$email', '$number', '$message')") or die ('query failed');

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
<div class="banner">
        <div class="detail">
            <h1>Kontakt z nami</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
            
        </div>
    </div>

    
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


         <div class="line4"></div>

         <div class="form-container">
            <h1 class="title">Napisz do nas</h1>
            <form method="post">
                <div class="input-field">
                    <label>Twoje imie</label><br>
                    <input type="text" name="name">
                </div>
                <div class="input-field">
                    <label>Twoj email</label><br>
                    <input type="text" name="email">
                </div>
                <div class="input-field">
                    <label>Numer telefonu</label><br>
                    <input type="number" name="number">
                </div>
                <div class="input-field">
                    <label>treść wiadomości</label><br>
                    <textarea name="message"></textarea>
                </div>
                <button type="submit" name="submit-btn" class="btn">wyś lij wiadomość</button>
                
            </form>
         </div>


         <div class="line"></div>
         <div class="line2"></div>

         <div class="address">
            <h1 class="title">our contact</h1>
            <div class="row">
                    <div class="box">
                        <i class="bi bi-map-fill"></i>
                        <div>
                        <h4>address</h4>
                        <p>Grudziadz 3220,<br>
                            ul.Adama Mickiewicza 33  </p>
                        </div>
                        
                    </div>

                    <div class="box">
                        <i class="bi bi-telephone-fill"></i>
                        <div>
                        <h4>phone number</h4>
                        <p>888 222 111 </p>
                        </div>
                        
                    </div>

                    <div class="box">
                        <i class="bi bi-envelope-fill"></i>
                        <div>
                        <h4>email</h4>
                        <p>skurwialabestia@aaa.dd </p>
                        </div>
                        
                    </div>

            </div>
         </div>
         <div class="line3"></div>
    

<?php include 'footer.php'; ?>



        <script type="text/javascript" src="script.js"></script>
        
       

</body>
</html>