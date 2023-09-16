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

$user = mysqli_query($conn, "SELECT * FROM normal_user");
$user_row = mysqli_fetch_assoc($user);

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
    <h1>Admin Panel</h1>
    <fieldset>
        <legend><b><i>Today Order</i></b></legend>
        <?php
        // Get today's date in the same format as the database date
        $todayDate = date("Y-m-d");

        // Query to fetch orders for today's date
        $order = mysqli_query($conn, "SELECT * FROM receive_order WHERE DATE(time_stamp) = '$todayDate'");

        if (mysqli_num_rows($order) > 0) {
            echo '<table>';
            echo '<caption>User Data information table</caption>';
            echo '<th>Operator</th>';
            echo '<th>Value</th>';

            while ($row = mysqli_fetch_assoc($order)) {
                echo '<tr>';
                echo '<td>Name</td>';
                echo '<td>' . $row["name"] . '</td>';
                echo '</tr>';

                echo '<tr>';
                echo '<td>Mobile</td>';
                echo '<td>' . $row["mobile"] . '</td>';
                echo '</tr>';

                echo '<tr>';
                echo '<td>Order ID</td>';
                echo '<td>' . $row["order_id"] . '</td>';
                echo '</tr>';

                echo '<tr>';
                echo '<td>Price:</td>';
                echo '<td>' . $row["price"] . '</td>';
                echo '</tr>';

                echo '<tr>';
                echo '<td>Chat</td>';
                echo '<td><a href="https://wa.me/' . $row["mobile"] . '" target="_blank">Chat with customer in Whatsapp</a></td>';
                echo '</tr>';

                echo '<tr>';
                echo '<td>Style</td>';
                echo '<td><img src="./img/' . $row["order_id"] . '.png" alt="' . $row["order_id"] . '"></td>';
                echo '</tr>';
            }

            echo '</table>';
        } else {
            echo "No orders placed today";
        }
        ?>
    </fieldset><br><br>
    <fieldset>
        <legend><b><i>Change Image & Price</i></b></legend>
        <?php
        $print_img_table = mysqli_query($conn, "SELECT * FROM order_id_price");
        echo '<table>';
        echo '<caption>Change Image & Price</caption>';
        echo '<th>Price</th>';
        echo '<th>Order ID</th>';
        echo '<th>Image</th>';

        while ($data = mysqli_fetch_assoc($print_img_table)) {
            echo '<tr>';
            echo '<td>' . $data["price"] . '</td>';
            echo '<td>' . $data["order_id"] . '</td>';
            echo '<td><img src="./img/' . $data["order_id"] . '.png" alt="' . $data["order_id"] . '"></td>';
            echo '</tr>';
        }
        echo '</table>';
        ?>
    </fieldset><br><br>
    <fieldset>
        <legend><b><i>Lifetime Revenue</i></b></legend>
        <div id="dual_x_div"></div>
    </fieldset>
</body>
<script src="./admin.js"></script>

</html>