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

    $admin = mysqli_query($conn, "SELECT * FROM business_info");
    $admin_row = mysqli_fetch_assoc($admin);

    if (!$row) {
        header("location: index.php"); // Invalid session token, redirect to login
    }
} else {
    header("location: index.php");
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
    <title>U-BARBER / <?php echo ucwords($row["f_name"] . " " . $row["l_name"]); ?></title>
    <link rel="stylesheet" href="./user.css">
</head>

<body>
    <header>
        <div class="user_info">
            <h3>👋 Welcome <?php echo ucwords($row["f_name"] . " " . $row["l_name"]); ?></h3>
            <div class="hed" style="display: flex;">
                <div class="cont">
                    <span>
                        <a style="padding-right: 2.1em;" target="_blank" href="https://wa.me/<?php echo $admin_row["mobile"]; ?>">Contact Owner</a><br><br>
                        <a class="openBTN2" data-order-id="UBCS1">Custom Order</a><br><br>
                        <a href="./logout.php">log out</a><br><br>
                    </span>
                </div>
                <div class="im">
                    <img src="./U-BARBER.png" alt="">
                </div>
            </div>
            <i><span style="font-family: Arial, Helvetica, sans-serif;"><?php echo $admin_row["tagline"]; ?><br><br> <b> Let's make you look sharp and feel fantastic. See you soon! </i>😊✨</b></span>
            <div id="recent_order">
                <h2>Recent Orders</h2>
                <div class="order">
                    <li class="list">
                        <div class="image">
                            <img src="./U-BARBER.png" alt="" srcset="">
                        </div>
                        <div class="con_order" style="padding: 5px;">
                            <br><a class="con_b" href="">Order Now</a><br><br>
                            <a class="con_b" href="">Feedback</a><br><br>
                            <a class="con_b" href="">Share</a><br>
                        </div>
                    </li>
                    <li class="list">
                        <div class="image">
                            <img src="./U-BARBER.png" alt="" srcset="">
                        </div>
                        <div class="con_order" style="padding: 5px;">
                            <br><a class="con_b" href="">Order Now</a><br><br>
                            <a class="con_b" href="">Feedback</a><br><br>
                            <a class="con_b" href="">Share</a><br>
                        </div>
                    </li>
                </div>
            </div>
        </div>
    </header>
    <main>
        <?php
        $order_id = mysqli_query($conn, "SELECT * FROM order_id_price");
        $data = mysqli_fetch_assoc($order_id);

        echo '<div class="show_con">';
        echo '<h2><b><i>Recommended Collections</i></b></h2>';
        echo '<div class="order">';

        while ($order_id_list = mysqli_fetch_assoc($order_id)) {
            echo '<li class="list1">';
            echo '<div class="image1">';
            // echo '<img src="./img/' . $order_id_list["order_id"] . '.png" alt="" srcset="">';
            $extensions = array("png", "jpeg", "jpg");
            $folders = array("./img/", "./uploads/");
            $imageSrc = "";
            
            foreach ($extensions as $extension) {
                foreach ($folders as $folder) {
                    $imagePath = $folder . $data["order_id"] . "." . $extension;
                    if (file_exists($imagePath)) {
                        $imageSrc = $imagePath;
                        break 2; // Break out of both loops when a valid image is found
                    }
                }
            }
            if (!empty($imageSrc)) {
                echo '<td><img src="' . $imageSrc . '" alt="' . $data["order_id"] . '"></td>';
            } else {
                echo '<td>No image found</td>';
            }
            echo '</div>';
            echo '<div class="con" style="margin:5px;">';
            echo '<br><a class="openBTN" data-order-id="' . $order_id_list["order_id"] . '" price="' . $order_id_list["price"] . '">Order Now</a><br><br>';
            echo '<a class="con_a" href="whatsapp://send?text=Go%20and%20checkout%20The%20Beautiful%20Online%20Hair%20Cutting%20Website%20https://barber.sombti-server.online" target="_blank">Share With Friends <span class="share">&#x1F4E2;</span></a><br>';
            echo '</div>';
            echo '</li>';
        }
        echo '</div>';
        echo '</div>';
        
        ?>
    </main>
    <div id="popup" class="popup">
        <div class="popup-content">
            <iframe src="./order.php" width="99%" height="100%" style="border-radius: 5px;"></iframe>
            <span class="close" id="closeButton">&times;</span>
        </div>
    </div>
    <div id="popup2" class="popup2">
        <div class="popup-content2">
            <iframe src="./custom.php" width="99%" height="100%" style="border-radius: 5px;"></iframe>
            <span class="close2" id="closeButton2">&times;</span>
        </div>
    </div>
    <footer>
        <div class="logo">
            <img src="./U-BARBER.png" alt="">
        </div>
        <div class="links">
            <li> <a href="https://wa.me/6297037940" target="_blank">Our Developer</a></li> <br>
            <li> <a href="https://wa.me/<?php echo $admin_row["mobile"]; ?>" target="_blank">Site Owner</a></li> <br>
            <li> <a href="<?php echo $admin_row["facebook"]; ?>" target="_blank">Facebook</a></li> <br>
            <li> <a href="<?php echo $admin_row["instagram"]; ?>" target="_blank">Instagram</a></li> <br><br><br>
            <span><a style="font-size:small;margin: 0;background-color: transparent; box-shadow:none; padding:0; color:ghostwhite; opacity:35%;" href="https://hosting.sombti-server.online" target="_blank"><i><b>Developed & Hosted By SWS</b></i></a></span><br>
        </div>
    </footer>
    <script src="./script.js"></script>
</body>

</htm