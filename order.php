<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="language" content="en">
    <meta name="description" content="Welcome to U-BARBER, your destination for top-notch grooming and style services. Our skilled barbers are dedicated to helping you look and feel your best with precision haircuts, traditional shaves, and modern styling. Experience the art of barbering in a relaxed and comfortable atmosphere. Book your appointment today and elevate your style with U-BARBER.">
    <meta name="keywords" content="U-BARBER,online barber, barber, shoping, new website, barber shop,https://barber.sombti-server.online">
    <meta name="author" content="Sombit Pramanik">
    <meta property="og:title" content="U-BARBER">
    <meta property="og:description" content="Welcome to U-BARBER, your destination for top-notch grooming and style services. Our skilled barbers are dedicated to helping you look and feel your best with precision haircuts, traditional shaves, and modern styling. Experience the art of barbering in a relaxed and comfortable atmosphere. Book your appointment today and elevate your style with U-BARBER.">
    <meta property="og:image" content="./U-BARBER.png">
    <meta property="og:url" content="https://barber.sombti-server.online">
    <meta property="og:type" content="website">
    <link rel="icon" href="./U-BARBER.ico" type="image/x-icon">
    <title>Order Page</title>
</head>

<body>
    <h1>Order Form</h1>
    <form action="process_order.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" required><br>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>

        <label for="product">Product:</label>
        <input type="text" id="product" name="product" required><br>

        <input type="submit" value="Submit">
    </form>
</body>

</html>