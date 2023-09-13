<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require './config.php';

if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $password = $_POST["password"];
    // ADMIN Log IN  system
    if($email == 'm.sombitpramanik@gmail.com'OR'admin@ubarber.com'){
        $result = mysqli_query($conn, "SELECT * FROM sysadmin WHERE email = '$email'");
        $row = mysqli_fetch_assoc($result);
        
        if (mysqli_num_rows($result) > 0) {
            if ($password == $row["password"]) {
                $session_token = $email; // Use email as session token
                $_SESSION["login"] = true;
                $_SESSION["session_token"] = $session_token;
                header("location: admin.php");
                exit();
            } else {
                echo "<script>alert('Wrong Password');</script>";
            }
        } else {
            echo "<script>alert('You are ot Admin User');</script>";
        }  
    }
    // Normal User Login System
    $result = mysqli_query($conn, "SELECT * FROM normal_user WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);
    
    if (mysqli_num_rows($result) > 0) {
        if ($password == $row["password"]) {
            $session_token = $email; // Use email as session token
            $_SESSION["login"] = true;
            $_SESSION["session_token"] = $session_token;
            header("location: user.php");
            exit();
        } else {
            echo "<script>alert('Wrong Password');</script>";
            exit();
        }
    } else {

        echo "<script>alert('Username or email is not found :(  Register Now!');</script>";
        exit();
    }
    // ADMIN Log IN  system

}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="language" content="en">
    <meta name="description" content="Welcome to U-BARBER, your destination for top-notch grooming and style services. Our skilled barbers are dedicated to helping you look and feel your best with precision haircuts, traditional shaves, and modern styling. Experience the art of barbering in a relaxed and comfortable atmosphere. Book your appointment today and elevate your style with U-BARBER.">
    <meta name="keywords" content="U-BARBER,online barber, barber, new website, barber shop,https://barber.sombti-server.online">
    <meta name="author" content="Sombit Pramanik">
    <meta property="og:title" content="U-BARBER">
    <meta property="og:description" content="Welcome to U-BARBER, your destination for top-notch grooming and style services. Our skilled barbers are dedicated to helping you look and feel your best with precision haircuts, traditional shaves, and modern styling. Experience the art of barbering in a relaxed and comfortable atmosphere. Book your appointment today and elevate your style with U-BARBER.">
    <meta property="og:image" content="./U-BARBER.png">
    <meta property="og:url" content="https://barber.sombti-server.online">
    <meta property="og:type" content="website">
    <link rel="icon" href="./U-BARBER.ico" type="image/x-icon">
    <title>U-BARBER HOME</title>
    <link rel="stylesheet" href="./responsive.css">
    <!-- 
        Internal CSS Goes down
    -->

    <style>
        
    </style>
</head>

<body>
    <img src="./U-BARBER.png" alt="" srcset=""><br>
    <form action="" method="post" class="login_form">
        <label for="email">What is your Email </label>
        <input type="email" placeholder="please tell me" name="email" id="email" required><br>
        <label for="password">What is your password </label>
        <input type="password" placeholder="Promise, I don't tell anyone" name="password" id="password" required> <br>
        <button type="submit" name="submit" id="login_btn">Log In</button>
    </form>
    <a href="./register.php">Register Here</a>
</body>

</html>