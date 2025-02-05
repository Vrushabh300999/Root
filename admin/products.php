<?php
include("./../config/connection.php");
$sql = "SELECT tbl_products.*, tbl_category.name as category_name FROM tbl_products ";
$sql .= "INNER JOIN tbl_category ON tbl_products.category_id = tbl_category.id ";
$sql .= "ORDER BY id DESC";
$statement = $db->prepare($sql);
$statement->execute();

$title = "Products";
include("public/header.php");
include("public/sidebar.php");
?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Tables</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Products</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Products</h5>
            <p>
              <a href="add_product.php">
                <i class="bi bi-archive"></i>&nbsp;<span>Add Product</span>
              </a>
            </p>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th width="25%">Name</th>
                  <th width="10%">Image</th>
                  <th width="10%">Price</th>
                  <th width="20%">Category</th>
                  <th width="20%">Date</th>
                  <th width="10%">Action</th>
                </tr>
              </thead>
              <tbody>
                <?php
                if ($statement->rowCount() > 0) {
                  while ($data = $statement->fetch(PDO::FETCH_OBJ)) {
                    ?>
                    <tr>
                      <td><?php echo $data->name; ?></td>
                      <td><img src="../images/<?php echo $data->image; ?>" width="100%" alt="" srcset=""></td>
                      <td><?php echo $data->price; ?></td>
                      <td><?php echo $data->category_name; ?></td>
                      <td><?php echo date('jS M Y', strtotime($data->created_date)); ?></td>
                      <td>
                        <a href="edit_product.php?product_id=<?php echo $data->id; ?>">Edit</a>
                        <a href="delete_product.php?product_id=<?php echo $data->id; ?>"
                          onclick="return confirm('Are you sure you want to delete?')">Delete</a>
                      </td>
                    </tr>
                    <?php
                  }
                }
                ?>
              </tbody>
            </table>
            <!-- End Table with stripped rows -->

          </div>
        </div>

      </div>
    </div>
  </section>

</main><!-- End #main -->

<?php include('public/footer.php'); ?>