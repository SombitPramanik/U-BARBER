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
    $id = $_POST["id"];
    $up_id = strtoupper($id);
    $up_price = $_POST["price"];
    $file = $_FILES["new_img"];
    $fileName = $file["name"];
    $fileSize = $file["size"];
    $fileTmpName = $file["tmp_name"];
    $fileType = pathinfo($fileName, PATHINFO_EXTENSION);
    $allowedFileTypes = array("png", "jpeg", "jpg");

    $maxFileSize = 10 * 1024 * 1024;

    // Check if the file type is allowed
    if (!in_array(strtolower($fileType), $allowedFileTypes)) {
        echo "Error: Only .png .jpeg and .jpg files are allowed.";
    } elseif ($fileSize > $maxFileSize) {
        echo "Error: File size exceeds the maximum allowed size (10 MB).";
    } else {
        // Check for file upload errors
        if ($_FILES['new_img']['error'] !== UPLOAD_ERR_OK) {
            switch ($_FILES['new_img']['error']) {
                case UPLOAD_ERR_INI_SIZE:
                    echo "Error: The uploaded file exceeds the upload_max_filesize directive in php.ini.";
                    break;
                case UPLOAD_ERR_FORM_SIZE:
                    echo "Error: The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.";
                    break;
                case UPLOAD_ERR_PARTIAL:
                    echo "Error: The uploaded file was only partially uploaded.";
                    break;
                case UPLOAD_ERR_NO_FILE:
                    echo "Error: No file was uploaded.";
                    break;
                case UPLOAD_ERR_NO_TMP_DIR:
                    echo "Error: Missing a temporary folder. Check your PHP configuration.";
                    break;
                case UPLOAD_ERR_CANT_WRITE:
                    echo "Error: Failed to write file to disk. Check permissions.";
                    break;
                case UPLOAD_ERR_EXTENSION:
                    echo "Error: A PHP extension stopped the file upload.";
                    break;
                default:
                    echo "Error: Unknown error occurred during file upload.";
                    break;
            }
        } else {
            // Generate a unique file name based on username and file extension
            $uniqueFileName = $up_id . '.' . $fileType;

            // Construct the complete file path
            $filePath = $targetDirectory . $uniqueFileName;

            // Move the uploaded file to the target directory
            if (move_uploaded_file($fileTmpName, $filePath)) {
                echo "File uploaded successfully.";
                $query = "INSERT INTO order_id_price VALUES('$up_id','$up_price')";
                $success = mysqli_query($conn, $query);
                if ($success) {
                    // If the query was successful, show a success message
                    echo '<script>alert("Order ID & IMG Insert Successfully.");setTimeout(function() { window.close(); }, 800);</script>';
                } else {
                    // If there was an error with the query
                    echo 'Error: ' . mysqli_error($conn);
                }
            } else {
                echo "Error uploading file.";
            }
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
    <!-- Your head content here -->
</head>

<body>
    <form action="" method="POST" class="order_form" enctype="multipart/form-data">
        <h1>Insert a New Item in Catalog</h1><br>
        <label for="id">Add ID</label>
        <input type="text" name="id" id="id" required placeholder="Enter New Order ID"><br>
        <label for="price">Add Price</label>
        <input type="text" id="price" name="price" required placeholder="Enter New Price"><br>
        <label for="new_img">Add Image</label>
        <input type="file" id="new_img" name="new_img" accept=".png,.jpeg,.jpg" required><br>
        <button type="submit" name="submit" id="submit">Add New Item</button>
    </form>
    <br>
</body>

</html>
