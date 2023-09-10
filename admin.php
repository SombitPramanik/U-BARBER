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
    <meta name="description" content="Discover reliable server and hosting solutions tailored to your needs at [Your Website Name]. We specialize in delivering cutting-edge hosting services, including shared, VPS, and dedicated hosting, ensuring your website's optimal performance. Take advantage of our expertise in custom server configurations, allowing you to build a server environment that perfectly matches your business requirements. Additionally, we offer advanced storage solutions, empowering you with scalable and secure data management. Explore our range of cost-effective plans and enhance your online presence with seamless server solutions">
    <meta name="keywords" content="web services, amazon web services, server,sql server,free website hosting, free domain and hosting, hosting, development server, sombit web services,https://hosting.sombti-server.online,">
    <meta name="author" content="Sombit Pramanik">
    <meta property="og:title" content="Sombit Web Services">
    <meta property="og:description" content="Discover reliable server and hosting solutions tailored to your needs at Sombit Web Services. We specialize in delivering cutting-edge hosting services, including shared, VPS, and dedicated hosting, ensuring your website's optimal performance. Take advantage of our expertise in custom server configurations, allowing you to build a server environment that perfectly matches your business requirements. Additionally, we offer advanced storage solutions, empowering you with scalable and secure data management. Explore our range of cost-effective plans and enhance your online presence with seamless server solutions.">
    <meta property="og:image" content="/image/sws.png">
    <meta property="og:url" content="https://hosting.sombti-server.online">
    <meta property="og:type" content="website">
    <link rel="icon" href="./U-BARBER.ico" type="image/x-icon">
    <title>U-BARBER ADMIN</title>
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
                height: 550px;
            }

            .order {
                text-transform: capitalize;
                display: flex;
                justify-content: space-evenly;
            }

            .list {
                list-style-type: none;
                border: 2px solid red;
                height: 130px;
                width: 40%;
            }

            .list1 {

                list-style-type: none;
                border: 2px solid red;
                height: 130px;
                width: 40%;
                margin-top: 2em;
            }

            main {
                margin-top: 1em;
                border: 2px solid red;
                height: max-content;
                padding: 2em;
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
                height: 80%;
                width: 50%;
                margin: auto;
            }

            img {
                height: 80%;
                width: 80%;
            }

            .links {
                border: 2px solid red;
                width: 40%;
            }

            a {
                font-family: Arial, Helvetica, sans-serif;
                /* float: left !important; */
                padding: 4px 1em;
                text-decoration: none;
                background-color: yellowgreen;
                margin: .3em 1em;
                border-radius: .2em;
                box-shadow: 0px 4px 8px 2px rgba(62, 219, 167, 0.5);
            }

            h3 {
                font-family: Arial, Helvetica, sans-serif;
            }

            .r_order {
                margin: .3em;
                border-radius: 5px;
                padding: 4px 8px;
                background-color: greenyellow;
            }
            .im{
                width: 200px;
            }
            .hed{
                display: flex;
            }
        }

        i {
            font-family: Arial, Helvetica, sans-serif;
        }

        li {
            list-style-type: none;
        }
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