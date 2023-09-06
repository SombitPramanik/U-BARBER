<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'config.php';


if (!empty($_SESSION["session_token"])) {
    $session_token = $_SESSION["session_token"];
    $email = $session_token;

    $result = mysqli_query($conn, "SELECT * FROM normal_user WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        header("location: index.php"); // Invalid session token, redirect to login
    }
} else {
    header("location: index.php"); // No session token, redirect to login
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="language" content="en">
    <meta name="description" content="Discover reliable server and hosting solutions tailored to your needs at [Your Website Name]. We specialize in delivering cutting-edge hosting services, including shared, VPS, and dedicated hosting, ensuring your website's optimal performance. Take advantage of our expertise in custom server configurations, allowing you to build a server environment that perfectly matches your business requirements. Additionally, we offer advanced storage solutions, empowering you with scalable and secure data management. Explore our range of cost-effective plans and enhance your online presence with seamless server solutions">
    <meta name="keywords" content="web services, amazon web services, server,sql server,free website hosting, free domain and hosting, hosting, development server, sombit web services,https://hosting.sombti-server.online,">
    <meta name="author" content="Sombit Pramanik">
    <meta property="og:title" content="Sombit Web Services">
    <meta property="og:description" content="Discover reliable server and hosting solutions tailored to your needs at Sombit Web Services. We specialize in delivering cutting-edge hosting services, including shared, VPS, and dedicated hosting, ensuring your website's optimal performance. Take advantage of our expertise in custom server configurations, allowing you to build a server environment that perfectly matches your business requirements. Additionally, we offer advanced storage solutions, empowering you with scalable and secure data management. Explore our range of cost-effective plans and enhance your online presence with seamless server solutions.">
    <meta property="og:image" content="/image/sws.png">
    <meta property="og:url" content="https://hosting.sombti-server.online">
    <meta property="og:type" content="website">
    <link rel="icon" href="/image/sws.ico" type="image/x-icon">
    <title>U-BARBER</title>
    <!-- 
        Website External Page's and Style Link Section
     -->
    <link rel="stylesheet" href="/style.css">
    <link rel="stylesheet" href="/responsive.css">
    <link rel="stylesheet" href="/com.css">
    
    <!-- 
        Internal CSS Goes down
      -->

    <style>

    </style>
</head>

<body>
    <main class="blur-background">
        <span>our pluse point >>>></span>
        <div id="typing-container"></div>
        <section id="home">

            <h1>Welcome <?php echo $row["f_name"]; ?> <?php echo $row["l_name"]; ?></h1><br>
            <a href="/logout.php">Log out</a><br>
            <a href="/registration.php">New Registration</a>
            <div class="emoji">🚀</div>
            
</body>

</html>
<script src="script.js"></script>