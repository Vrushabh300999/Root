<?php
include("./../config/connection.php");
$sql = "SELECT * FROM tbl_banner ";
$sql .= "ORDER BY id DESC";
$statement = $db->prepare($sql);
$statement->execute();

$title = "Manage Banners";
include("public/header.php");
include("public/sidebar.php");
?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Data Tables</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">Banners</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section">
    <div class="row">
      <div class="col-lg-12">

        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Banners</h5>
            <p>
              <a href="add_banner.php">
                <i class="bi bi-archive"></i>&nbsp;<span>Add Banner</span>
              </a>
            </p>

            <!-- Table with stripped rows -->
            <table class="table datatable">
              <thead>
                <tr>
                  <th width="25%">Name</th>
                  <th width="10%">Image</th>
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
                      <td><?php echo date('jS M Y', strtotime($data->created_date)); ?></td>
                      <td>
                        <a href="edit_banner.php?banner_id=<?php echo $data->id; ?>">Edit</a>
                        <a href="delete_banner.php?banner_id=<?php echo $data->id; ?>"
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