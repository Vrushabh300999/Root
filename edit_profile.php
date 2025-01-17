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
    if (isset($_FILES['uplodfile']['name']) && $_FILES['uplodfile']['name'] != "") {
        $images = basename($_FILES['uplodfile']['name']);
        $tmp_name = $_FILES['uplodfile']['tmp_name'];
        $uploadfolder = "images/";

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
            header("Location:profile.php");
            exit;
        }
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
} else {
    header("Location:profile.php");
    exit;
}

$title = "Edit Profile";
include("public/header.php");
?>
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
                        <input type="text" name="name" value="<?php echo $name; ?>" class="form-control"
                            placeholder="Enter your Name">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Email</label>
                        <input type="email" class="form-control" value="<?php echo $email; ?>" name="email"
                            placeholder="Enter your Email">
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Mobile_no</label>
                        <input type="number" class="form-control" value="<?php echo $mobile_no; ?>" name="mobile_no"
                            placeholder="Enter your Number">
                    </div>
                    <label for="exampleFormControlInput1" class="form-label">Gender</label>
                    <div class="form-check mb-3 ml-4">

                        <input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="Male"
                            <?php
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
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Image</label>
                        <input type="file" name="uplodfile" id="uplodfile" value="" accept="images/*" />
                        <input type="hidden" name="image" id="image" value="<?php echo $images; ?>" />
                        <?php
                        if ($images) {
                            echo "<br /><img height='100' src='" . "images/" . $images . "'/>";
                        }
                        ?>
                    </div>
                    <input class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 mt-5 pointer"
                        type="submit" name="btn_submit" id="btn_submit" value="Submit" />
                    <input class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 mt-4 pointer"
                        type="button" name="cancel" id="cancel" value="Cancel"
                        onClick="document.location.href = 'profile.php'" />
                </form>
            </div>
        </div>
    </div>
</section>

<?php
include("public/footer.php");
?>