
<?php

require_once './config.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;

if (!$is_connect) {
    die("Database connection failed.");
}

// First, check current status of the product
$sql = "SELECT status FROM product WHERE id = $id";
$result = mysqli_query($connection, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $product = mysqli_fetch_assoc($result);
    
    if ($product['status'] == 1) {
        // Soft delete: move to trash
        $sql = "UPDATE product SET status = 0 WHERE id = $id";
        if ($connection->query($sql) === true) {
            header("Location: index.php?message=trashed");
            exit;
        } else {
            echo "Error trashing product: " . $connection->error;
        }
    } else {
        // Permanent delete
        $sql = "DELETE FROM product WHERE id = $id";
        if ($connection->query($sql) === true) {
            header("Location: trash.php?message=deleted");
            exit;
        } else {
            echo "Error deleting product: " . $connection->error;
        }
    }
} else {
    echo "product not found.";
}
?>