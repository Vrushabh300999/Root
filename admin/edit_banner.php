<?php
include("./../config/connection.php");
if (isset($_REQUEST['banner_id'])) {
  $banner_id = $_REQUEST['banner_id'];
} else {
  header("Location:banners.php");
  exit;
}

if (isset($_POST['submit'])) {

  // Variable Declaration
  $name = strip_tags($_POST['name']);
  $description = strip_tags($_POST['description']);

  if ($_FILES['image']['name']) {
    $filename = imguplode("../images/", $_FILES['image']);
  } else {
    $filename = $_POST['image'];
  }

  // if (!empty($filename)) {
  $sql = "UPDATE tbl_banner SET 
            name='$name',
            image='$filename',
            description='$description'
            WHERE id='$banner_id'";
  $result = $db->prepare($sql);
  $result->execute();
  $total = $result->rowcount();
  if ($total > 0) {
    echo '<script>alert("Data successfully Updated");</script>';
    header("location:banners.php");
    exit;
  }
  // }
}

$query = "SELECT * FROM tbl_banner WHERE id='$banner_id'";
$result = $db->prepare($query);
$result->execute();
$total = $result->rowcount();
if ($total > 0) {
  $data = $result->fetch(PDO::FETCH_OBJ);

  $banner_id = $data->id;
  $name = $data->name;
  $image = $data->image;
  $description = $data->description;
  $created_date = $data->created_date;
} else {
  header("Location:banners.php");
  exit;
}

$title = "Edit Banner";
include("public/header.php");
include("public/sidebar.php");
?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>Edit Banner</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="banners.php">Banners</a></li>
        <li class="breadcrumb-item active">Edit Banner</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <!-- Left side columns -->
      <div class="col-lg-10 mx-auto">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Edit Banner</h5>
            <!-- Floating Labels Form -->
            <form class="row g-3" action="#" method="POST" enctype="multipart/form-data">
              <div class="col-md-12">
                <div class="form-floating">
                  <input type="text" name="name" class="form-control" id="floatingName" placeholder="Banner Name"
                    value="<?php echo $name; ?>">
                  <label for="floatingName">Banner Name</label>
                </div>
              </div>
              <div class="col-12">
                <div class="form-floating">
                  <textarea class="form-control" name="description" placeholder="Description" id="floatingTextarea"
                    style="height: 100px;"><?php echo $description; ?></textarea>
                  <label for="floatingTextarea">Banner Description</label>
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