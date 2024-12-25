<?php
include("config/connection.php");

if (empty($_SESSION['id'])) {
    header("Location:login.php");
    exit;
} else {
    $id = $_SESSION['id'];
}
$query = "SELECT * FROM tbl_user 
        WHERE id!='0' 
        AND id='$id' ";
$result = $db->prepare($query);
$result->execute();
$total = $result->rowcount();
if ($total > 0) {
    $rows = $result->fetch(PDO::FETCH_OBJ);
    $password = $rows->password;
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
                header("Location:profile.php");
                exit;
            }
        } else {
            header("Location:change_password.php?message=New password are not match");
            exit;
        }
    } else {
        header("Location:change_password.php?message=Current password are not match");
        exit;
    }
}
$title = "Change Password";
include("public/header.php");
?>
<section class="bg0 p-t-55 p-b-116">
    <div>
        <?php
        if (isset($_REQUEST['message'])) {
            echo $_REQUEST['message'];
        }
        ?>
    </div>
    <div class="container">
        <div class="flex-w flex-tr">
            <div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md" style="margin: auto;">
                <form method="post" enctype="multipart/form-data">
                    <h4 class="mtext-105 cl2 txt-center p-b-30">Change Password</h4>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Current Password*</label>
                        <input type="password" name="current_password" id="current_password" class="form-control"
                            value="" autofocus required />
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">New Password*</label>
                        <input type="password" name="new_password" id="new_password" class="form-control" value=""
                            required />
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="form-label">Re-New Password*</label>
                        <input type="password" name="re_new_password" id="re_new_password" class="form-control" value=""
                            required />
                    </div>
                    <input class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 mt-5 pointer"
                        type="submit" name="change" id="change" value="Change" />
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