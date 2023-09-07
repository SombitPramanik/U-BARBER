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
    <title>U-BARBER / <?php echo ucwords($row["f_name"] . " " . $row["l_name"]); ?></title>
    <!-- 
        Website External Page's and Style Link Section
     -->
    <link rel="stylesheet" href="./user.css">

    <!-- 
        Internal CSS Goes down
      -->

    <style>
        @media screen and (max-width: 768px) {
            body {
                margin: 0;
                padding: 0;

            }

            .user_info {
                padding: 1em;
                font-size: large;
                border: 2px solid red;
                height: 320px;
            }

            .order {
                display: flex;
                justify-content: space-evenly;
            }

            .list {
                list-style-type: none;
                border: 2px solid red;
                height: 100px;
                width: 40%;
            }

            main {
                margin-top: 1em;
                border: 2px solid red;
                height: 400px;
            }

            footer {
                margin-top: 1em;
                height: 250px;
                border: 2px solid red;

                display: flex;
                justify-content: space-evenly;
                text-align: center;
            }

            .logo {
                border: 2px solid red;
                /* height: 100px; */
                width: 30%;
                /* margin: auto; */

            }

            img {
                height: 100px;
                width: 100px;
            }

            .links {
                border: 2px solid red;
                width: 60%;


            }
            a{
                float: left !important;
                padding: 3pt 1em;
            }

        }

        li {
            list-style-type: none;
        }
    </style>
</head>

<body>
    <header>
        <div class="user_info">
            <h3>Welcome <?php echo ucwords($row["f_name"] . " " . $row["l_name"]); ?></h3>
            <span>Useful Links <a href="">New Order</a> <a href="">Contact Owner</a> <a href="">log out</a> </span><br>
            <span>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Totam corrupti error blanditiis atque illum dolor culpa eligendi aliquam nam. Sed.</span>
            <h4>Your Orders</h4>
            <div class="order">
                <li class="list"></li><br>
                <li class="list"></li>
            </div>
        </div>
    </header>
    <main>


    </main>
    <footer>
        <div class="logo">
            <img src="./U-BARBER.png" alt="">

        </div>
        <div class="links">
            <li> <a href="" target="_blank">>> Our Developer</a></li> <br>
            <li> <a href="" target="_blank">>> Site Owner</a></li> <br>
            <li> <a href="" target="_blank">>> Facebook</a></li> <br>
            <li> <a href="" target="_blank">>> Instagram</a></li> <br>
            <li> <a href="" target="_blank">>> Whatsapp</a></li> <br>
            <li> <a href="" target="_blank">>> </a></li>

        </div>
    </footer>
</body>

</html>
<script src="script.js"></script>