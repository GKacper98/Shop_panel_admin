<?php
include 'connection.php';
session_start();

if(isset($_POST['submit-btn'])){
    $filter_email = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
    $email = mysqli_real_escape_string($conn, $filter_email);

    $filter_password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);
    $password = mysqli_real_escape_string($conn, $filter_password);

    $select_user = mysqli_query($conn, "SELECT * FROM `users` WHERE email = '$email' AND password = '$password'") or die ('query failed');

    if(mysqli_num_rows($select_user) > 0){
        $row = mysqli_fetch_assoc($select_user);
            if($row['user_type'] == 'admin'){
                $_SESSION['admin_name'] = $row['name'];
                $_SESSION['admin_email'] = $row['email'];
                $_SESSION['admin_id'] = $row['id'];
                header('location: admin_pannel.php');
            } else if($row['user_type'] == 'user'){
                $_SESSION['user_name'] = $row['name'];
                $_SESSION['user_email'] = $row['email'];
                $_SESSION['user_id'] = $row['id'];
                header('location: index.php');
            }
        else {
            $message[] = 'Incorrect email or password';
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login page</title>

    <link rel="stylesheet" type="text/css" href="style.css">

    <style>
    .message {
        text-align: center;
        text-transform: capitalize;
        margin: 0 auto;
        margin-bottom: 2rem;
        width: 59%;
        padding: .5rem 1.5rem;
        border-radius: 5px;
        display: flex;
        justify-content: space-between;
        background: #000;
        color: #fff;
    }

    .message i {
        cursor: pointer;
    }
</style>
</head>
<body>


    
    <section class = "form-container">

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
        <form method="post">
            <h1>Zaloguj się</h1>

            <div class="input-field">
                <label>your email</label><br>
                <input type="email" name = "email" placeholder = "enter your email" required>
            </div>
            <div class="input-field">
                <label>your password</label><br>
                <input type="password" name = "password" placeholder = "enter your password" required>
            </div>
           
            <input type="submit" name = "submit-btn" placeholder = "login now" class="btn">
            <p>do not have an account? <a href="register.php">register now</a></p>
        </form>
    </section>
</body>
</html>