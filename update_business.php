<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve user inputs
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $tagline = $_POST['tagline'];
    $openTime = $_POST['open'];
    $closeTime = $_POST['close'];

    // Update the row in the database
    $update_query = "UPDATE business_info SET name='$name', mobile='$mobile', tagline='$tagline', open='$openTime', close='$closeTime'";

    // Execute the SQL UPDATE statement
    $result = mysqli_query($conn, $update_query);

    if ($result) {
        echo "Business information updated successfully <br> Close This Page!";
    } else {
        echo "Error updating business information: " . mysqli_error($conn);
    }
}

$b = mysqli_query($conn, "SELECT * FROM business_info");
$a = mysqli_fetch_assoc($b);
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
    <title>Update Business Info</title>
    <link rel="stylesheet" href="./order.css">
    <link rel="stylesheet" href="./admin.css">
    <style>
        /* textarea {
            width: 90%;
            font-weight: bold;
            overflow: hidden;
            border-radius: .3em;
            margin: .5em;
            height: 2em;
            padding: .3em;
            border: 4px solid yellow;

        } */
    </style>
</head>

<body>
    <form action="" method="post" class="business_info_form">
        <h1>Update Business Information</h1><br>
        <label for="name">Business Name</label>
        <input type="text" id="name" name="name" value="<?php echo $b["name"]; ?>" required><br>

        <label for="mobile">Mobile</label>
        <input type="tel" id="mobile" name="mobile" value="<?php echo $b["mobile"]; ?>" required><br>

        <label for="tagline">Tagline</label>
        <textarea name="tagline" id="tagline" required value="<?php echo $b["tagline"]; ?>" cols="30" rows="10"></textarea><br>

        <label for="open">Open Time</label>
        <input type="text" id="open" name="open" value="<?php echo $b["open"]; ?>" required><br>

        <label for="close">Close Time</label>
        <input type="text" id="close" name="close" value="<?php echo $b["close"]; ?>" required><br>

        <label for="open">Instagram</label>
        <input type="text" id="open" name="open" value="<?php echo $b["instagram"]; ?>" required><br>

        <label for="open">Facebook</label>
        <input type="text" id="open" name="open" value="<?php echo $b["facebook"]; ?>" required><br>

        <button type="submit" name="submit" id="submit">Update Business Info</button>
    </form>
    <br>
</body>

</html>