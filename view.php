<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    require_once  './config.php';
    include_once  './includes/head.php';
    ?>
    <?php 
        $id     = $_GET['id'];
        $sql    = "SELECT * FROM `product` WHERE id = $id";
        $result = mysqli_query($connection, $sql);
        $data   = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $product   = $data[0];
        
    ?>
</head>
<body class="bg-light">
  <div class="container py-5">
    <div class="card p-4 shadow-sm">
      <div class="row">
        <div class="col-md-4">
          <img src="<?php echo $product['image']; ?>" alt="image" width="100%">
        </div>
        <div class="col-md-8">
          <h3><?php echo $product['name'] ?></h3>
          <p><strong>Description:</strong> <?php echo $product['description'] ?></p>
          <p><strong>Price:</strong> <?php echo $product['price'] ?></p>
          <p><strong>created_at:</strong> <?php echo $product['created_at'] ?></p>

          <a href="/" class="btn btn-secondary mt-3">← Back to Product List</a>
        </div>
      </div>
    </div>
  </div>
</body>
</html>