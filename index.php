
<!DOCTYPE html>
<html lang="en">
<head>
    <?php


    require_once  './config.php';
    include_once  './includes/head.php';
    ?>
    
    <?php
        $sql = "SELECT * FROM `product` WHERE status != 0";
        // $sql    = "SELECT product.*, categories.name AS category_name FROM `product` JOIN categories ON product.category = categories.id  WHERE status != 0";
        //$sql = "SELECT * FROM `product`";
        $result = mysqli_query($connection, $sql);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);

        
    ?>
</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
      <h1 class="h3">📚 Products</h1>
      <div class="action-btn">
        <a href="create.php" class="btn btn-primary">+ Add New Products</a>
        <!-- <a href="add_category.php" class="btn btn-danger">Add Category</a> -->
        <a href="trash.php" class="btn btn-danger"> Trash </a>
        <a href="index.php" class="btn btn-primary"> All Products</a>
      </div>
      
    </div>
    <table class="table table-hover table-bordered bg-white shadow-sm">
      <thead class="table-light">
        <tr>
            <th>ID</th>
            <th>Products_Name</th>
            <th>Description </th>
            <th>Price </th>
            <th>created_at</th>
            <th>Images</th>
            <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php
             if ( count( $data ) > 0) {
                // Output data of each row
                foreach( $data as $row ) {
                    ?>
                        <tr>
                            <td><?php echo $row['id'] ?></td>
                            <td><?php echo $row['name'] ?></td>
                            <td><?php echo $row['description'] ?></td>
                            <td><?php echo $row['price'] ?></td>                          
                            <td><?php echo $row['created_at'] ?></td>
                             <td><?php echo $row['image'] ?></td>
                            
                            <td>
                                <a href="view.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-info">View</a>
                                <a href="edit.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-warning">Edit</a>
                                <a href="delete.php?id=<?php echo $row['id'] ?>" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    <?php 
                }
            } else {
                echo "0 results found";
            }
        ?>
      </tbody>
    </table>
  </div>
</body>
</html>
