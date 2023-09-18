<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'config.php';
if (!empty($_SESSION["session_token"])) {
    $email = $_SESSION["session_token"];

    $result = mysqli_query($conn, "SELECT * FROM sysadmin WHERE email = '$email'");
    $row = mysqli_fetch_assoc($result);

    if (!$row) {
        header("location: index.php"); // Invalid session token, redirect to login
        exit();
    }
} else {
    header("location: index.php");  // if session token is not found redirect 
}

$targetDirectory = "./img/"; // Change this path to your desired directory

// Check if the target directory exists, and create it if it doesn't
if (!file_exists($targetDirectory)) {
    mkdir($targetDirectory, 0755, true);
}


if (isset($_POST["submit"])) {
    $id = $_POST["order_id"];
    $up_id = strtoupper($id);
    $price = $_POST["price"];
    $file = $_FILES["new_img"];
    $fileName = $file["name"];
    $fileSize = $file["size"];
    $fileTmpName = $file["tmp_name"];
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedFileTypes = array("png", "jpeg", "jpg");
    $maxFileSize = 10 * 1024 * 1024;


    if (!in_array(strtolower($fileType), $allowedFileTypes)) {
        echo "Error: Only .png .jpeg and .jpg files are allowed.";
    } elseif ($fileSize > $maxFileSize) {
        echo "Error: File size exceeds the maximum allowed size (10 MB).";
    } else {
        // Generate a unique file name based on username and file extension
        $uniqueFileName = $up_id . '.' . $fileType;

        // Construct the complete file path
        $filePath = $targetDirectory . $uniqueFileName;

        // Move the uploaded file to the target directory
        if (move_uploaded_file($fileTmpName, $filePath)) {
            // Update the price in the database
            $update_query = "UPDATE order_id_price SET price='$price' WHERE order_id='$up_id'";
            $success = mysqli_query($conn, $update_query);
            if ($success) {
                // If the query was successful, show a success message
                echo '<script>alert("Price & IMG Update Successfully.");setTimeout(function() { window.close(); }, 800);</script>';
            } else {
                // If there was an error with the query
                echo 'Error: ' . mysqli_error($conn);
            }
        } else {
            echo "Error uploading file.";
        }
    }
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
    <link rel="stylesheet" href="./order.css">
</head>

<body>
    <form action="" method="post" class="order_form" enctype="multipart/form-data">
        <h1>Update Catalog</h1><br>
        <label for="order_id">Order ID</label>
        <input type="text" id="order_id" name="order_id" required><br>
        <label for="price">Price</label>
        <input type="text" id="price" name="price" required><br>
        <label for="new_img">Select New Image</label>
        <input type="file" id="new_img" name="new_img" accept=".png,.jpeg,.jpg" ><br>
        <button type="submit" name="submit" id="submit">Update Now</button>
    </form>
    <br>
</body>

</html>