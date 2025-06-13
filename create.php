
<!DOCTYPE html>
<html lang="en">
<head>
   <?php
    require_once  './config.php';
    include_once  './includes/head.php';
    ?>

    <?php
        $sql    = "SELECT * FROM `categories`";
        $result = mysqli_query($connection, $sql);
        $data   = mysqli_fetch_all($result, MYSQLI_ASSOC);
    ?>
</head>
<body class="bg-light">
  <div class="container py-5">
    <h2 class="mb-4">Add New product</h2>
    <form action="add.php" method="POST" class="bg-white p-4 rounded shadow-sm" enctype="multipart/form-data">
      <div class="row g-3">
        <div class="col-md-6">
            <label class="form-label">product Name</label>
            <input name="product_name" type="text" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Description</label>
            <input name="description" type="text" class="form-control" required>
        </div>
        <div class="col-md-6">
            <label class="form-label">Price</label>
            <input name="price" type="text" class="form-control" required>
        </div>

                <div class="col-md-6">
            <label class="form-label">created_at</label>
            <input name="created_at" type="text" class="form-control">
        </div>

               <div class="col-12">
            <label class="form-label">Cover Image</label>
            <input name="image" type="file" class="form-control">
        </div>
      </div>
      <div class="mt-4">
        <button type="submit" class="btn btn-success">Save Product</button>
        <a href="index.php" class="btn btn-secondary">Cancel</a>
      </div>
    </form>
  </div>
  <?php include_once  'includes/footer.php'; ?>
</body>
</html>