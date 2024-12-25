<?php
include("config/connection.php");

if (empty($_SESSION['id'])) {
    header("Location:login.php");
    exit;
} else {
    $id = $_SESSION['id'];
}

$query = "SELECT * FROM tbl_user WHERE id != '0' 
        AND id = $id ";
$result = $db->prepare($query);
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
    session_destroy();
    header("Location:login.php");
    exit;
}

$title = "Profile";
include("public/header.php");
?>
<section class="bg0 p-t-104 p-b-116">
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
            <div class="size-209 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md" style="margin: auto;">
                <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-210">Name</span>
                    <div class="size-210 p-t-2"><?php echo $name; ?></div>
                </div>
                <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-210">Gender</span>
                    <div class="size-210 p-t-2"><?php echo $gender; ?></div>
                </div>
                <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-210">Email</span>
                    <div class="size-210 p-t-2"><?php echo $email; ?></div>
                </div>
                <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-210">Mobile no</span>
                    <div class="size-210 p-t-2"><?php echo $mobile_no; ?></div>
                </div>
                <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-210">Image</span>
                    <div class="size-210 p-t-2">
                        <?php
                        if ($images) {
                            echo "<img height='100' src='" . "images/" . $images . "'/>";
                        } else {
                            echo "N/A";
                        }
                        ?>
                    </div>
                </div>
                <div class="flex-w w-full p-b-42">
                    <span class="fs-18 cl5 txt-center size-210">Action</span>
                    <div class="size-210 p-t-2 flex-w">
                        <a href="change_password.php"
                            class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                            Change Password
                        </a>
                        <a href="edit_profile.php?id=<?php echo $id; ?>"
                            class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                            Edit
                        </a>
                        <a href="logout.php"
                            class="flex-c-m stext-107 cl6 size-301 bor7 p-lr-15 hov-tag1 trans-04 m-r-5 m-b-5">
                            Logout
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
include("public/footer.php");
?>