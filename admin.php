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

// $order = mysqli_query($conn, "SELECT * FROM receive_order");
// $order_row = mysqli_fetch_assoc($order);


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
        <table>
            <tr>
                <td>
                    <div class="op">
                        <span>order ID: UB003</span>
                        <br><br>
                        <span>update Price
                            <br>
                            <a href="">current : 103</a>
                            <a href="">update</a>
                        </span>
                    </div>
                </td>
                <td>
                    <img src="./img/10.png" alt="" srcset="">
                    <a href="">change image</a>
                    <a href="">Delete image</a>
                </td>

            </tr>
        </table>
    </fieldset>
    <fieldset>
        <legend><b><i>Total Renew</i></b></legend>
        <fieldset>
            <legend><b><i> This Month Renew </i></b></legend>
            <?php
            global $ub001, $ub002, $ub003, $ub004, $ub005, $ub006, $total_order;

            // Get the current month as a number (1-12)
            $currentMonth = date("m");

            // Query to fetch orders for the current month
            $monthly_order = mysqli_query($conn, "SELECT * FROM receive_order WHERE MONTH(time_stamp) = '$currentMonth'");

            // Initialize the total order count
            $total_order = 0;

            if (mysqli_num_rows($monthly_order) > 0) {
                while ($monthly_order_row = mysqli_fetch_assoc($monthly_order)) {
                    // Increment the total order count
                    $total_order++;

                    // Get the order ID from the current row
                    $order_fetch = $monthly_order_row["order_id"];

                    // Categorize orders based on their order IDs
                    switch ($order_fetch) {
                        case "UB001":
                            $ub001 = $order_fetch;
                            break;
                        case "UB002":
                            $ub002 = $order_fetch;
                            break;
                        case "UB003":
                            $ub003 = $order_fetch;
                            break;
                        case "UB004":
                            $ub004 = $order_fetch;
                            break;
                        case "UB005":
                            $ub005 = $order_fetch;
                            break;
                        case "UB006":
                            $ub006 = $order_fetch;
                            break;
                            // Add more cases for other order IDs if needed
                        default:
                            // Handle any other order IDs here
                            break;
                    }
                    echo '
                        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                        <script>
                            let data = google.visualization.arrayToDataTable([
                                ["Genre", "Fantasy & Sci Fi", "Romance", "Mystery/Crime", "General",
                                "Western", "Literature", { role: "annotation" } ],
                                ["2010", 10, 24, 20, 32, 18, 5, "],
                                ["2020", 16, 22, 23, 30, 16, 9, "],
                                ["2030", 28, 19, 29, 30, 12, 13, "]
                            ]);
                        
                            let options = {
                                width: 600,
                                height: 400,
                                legend: { position: "top", maxLines: 3 },
                                bar: { groupWidth: "75%" },
                                isStacked: true
                            };
                            let chart = new google.charts.Bar(document.getElementById("dual_x_div"));
                            chart.draw(data, options);
                        </script>

                    ';
                }
            } else {
                echo "No orders placed in this month";
            }
            ?>

        </fieldset>
        <fieldset>
            <legend><b><i>Lifetime Renew</i></b></legend>
            <div id="dual_x_div" style="width: 900px; height: 500px;"></div>
        </fieldset>
    </fieldset>
</body>
<script src="./admin.js"></script>

</html>