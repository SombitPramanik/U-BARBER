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
        exit();
    }
}

if (isset($_POST["submit"])) {
    $name = $_POST["name"];
    $mobile = $_POST["mobile"];
    $order_id = $_POST["order_id"];
    $time = time();


    $query = "INSERT INTO receive_order VALUES('$time','$name','$mobile','$order_id')";
    mysqli_query($conn, $query);
}

?>
<!DOCTYPE html>
<html>

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
    <title>Review Order / <?php echo ucwords($row["f_name"] . " " . $row["l_name"]); ?></title>
</head>

<body>
    <form action="" method="post" class="order_form">
        <h1>Review Order</h1><br>
        <label for="name">First Name </label>
        <input type="text" name="name" id="name" required value="<?php echo ucwords($row["f_name"] . " " . $row["l_name"]); ?>"><br>
        <label for="mobile">Mobile Number </label>
        <input type="tel" id="mobile" name="mobile" required value="<?php echo $row["mobile"]; ?>"><br>
        <label for="order_id">Order ID </label>
        <input type="text" id="order_id" name="order_id" contenteditable="false" readonly required><br>

        <button type="submit" name="submit" id="submit"> Register !</button>
    </form>
    <br>
</body>
<script>
    // Function to update the orderId field based on local storage
    function updateOrderIdField() {
        // Retrieve orderId from local storage
        const orderId = localStorage.getItem("orderId");

        // Check if orderId exists and if the element with id "order_id" exists
        if (orderId && document.getElementById("order_id")) {
            // Get the current value of the order_id field
            const currentOrderId = document.getElementById("order_id").value;

            // Check if the orderId has changed
            if (orderId !== currentOrderId) {
                // Update the orderId field
                document.getElementById("order_id").innerText = orderId;
                document.getElementById("order_id").value = orderId;
            }
        }
    }

    // Set an interval to continuously update the orderId field
    const updateInterval = setInterval(updateOrderIdField, 100); // Update every 1 second (adjust as needed)
</script>

</html>