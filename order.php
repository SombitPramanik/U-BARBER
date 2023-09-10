<!DOCTYPE html>
<html>
<head>
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
