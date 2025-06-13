
<?php 

// mysql connection
$servername = 'localhost';
$username   = "root";
$password   = "";
$dbname     = 'products';
$is_connect = false;

$connection = mysqli_connect($servername, $username, $password, $dbname);

if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
} else {
    $is_connect = true;
}


// Get all data from form
$product_name       = $_POST['product_name'];
$product_price = $_POST['price'];
$product_description = $_POST['description'];
$created_at = date('Y-m-d H:i:s');
$cover_image_url = $_FILES['image'];

if( !empty( $cover_image_url ) ) {
    // Target directory to save uploaded images
    $targetDir = "uploads/";
    // Get original file name and create full path
    $fileName = basename($_FILES["image"]["name"]);
    $targetFile = $targetDir . $fileName;
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Check if file is an actual image
    $check = getimagesize($_FILES["image"]["tmp_name"]);
    if ($check === false) {
        die("File is not an image.");
    }

       // Check file size (e.g. 5MB max)
    if ($_FILES["image"]["size"] > 5 * 1024 * 1024) {
        die("File is too large.");
    }

    // Allow certain file formats
    $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'svg', 'webp', 'ico'];
    if (!in_array($imageFileType, $allowedTypes)) {
        die("Only JPG, JPEG, PNG & GIF files are allowed.");
    }
    
    // Move file to target directory
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        // echo "The file " . htmlspecialchars($fileName) . " has been uploaded.";
    }
}


if( $is_connect ) {
    $sql = "INSERT INTO `product`(`name`, `price`, `description`, `created_at`, `image`) VALUES ('$product_name', '$product_price', '$product_description', '$created_at', '$targetFile')";
    if( $connection->query($sql) === true ) {
        echo "New product added";
        header("Location: index.php");
        // $url = 'http://' . $_SERVER['HTTP_HOST'] . dirname($_SERVER['PHP_SELF']) . '/index.php';
        // echo '<script type="text/javascript">window.location.href="' . $url . '"</script>';
        exit;
    }else {
        print_r( $connection->error );
        die();
    }
}
?>