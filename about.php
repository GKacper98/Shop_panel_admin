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
            <h1>O nas</h1>
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. </p>
           
        </div>
    </div>

    


    <!-----------------about us------------------->
   

    <div class="about-us">
        <div class="row">
            <div class="box">
                <div class="title">
                    <span>O NASZYM SKLEPIE INTERNETOWYM</span>
                    <h1>Witamy, z 25-letnim doświadczeniem</h1>
                </div>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Corrupti sapiente nesciunt laborum saepe blanditiis neque vitae nam dolor, quos eum dolore iusto aut iure doloremque commodi quod! Ex, temporibus magnam.
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Fugiat iste beatae aspernatur molestias itaque pariatur vero, eveniet ipsum expedita at, quaerat ullam tenetur reiciendis. Laborum eos illum minus ad minima.
                    </p>
                    </div>   
                <div class="img-box">
                <img src="image/home1.jpg" alt="">
                
            </div>
        </div>

    </div>

    <div class="line3"></div>
    <!----------------features------------------->
    <div class="line4"></div>
    <div class="features">
        <div class="titles">
        <h1>Kompleksowe Wsparcie</h1>
        <span>najlepsze cechy</span>
        </div>
        <div class="row">
            <div class="box">
                <img src="image/a1.png" alt="">
                <h4>24 x 7</h4>
            <p>wsparcie online 24/7</p>
            </div>
            <div class="box">
                <img src="image/a2.png" alt="">
                <h4>gwarancja zwrotu pieniędzy</h4>
            <p>100% bezpieczeństwa</p>
            </div>
            <div class="box">
                <img src="image/a3.png" alt="">
                <h4>Specjalna karta podarunkowa</h4>
            <p>wręcz doskonały prezent</p>
            </div>
            <div class="box">
                <img src="image/a4.png" alt="">
                <h4>międzynarodowa wysyłka</h4>
            <p>przy zamówieniach powyżej 99 zł</p>
            </div>
        </div>
    </div>
    <div class="line"></div>


    
    <!----------------team section------------------->
    

    <div class="team">
        <div class="title">
            <h1>Nasz zespół</h1>
            <span>najlepszy zespół</span>
        </div>
        <div class="row">
            <div class="box">
                
                <div class="img-box">
                    <img src="image/team1.jpg" alt="">
                </div>
                <div class="detail">
                   <span>Finace Manager</span>
                   <h4>xyz</h4>
                   <div class="icons">
                    <i class="bi bi-instagram"></i>
                    <i class="bi bi-youtube"></i>
                    <i class="bi bi-twitter"></i>
                    <i class="bi bi-facebook"></i>
                    </div>
                </div>
                
            </div>

            <div class="box">
                
                <div class="img-box">
                    <img src="image/test1.jpg" alt="">
                </div>
                <div class="detail">
                   <span>It Manager</span>
                   <h4>xyz</h4>
                   <div class="icons">
                    <i class="bi bi-instagram"></i>
                    <i class="bi bi-youtube"></i>
                    <i class="bi bi-twitter"></i>
                    <i class="bi bi-facebook"></i>
                    </div>
                </div>
                
            </div>

            <div class="box">
                
                <div class="img-box">
                    <img src="image/test2.jpg" alt="">
                </div>
                <div class="detail">
                   <span>It Manager</span>
                   <h4>Kacper Gleich</h4>
                   <div class="icons">
                    <i class="bi bi-instagram"></i>
                    <i class="bi bi-youtube"></i>
                    <i class="bi bi-twitter"></i>
                    <i class="bi bi-facebook"></i>
                    </div>
                </div>
                
            </div>

            <div class="box">
                
                <div class="img-box">
                    <img src="image/test3.jpg" alt="">
                </div>
                <div class="detail">
                   <span>It Manager</span>
                   <h4>xyz</h4>
                   <div class="icons">
                    <i class="bi bi-instagram"></i>
                    <i class="bi bi-youtube"></i>
                    <i class="bi bi-twitter"></i>
                    <i class="bi bi-facebook"></i>
                    </div>
                </div>
                
            </div>

        </div>
    </div>
    <div class="line2"></div>
    <div class="line4"></div>
    <div class="project">
        <div class="title">
            <h1>Kariera</h1>
            <span>jesteś ciekawy jak pracujemy, dołącz do nas!</span>
        </div>
        <div class="row">
            <div class="box">
                <img src="image/m1.jpg" alt="">
            </div>
            <div class="box">
                <img src="image/m2.jpg" alt="">
            </div>
            
        </div>
    </div>
    <div class="line"></div>
    <div class="line2"></div>
    <div class="ideas">
        <div class="title">
            <h1>Lorem, ipsum dolor sit amet consectetur adipisicing elit. ?</h1>
            <span>Nasze funkcje</span>
        </div>
        <div class="row">
            <div class="box">
                <i class="bi bi-stack"></i>
                <div class="detail">
                    <h2>XYZ</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate molestiae vero placeat excepturi soluta. Fuga consequuntur assumenda voluptatum nihil ad commodi provident, architecto laudantium ut. Harum tempora porro consectetur nostrum?</p>
                </div>
            </div>

            <div class="box">
                <i class="bi bi-grid-1x2-fill"></i>
                <div class="detail">
                <h2>XYZ</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate molestiae vero placeat excepturi soluta. Fuga consequuntur assumenda voluptatum nihil ad commodi provident, architecto laudantium ut. Harum tempora porro consectetur nostrum?</p>
                </div>
            </div>

            <div class="box">
                <i class="bi bi-grid-1x2-fill"></i>
                <div class="detail">
                <h2>XYZ</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptate molestiae vero placeat excepturi soluta. Fuga consequuntur assumenda voluptatum nihil ad commodi provident, architecto laudantium ut. Harum tempora porro consectetur nostrum?</p>
                </div>
            </div>
        </div>
    </div>
    <div class="line"></div>
<?php include 'footer.php'; ?>



        <script type="text/javascript" src="script.js"></script>
        
       

</body>
</html>