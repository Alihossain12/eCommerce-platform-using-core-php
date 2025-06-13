
<?php 

   
  
    require_once  './config.php';
    
    
 
// Get all data from form
$id              = $_POST['id'];
$product_name       = $_POST['name'];
$product_price = $_POST['price'];
$product_description = $_POST['description'];
$cover_image_url = $_FILES['image'];

if( $is_connect ) {
    $sql = "UPDATE product 
    SET name = '$name', price = '$price',  description = '$description', image = '$cover_image_url' WHERE id = $id";
    if( $connection->query($sql) === true ) {
        echo "Book Updated Successfully";
        header("Location: index.php");
    }else {
        print_r( $connection->error );
        die();
    }
}


if( $is_connect ) {
    $sql = "INSERT INTO `product`(`name`, `price`, `description`, `created_at`, `image`) VALUES ('$product_name', '$product_price', '$product_description', '$created_at', '$targetFile')";
    if( $connection->query($sql) === true ) {
        echo "New product added";
        header("Location: index.php");
        exit;
    }else {
        print_r( $connection->error );
        die();
    }
}