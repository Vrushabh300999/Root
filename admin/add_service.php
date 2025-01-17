<?php
include("public/header.php");
include("public/sidebar.php");

if (isset($_POST['submit'])) {


  // Variable Declaration
  $service_title = strip_tags($_POST['service_title']);

  $service_description = strip_tags($_POST['service_description']);

  $service_icon = strip_tags($_POST['service_icon']);

  $filename = $_FILES['featureimage']['name'];
  $file_tmp = $_FILES['featureimage']['tmp_name'];
  $folder = "upload_services/";


  if (!empty($filename)) {
    if (move_uploaded_file($file_tmp, $folder . $filename)) {
      $sql = "INSERT INTO `tbl_services`
               (
                  service_title,
                  feature_image,
                  service_description,
                  service_icon
               )
               VALUES
               (
                  ?,?,?,?
               )";
      $result = $db->prepare($sql);
      $result->execute(array(
        $service_title,
        $filename,
        $service_description,
        $service_icon
      ));
      if ($result == true) {
        echo '<script>alert("Data successfully Inserted");</script>';
        header("Location:add_service.php");
      }
    }
  }



}
?>
<main id="main" class="main">

  <div class="pagetitle">
    <h1>NEW SERVICES</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item active">ADD SERVICES</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section dashboard">
    <div class="row">
      <!-- Left side columns -->
      <div class="col-lg-6 mx-auto">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Add New Service Form</h5>
            <!-- Floating Labels Form -->
            <form class="row g-3" action="#" method="POST" enctype="multipart/form-data">
              <div class="col-md-12">
                <div class="form-floating">
                  <input type="text" name="service_title" class="form-control" id="floatingName"
                    placeholder="Your Name">
                  <label for="floatingName">Service Title:</label>
                </div>
              </div>

              <div class="col-12">
                <div class="form-floating">
                  <textarea class="form-control" name="service_description" placeholder="Address" id="floatingTextarea"
                    style="height: 100px;"></textarea>
                  <label for="floatingTextarea">Service Description</label>
                </div>
              </div>

              <div class="col-md-12">
                <div class="col-md-12">
                  <div class="form-floating">
                    <input type="text" name="service_icon" class="form-control" id="floatingCity" placeholder="City">
                    <label for="floatingCity">Add Bootstrap Service Icon Code</label>
                  </div>
                </div>
              </div>


              <div class="col-md-12">
                <div class="col-md-12">
                  <label for="floatingCity">Choose Feature Image</label>
                  <input type="file" name="featureimage" class="form-control" id="floatingCity" placeholder="City">

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