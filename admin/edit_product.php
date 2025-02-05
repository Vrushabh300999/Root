<?php
include("./../config/connection.php");
if (isset($_REQUEST['product_id'])) {
  $product_id = $_REQUEST['product_id'];
} else {
  header("Location:products.php");
  exit;
}

if (isset($_POST['submit'])) {

  // Variable Declaration
  $name = strip_tags($_POST['name']);
  $category_id = strip_tags($_POST['category_id']);
  $description = strip_tags($_POST['description']);
  $price = strip_tags($_POST['price']);

  if ($_FILES['image']['name']) {
    $filename = imguplode("../images/", $_FILES['image']);
  } else {
    $filename = $_POST['image'];
  }

  if (!empty($filename)) {
    $sql = "UPDATE tbl_products SET 
            name='$name',
            category_id='$category_id',
            image='$filename',
            description='$description',
            price='$price'
            WHERE id='$product_id'";
    $result = $db->prepare($sql);
    $result->execute();
    $total = $result->rowcount();
    if ($total > 0) {
      echo '<script>alert("Data successfully Updated");</script>';
      header("location:products.php");
      exit;
    }
  }
}

$query = "SELECT * FROM tbl_products WHERE id='$product_id'";
$result = $db->prepare($query);
$result->execute();
$total = $result->rowcount();
if ($total > 0) {
  $data = $result->fetch(PDO::FETCH_OBJ);

  $product_id = $data->id;
  $name = $data->name;
  $category_id = $data->category_id;
  $image = $data->image;
  $description = $data->description;
  $price = $data->price;
  $created_date = $data->created_date;
} else {
  header("Location:products.php");
  exit;
}

$title = "Edit Product";
include("public/header.php");
include("public/sidebar.php");
?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Edit Product</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="products.php">Products</a></li>
        <li class="breadcrumb-item active">Edit Product</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <!-- Left side columns -->
      <div class="col-lg-10 mx-auto">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edit Product</h5>
            <!-- Floating Labels Form -->
            <form class="row g-3" action="#" method="POST" enctype="multipart/form-data">
              <div class="col-md-12">
                <div class="form-floating">
                  <input type="text" name="name" class="form-control" id="floatingName" placeholder="Product Name"
                    value="<?php echo $name; ?>" required>
                  <label for="floatingName">Product Name</label>
                </div>
              </div>
              <div class="col-md-12">
                <div class="form-floating">
                  <?php
                  $query_category = "SELECT * FROM tbl_category 
                                    ORDER BY id ASC";
                  $result_category = $db->prepare($query_category);
                  $result_category->execute();
                  $total_category = $result_category->rowcount();
                  ?>
                  <select name="category_id" class="form-control" id="floatingCategory">
                    <option value="">Select Category</option>
                    <?php
                    if ($total_category > 0) {
                      while ($rows = $result_category->fetch(PDO::FETCH_OBJ)) {
                        $cat_name = $rows->name;
                        $cat_id = $rows->id;
                        ?>
                        <option value="<?php echo $cat_id; ?>" <?php
                           if ($cat_id == $category_id) {
                             echo "selected";
                           }
                           ?>>
                          <?php echo $cat_name; ?>
                        </option>
                        <?php
                      }
                    }
                    ?>
                  </select>
                  <label for="floatingName">Product Category</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating">
                  <textarea class="form-control" name="description" placeholder="Description" id="floatingTextarea"
                    style="height: 100px;"><?php echo $description; ?></textarea>
                  <label for="floatingTextarea">Product Description</label>
                </div>
              </div>
              <div class="col-md-12">
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" name="price" class="form-control" id="floatingPrice" placeholder="Price"
                      value="<?php echo $price; ?>" required>
                    <label for="floatingPrice">Product Price</label>
                  </div>
                </div>
              </div>
              <div class="col-md-12">
                <div class="col-md-12">
                  <label for="floatingImage">Image</label>
                  <input type="file" name="image" class="form-control" id="floatingImage" placeholder="Image"
                    accept="image/*">
                  <input type="hidden" name="image" id="image" value="<?php echo $image; ?>" accept="image/*" />
                  <?php
                  if ($image) {
                    echo "<br/><img height='100' src='" . "../images/" . $image . "'/>";
                  }
                  ?>
                </div>
              </div>
              <div class="text-center">
                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
              </div>
            </form><!-- End floating Labels Form -->
          </div>
        </div>
      </div><!-- End Left side columns -->

      <!-- Right side columns -->


    </div>
  </section>

</main><!-- End #main -->

<?php include('public/footer.php'); ?>