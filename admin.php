<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'config.php';


if (!empty($_SESSION["session_token"])) {
    $session_token = $_SESSION["session_token"];
    $email = $session_token;

    $result = mysqli_query($conn, "SELECT * FROM sysadmin WHERE email = '$email'");

    $admin_row = mysqli_fetch_assoc($result);

    if (!$admin_row) {
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
    <meta name="description" content="Welcome to U-BARBER, your destination for top-notch grooming and style services. Our skilled barbers are dedicated to helping you look and feel your best with precision haircuts, traditional shaves, and modern styling. Experience the art of barbering in a relaxed and comfortable atmosphere. Book your appointment today and elevate your style with U-BARBER.">
    <meta name="keywords" content="U-BARBER,online barber, barber, new website, barber shop,https://barber.sombti-server.online">
    <meta name="author" content="Sombit Pramanik">
    <meta property="og:title" content="U-BARBER">
    <meta property="og:description" content="Welcome to U-BARBER, your destination for top-notch grooming and style services. Our skilled barbers are dedicated to helping you look and feel your best with precision haircuts, traditional shaves, and modern styling. Experience the art of barbering in a relaxed and comfortable atmosphere. Book your appointment today and elevate your style with U-BARBER.">
    <meta property="og:image" content="./U-BARBER.png">
    <meta property="og:url" content="https://barber.sombti-server.online">
    <meta property="og:type" content="website">
    <link rel="icon" href="./U-BARBER.ico" type="image/x-icon">
    <title>U-BARBER ADMIN</title>
    <link rel="stylesheet" href="./admin.css">
    <style>
        
    </style>
</head>

<body>
    <header>
        <div class="user_info">
            <i><h3>Welcome <?php echo ucwords($admin_row["name"]);?></h3></i>
            <div class="hed">
                <div class="cont">
                    <span><a href="">Contact Developer</a><br><br><a href="#order">View Orders</a><br><br><a href="./logout.php">Log out</a><br></span><br><br>

                </div>
                <div class="im">
                    <img src="./U-BARBER.png" alt="">
                </div>
            </div>
            <i><span>Welcome To The <b> <i>Admin Panel for U-BARBER</i> </b> , Hear you can easily manage your orders and view you Monthly Orders & many more things, if you need some help from the Developer press the <b> "Contact Developer"</b> Button for Help. <br> <b>Enjoy your day !!!</b></span></i>
            <div id="profits">
                <h3>This Month Orders</h3>
                
            </div>
        </div>
    </header>
    <main>

        <div class="order">
            <li class="list1"></li>
            <li class="list1"></li>

        </div>
        <div class="order"><span class="r_order">order now</span><br><span class="r_order">order now</span></div>
        <div class="order">
            <li class="list1"></li>
            <li class="list1"></li>
        </div>
        <div class="order"><span class="r_order">order now</span><br><span class="r_order">order now</span></div>


        <div class="order">
            <li class="list1"></li>
            <li class="list1"></li>
        </div>
        <div class="order"><span class="r_order">order now</span><br><span class="r_order">order now</span></div>


        <div class="order">
            <li class="list1"></li>
            <li class="list1"></li>
        </div>
        <div class="order"><span class="r_order">order now</span><br><span class="r_order">order now</span></div>

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
            <li> <a href="" target="_blank"></a></li>

        </div>
    </footer>
</body>

</html>
<script src="script.js"></script>