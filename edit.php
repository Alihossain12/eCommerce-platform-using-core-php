<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    require_once  'config.php';
    include_once  './includes/head.php';
    ?>
    <?php 
        $id = $_GET['id'];
        $sql = "SELECT * from product WHERE id = $id";
        $result = mysqli_query($connection, $sql);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        $product = $data[0];
    ?>
    <!-- <?php
        $sql    = "SELECT * FROM `categories`";
        $result = mysqli_query($connection, $sql);
        $categories   = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?> -->

</head>
<body class="bg-light">
  <div class="container py-5">
    <h2 class="mb-4">Edit New Product</h2>
    <form action="update.php" method="POST" class="bg-white p-4 rounded shadow-sm">
      <div class="row g-3">
        <input type="hidden" name="id" value="<?php echo $product['id'] ?>">
        <div class="col-md-6">
            <label class="form-label">Product Name</label>
            <input name="name" value="<?php echo $product['name'] ?>" type="text" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Description</label>
            <input name="description" value="<?php echo $product['description'] ?>" type="text" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Price</label>
            <input name="price" value="<?php echo $product['price'] ?>" type="number" class="form-control" required>
        </div>

        <div class="col-md-6">
            <label class="form-label">Image</label>
            <input name="image" value="<?php echo $product['image'] ?>" type="text" class="form-control" required>
        </div>

               <div class="col-md-6">
            <label class="form-label">created_at</label>
            <input name="created_at" value="<?php echo $product['created_at'] ?>" type="number" class="form-control" required>
        </div>




      </div>
      <div class="mt-4">
        <button type="submit" class="btn btn-success">Save Product</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
  </div>
  
</body>
</html>