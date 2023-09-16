<?php
require 'config.php';
// Check if the form is submitted
if (isset($_POST['submit'])) {
    $unique_id = $_POST['unique_id'];
    $price = $_POST['price'];

    // Update the price in the database
    $update_query = "UPDATE order_id_price SET price='$price' WHERE order_id='$unique_id'";
    if (mysqli_query($conn, $update_query)) {
        echo "Price updated successfully.<br>";
    } else {
        echo "Error updating price: " . mysqli_error($conn) . "<br>";
    }

    // Handle image upload if a new image is provided
    if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_name = $_FILES['image']['name'];
        $image_extension = pathinfo($image_name, PATHINFO_EXTENSION);

        // Rename the image file to match the unique ID
        $new_image_name = "./img/$unique_id.$image_extension";

        // Delete the existing image
        $existing_image_name = "./img/$unique_id.png"; // Change the extension as needed
        if (file_exists($existing_image_name)) {
            unlink($existing_image_name);
        }

        // Move the uploaded image to the /img directory with the new name
        if (move_uploaded_file($image_tmp_name, $new_image_name)) {
            echo "Image updated successfully.<br>";
        } else {
            echo "Error updating image.<br>";
        }
    }
}
$order_id = mysqli_query($conn, "SELECT * FROM order_id_price");
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
    <link rel="stylesheet" href="./order.css">
    <title>Update Price and Image</title>
</head>

<body>
    <form action="" method="post" enctype="multipart/form-data">
        <label for="unique_id">Changing For</label>
        <input type="text" id="unique_id" name="unique_id" contenteditable="false" required readonly><br>

        <label for="price">Old Price</label>
        <input type="text" id="price" name="price" required contenteditable="false" readonly><br>

        <label for="new_price">New Price </label>
        <input type="text" id="new_price" name="new_price" required>

        <label for="image">New Image</label>
        <input type="file" id="image" name="image" required><br>

        <input type="submit" name="submit" value="Update">
    </form>
</body>
<script>
    const closeButton = document.getElementById("closeButton");

    function updateOrderIdField() {
        const orderId = localStorage.getItem("orderId");
        if (orderId && document.getElementById("order_id")) {
            const currentOrderId = document.getElementById("order_id").value;

            if (orderId !== currentOrderId) {
                document.getElementById("order_id").innerText = orderId;
                document.getElementById("order_id").value = orderId;
            }
        }
    }
    const updateInterval = setInterval(updateOrderIdField, 100);
</script>

</html>