<?php
include("./../config/connection.php");
if (isset($_REQUEST['id'])) {
  $id = $_REQUEST['id'];
} else {
  header("Location:index.php");
  exit;
}

if (isset($_POST['btn_submit'])) {
  $name = $_POST['name'];
  $gender = $_POST['gender'];
  $email = $_POST['email'];
  $mobile_no = $_POST['mobile_no'];
  if (isset($_FILES['uplodfile']['name']) && $_FILES['uplodfile']['name'] != "") {
    $images = basename($_FILES['uplodfile']['name']);
    $tmp_name = $_FILES['uplodfile']['tmp_name'];
    $uploadfolder = "../images/";

    move_uploaded_file($tmp_name, $uploadfolder . $images);
  } else {
    $images = $_POST['image'];
  }

  $query = "SELECT * FROM tbl_user 
          WHERE id!='0' 
          AND id!='$id'
          AND email='$email' ";
  $result = $db->prepare($query);
  $result->execute();
  $total = $result->rowcount();
  if ($total > 0) {
    echo 'Already Registered';
  } else {
    $query = "UPDATE tbl_user SET 
              name='$name',
              gender='$gender',
              email='$email',
              mobile_no='$mobile_no',
              images='$images'
              WHERE id='$id'";
    $result = $db->prepare($query);
    $result->execute();
    $total = $result->rowcount();

    if ($total > 0) {
      $_SESSION['adminname'] = $name;
      $_SESSION['id'] = $id;
      $_SESSION['email'] = $email;
      $_SESSION['image'] = $images;
      header("Location:users-profile.php?id=$id");
      exit;
    }
  }
}

if (isset($_POST['change'])) {
  $current_password = $_POST['current_password'];
  $new_password = $_POST['new_password'];
  $re_new_password = $_POST['re_new_password'];

  if ($password == $current_password) {
    if ($new_password == $re_new_password) {
      $query = "UPDATE tbl_user SET 
                  password ='$new_password' 
                  WHERE id='$id' ";
      $result = $db->prepare($query);
      $result->execute();
      $total = $result->rowcount();
      if ($total > 0) {
        header("Location:users-profile.php");
        exit;
      }
    } else {
      header("Location:users-profile.php?id=$id&message=New password are not match");
      exit;
    }
  } else {
    header("Location:users-profile.php?id=$id&message=Current password are not match");
    exit;
  }
}

$sql = "SELECT * FROM tbl_user WHERE id = $id";
$result = $db->prepare($sql);
$result->execute();
$total = $result->rowcount();
if ($total > 0) {
  $rows = $result->fetch(PDO::FETCH_OBJ);

  $id = $rows->id;
  $name = $rows->name;
  $gender = $rows->gender;
  $email = $rows->email;
  $mobile_no = $rows->mobile_no;
  $images = $rows->images;
  $password = $rows->password;
} else {
  header("Location:users-profile.php?id=$id");
  exit;
}

$title = "Profile";
include("public/header.php");
include("public/sidebar.php");
?>

<main id="main" class="main">

  <div class="pagetitle">
    <h1>Profile</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item">Users</li>
        <li class="breadcrumb-item active">Profile</li>
      </ol>
    </nav>
  </div><!-- End Page Title -->

  <section class="section profile">
    <div class="row">
      <div class="col-xl-4">

        <div class="card">
          <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">

            <img src="../images/<?php echo $images; ?>" width="200px" height="200px" alt="Profile"
              class="rounded-circle" style="max-width: 200px;">
            <h2><?php echo $name; ?></h2>
            <!-- <div class="social-links mt-2">
              <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
              <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
              <a href="#" class="instagram"><i class="bi bi-instagram"></i></a>
              <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></a>
            </div> -->
          </div>
        </div>

      </div>

      <div class="col-xl-8">

        <div class="card">
          <div class="card-body pt-3">
            <!-- Bordered Tabs -->
            <ul class="nav nav-tabs nav-tabs-bordered">
              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab"
                  data-bs-target="#profile-overview">Overview</button>
              </li>
              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-edit">Edit Profile</button>
              </li>
              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#profile-change-password">Change
                  Password</button>
              </li>
            </ul>
            <div class="tab-content pt-2">
              <div class="tab-pane fade show active profile-overview" id="profile-overview">
                <h5 class="card-title">Profile Details</h5>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label ">Full Name</div>
                  <div class="col-lg-9 col-md-8"><?php echo $name; ?></div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Gender</div>
                  <div class="col-lg-9 col-md-8"><?php echo $gender; ?></div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Email</div>
                  <div class="col-lg-9 col-md-8"><?php echo $gender; ?></div>
                </div>
                <div class="row">
                  <div class="col-lg-3 col-md-4 label">Phone</div>
                  <div class="col-lg-9 col-md-8"><?php echo $mobile_no; ?></div>
                </div>
              </div>

              <div class="tab-pane fade profile-edit pt-3" id="profile-edit">
                <!-- Profile Edit Form -->
                <form method="post" enctype="multipart/form-data">
                  <div class="row mb-3">
                    <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                    <div class="col-md-8 col-lg-9">
                      <img src="../images/<?php echo $images; ?>" alt="Profile">
                      <div class="pt-2">
                        <input type="file" name="uplodfile" id="uplodfile" value="" accept="images/*" />
                        <input type="hidden" name="image" id="image" value="<?php echo $images; ?>" />
                      </div>
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Full Name</label>
                    <div class="col-md-8 col-lg-9">
                      <input type="text" name="name" value="<?php echo $name; ?>" class="form-control"
                        placeholder="Enter your Name">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="about" class="col-md-4 col-lg-3 col-form-label">Email</label>
                    <div class="col-md-8 col-lg-9">
                      <input type="email" class="form-control" value="<?php echo $email; ?>" name="email"
                        placeholder="Enter your Email">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="company" class="col-md-4 col-lg-3 col-form-label">Mobile_no</label>
                    <div class="col-md-8 col-lg-9">
                      <input type="number" class="form-control" value="<?php echo $mobile_no; ?>" name="mobile_no"
                        placeholder="Enter your Number">
                    </div>
                  </div>

                  <div class="row mb-3">
                    <label for="Job" class="col-md-4 col-lg-3 col-form-label">Gender</label>
                    <div class="col-md-8 col-lg-9">
                      <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="Male" <?php
                      if ($gender == "Male") {
                        echo 'checked';
                      } ?>>
                      <label class="form-check-label" for="exampleRadios1">Male</label>

                      <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="Female" <?php
                      if ($gender == "Female") {
                        echo 'checked';
                      } ?>>
                      <label class="form-check-label" for="exampleRadios2">Female</label>
                    </div>
                  </div>
                  <!-- <div class="row mb-3">
                    <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter Profile</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="twitter" type="text" class="form-control" id="Twitter" value="https://twitter.com/#">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook Profile</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="facebook" type="text" class="form-control" id="Facebook"
                        value="https://facebook.com/#">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram Profile</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="instagram" type="text" class="form-control" id="Instagram"
                        value="https://instagram.com/#">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin Profile</label>
                    <div class="col-md-8 col-lg-9">
                      <input name="linkedin" type="text" class="form-control" id="Linkedin"
                        value="https://linkedin.com/#">
                    </div>
                  </div> -->
                  <div class="text-center">
                    <button type="submit" name="btn_submit" id="btn_submit" class="btn btn-primary">Save
                      Changes</button>
                  </div>
                </form><!-- End Profile Edit Form -->
              </div>

              <div class="tab-pane fade pt-3" id="profile-change-password">
                <!-- Change Password Form -->
                <form method="post" enctype="multipart/form-data">
                  <div>
                    <?php
                    if (isset($_REQUEST['message'])) {
                      ?>
                      <script>
                        alert("<?php echo $_REQUEST['message']; ?>");
                      </script>
                      <?php
                    }
                    ?>
                  </div>
                  <div class="row mb-3">
                    <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input type="password" name="current_password" id="current_password" class="form-control" value=""
                        autofocus required />
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input type="password" name="new_password" id="new_password" class="form-control" value=""
                        required />
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter New Password</label>
                    <div class="col-md-8 col-lg-9">
                      <input type="password" name="re_new_password" id="re_new_password" class="form-control" value=""
                        required />
                    </div>
                  </div>
                  <div class="text-center">
                    <button type="submit" name="change" id="change" class="btn btn-primary">Change Password</button>
                  </div>
                </form><!-- End Change Password Form -->
              </div>
            </div><!-- End Bordered Tabs -->
          </div>
        </div>
      </div>
    </div>
  </section>

</main><!-- End #main -->

<?php include('public/footer.php'); ?>