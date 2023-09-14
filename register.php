<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require './config.php';
session_unset();
session_destroy();

if (isset($_POST["submit"])) {
    $first_name = $_POST["f_name"];
    $last_name = $_POST["l_name"];
    $email = $_POST["email"];
    $mobile = $_POST["m_num"];
    $password = $_POST["password"];
    $c_password = $_POST["c_password"];
    $duplicate = mysqli_query($conn, "SELECT * FROM normal_user Where email = '$email'");


    if (mysqli_num_rows($duplicate) > 0) {
        echo "<script>alert('Email and User Name is Already Taken\nUse Another One');</script>";
    } else {
        if ($password == $c_password) {
            echo "<script>alert('Registration successful\n ! your username is $email\nRedirecting in 5 seconds');</script>";
            $query = "INSERT INTO normal_user VALUES('$first_name','$last_name','$email','$password','$mobile')";
            mysqli_query($conn, $query);
            echo"<script>alert('Registration successful\n ! your username is $email\nRedirecting in 10 seconds');</script>";
            echo "<script>setTimeout(function() { window.location.href = 'index.php'; }, 5000);</script>";
            exit();
        } else {
            echo "<script>alert('Password Does Not Match [ $password Not Qual to $c_password ] Please Try again');</script>";
        }
    }
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
    <title>U-BARBER Registration</title>
    <link rel="stylesheet" href="./index.css">
    <link rel="stylesheet" href="./responsive.css">
</head>

<body>
    <img src="./U-BARBER.png" alt="" srcset="">
    <form action="" method="post" class="ref_form">
        <label for="f_name">First Name </label>
        <input type="text" name="f_name" id="f_name" required value="" placeholder="Enter Your First Name"><br>
        <label for="l_name">Last Name </label>
        <input type="text" id="l_name" name="l_name" required value="" placeholder="Enter Your Last Name"><br>
        <label for="email">Email </label>
        <input type="email" id="email" name="email" required value="" placeholder="Enter Your Email"><br>
        <label for="m_num">Mobile Number </label>
        <input type="tel" id="m_num" name="m_num" required value="" placeholder="Enter your mobile Number"><br>
        <label for="password">Password </label>
        <input type="password" id="password" name="password" required value="" placeholder="Enter Super Strong Password"><br>
        <label for="c_password">Confirm Password</label>
        <input type="password" id="c_password" name="c_password" required value="" placeholder="Re-Enter Same Super Strong Password"><br>
        <button type="submit" name="submit" id="submit"> Register !</button>
    </form>
    <br>
    <a href="./index.php">Log In</a>



</body>

</html>
