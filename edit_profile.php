<?php
include("config/connection.php");
if (isset($_REQUEST['id'])) {
    $id = $_REQUEST['id'];
} else {
    header("Location:login.php");
    exit;
}

if (isset($_POST['btn_submit'])) {
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $mobile_no = $_POST['mobile_no'];
    if ($_FILES['uplodfile']['name']) {
        $images = move_uploaded_file("images/", $_FILES['images']);
    } else {
        $images = $_POST['uplodfile'];
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
            header("Location:profile.php");
            exit;
        }
    }
}

$query = "SELECT * FROM tbl_user";  
$result = $db->prepare($query);
$result->execute();
$total = $result->rowcount();
if ($total > 0) {
    $rows = $result->fetch(PDO::FETCH_OBJ);

    $id = $rows->id;
    $name = $rows->name;
    $gender = $rows->gender;
    $email = $rows->email;
    $mobile_no  = $rows->mobile_no ;
    $images = $rows->images;
    // $is_delete = $rows->is_delete;
    // $created_by = $rows->created_by;
    // $created_date = $rows->created_date;
    // $updated_by = $rows->updated_by;
    // $updated_date = $rows->updated_date;
} else {
    header("Location:manage_user.php");
    exit;
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Edit User</title>
    <script src="js/function.js"></script>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.png" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/linearicons-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/slick/slick.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/MagnificPopup/magnific-popup.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="vendor/perfect-scrollbar/perfect-scrollbar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="css/util.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
   
</head>

<body>
   <!--  <form method="POST" action="" name="user_form" enctype="multipart/form-data">
        <table border="1" width="60%" align="center" cellpadding="5" cellspacing="0">
            <tr>
                <td colspan="2" align="center">Edit User (*Required Fields)</td>
            </tr>
            <tr>
                <td><label>Name*</label></td>
                <td><input type="text" name="name" id="name" value="<?php echo $name; ?>" required autofocus /></td>
            </tr>
            <tr>
                <td><label>Gender*</label></td>
                <td>
                    Male<input type="radio" name="gender" id="gender" value="Male" checked required <?php
                    if ($gender == "Male") {
                        echo 'checked';
                    }
                    ?> />
                    Female<input type="radio" name="gender" id="gender" value="Female" required <?php
                    if ($gender == "Female") {
                        echo 'checked';
                    }
                    ?> />
                </td>
            </tr>
            <tr>
                <td><label>Email*</label></td>
                <td><input type="email" name="email" id="email" value="<?php echo $email; ?>" required /></td>
            </tr>
            <tr>
                <td><label>Password*</label></td>
                <td>
                    <input type="password" name="password" id="password" value="<?php echo $password; ?>" required />
                </td>
            </tr>
            <tr>
                <td><label>moblie no</label></td>
                <td><input type="number" name="mobile_no" id="mobile_no" value="<?php echo $mobile_no; ?>" /></td>
            </tr>
            <tr>
                <td><label>Image</label></td>
                <td>
                    <input type="file" name="images" id="images" value="" accept="images/*" />
                    <input type="hidden" name="images" id="images" value="<?php echo $images; ?>" accept="images/*" />
                    <?php
                    if ($images) {
                        echo "<br /><img height='100' src='" . "images/" . $images . "'/>";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="submit" id="submit" value="Submit" />
                    <input type="button" name="cancel" id="cancel" value="Cancel"
                        onClick="document.location.href = 'profile.php'" />
                </td>
            </tr>
        </table>
    </form>
 -->
<section class="bg0 p-t-55 p-b-116">
    <?php
    if (isset($info)) {
        echo $info;
    }
    if (isset($alrt)) {
        echo $alrt;
    }
    ?>
    <div class="container">
        <div class="flex-w flex-tr">
            <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md" style="margin: auto;">
                <form method="post" enctype="multipart/form-data">
                    <h4 class="mtext-105 cl2 txt-center p-b-30">Update Data</h4>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Name</label>
                        <input type="text" name="name" value="<?php echo $name; ?>" class="form-control" placeholder="Enter your Name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" class="form-control" value="<?php echo $email; ?>" name="email" placeholder="Enter your Email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Mobile_no</label>
                        <input type="number" class="form-control" value="<?php echo $mobile_no; ?>" name="mobile_no" placeholder="Enter your Number">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Images</label>
                        <input type="file" class="form-control" value="<?php echo $images; ?>" name="uplodfile" id="exampleFormControlInput1">
                        <?php
                    if ($images) {
                        echo "<br /><img height='100' src='" . "images/" . $images . "'/>";
                    }
                    ?>
                    </div>
                    <label for="exampleFormControlInput1" class="form-label">Gender</label>
                    <div class="form-check mb-3 ml-4">

                    <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="Male" <?php
                            if ($gender == "Male") {
                            echo 'checked';
                             }?>>
                        <label class="form-check-label" for="exampleRadios1">Male</label>

                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="Female" <?php
                                 if ($gender == "Female") {
                                 echo 'checked';
                                    } ?>>
                        <label class="form-check-label" for="exampleRadios2">Female</label>
                    </div>
                    <button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer"
                        name="btn_submit">
                        Submit
                    </button>
                </form>
            </div>
        </div>
    </div>
</section>
</body>

</html>