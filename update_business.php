<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require 'config.php';

$b = mysqli_query($conn, "SELECT * FROM business_info");
$a = mysqli_fetch_assoc($b);

if (isset($_POST["submit"])) {
    // Retrieve user inputs
    $name = $_POST['name'];
    $mobile = $_POST['mobile'];
    $tagline = $_POST['tagline'];
    $openTime = $_POST['open'];
    $closeTime = $_POST['close'];
    $facebook = $_POST["facebook"];
    $instagram = $_POST["instagram"];


    if (!empty($name)) {
        $update_query = "UPDATE business_info SET b_name='$name'";
        $result = mysqli_query($conn, $update_query);
        echo "Business information [Name] updated successfully <br> Close This Page!";
    }else{
        echo "Business information [Name] NOT updated <br> Close This Page!";
    }

    
    if (!empty($mobile)) {
        $update_query = "UPDATE business_info SET mobile='$mobile'";
        $result = mysqli_query($conn, $update_query);
        echo "Business information [Mobile] updated successfully <br> Close This Page!";
    }else{
        echo "Business information [Mobile] NOT updated <br> Close This Page!";
    }
    
    if (!empty($tagline)) {
        $update_query = "UPDATE business_info SET tagline='$tagline'";
        $result = mysqli_query($conn, $update_query);
        echo "Business information [tagline] updated successfully <br> Close This Page!";
    }else{
        echo "Business information [tagline] NOT updated <br> Close This Page!";
    }
    
    if (!empty($openTime)) {
        $update_query = "UPDATE business_info SET openTime='$openTime'";
        $result = mysqli_query($conn, $update_query);
        echo "Business information [Open Time] updated successfully <br> Close This Page!";
    }else{
        echo "Business information [Open Time] NOT updated <br> Close This Page!";
    }

    if (!empty($closeTime)) {
        $update_query = "UPDATE business_info SET closeTime='$closeTime'";
        $result = mysqli_query($conn, $update_query);
        echo "Business information [Close Time] updated successfully <br> Close This Page!";
    }else{
        echo "Business information [Close Time] NOT updated <br> Close This Page!";
    }
    
    if (!empty($instagram)) {
        $update_query = "UPDATE business_info SET instagram='$instagram'";
        $result = mysqli_query($conn, $update_query);
        echo "Business information [instagram] updated successfully <br> Close This Page!";
    }else{
        echo "Business information [instagram] NOT updated <br> Close This Page!";
    }
    
    if (!empty($facebook)) {
        $update_query = "UPDATE business_info SET facebook='$facebook'";
        $result = mysqli_query($conn, $update_query);
        echo "Business information [Name] updated successfully <br> Close This Page!";
    }else{
        echo "Business information [Name] NOT updated <br> Close This Page!";
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
        <input type="text" id="name" name="name" value="<?php echo $b["b_name"]; ?>" required><br>

        <label for="mobile">Mobile</label>
        <input type="tel" id="mobile" name="mobile" value="<?php echo $b["mobile"]; ?>" required><br>

        <label for="tagline">Tagline</label>
        <textarea name="tagline" id="tagline" required value="<?php echo $b["tagline"]; ?>" cols="30" rows="10"></textarea><br>

        <label for="open">Open Time</label>
        <input type="text" id="open" name="open" value="<?php echo $b["openTime"]; ?>" required><br>

        <label for="close">Close Time</label>
        <input type="text" id="close" name="close" value="<?php echo $b["closeTime"]; ?>" required><br>

        <label for="open">Instagram</label>
        <input type="text" id="open" name="open" value="<?php echo $b["instagram"]; ?>" required><br>

        <label for="open">Facebook</label>
        <input type="text" id="open" name="open" value="<?php echo $b["facebook"]; ?>" required><br>

        <button type="submit" name="submit" id="submit">Update Business Info</button>
    </form>
    <br>
</body>

</html>