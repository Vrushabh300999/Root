<?php 
include("config/connection.php");
$title = "Profile";
include("public/header.php");

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
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/function.js"></script>
</head>

<body>
    <form method="POST" action="" name="user_form" enctype="multipart/form-data">
        <table border="1" width="60%" align="center" cellpadding="5" cellspacing="2">
            <tr>
                <td colspan="2" align="center">Profile</td>
            </tr>
            <tr></tr>
            <tr>
                <td><label>Name</label></td>
                <td>
                    <?php echo $name; ?>
                </td>
            </tr>
            <tr>
                <td><label>Gender</label></td>
                <td>
                    <?php echo $gender; ?>
                </td>
            </tr>
            <tr>
                <td><label>Email</label></td>
                <td>
                    <?php echo $email; ?>
                </td>
            </tr>
            <tr>
                <td><label>Mobile no</label></td>
                <td>
                    <?php echo $mobile_no; ?>
                </td>
            </tr>
            <tr>
                <td><label>Image</label></td>
                <td>
                    <?php
                    if ($images) {
                        echo "<img height='100' src='" . "images/" . $images . "'/>";
                    }
                    ?>
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="button" name="change_password" id="change_password" value="Change Password"
                        onClick="document.location.href = 'change_password.php'" />
                    <input type="button" name="edit" id="edit" value="Edit"
                        onClick="document.location.href = 'edit_profile.php?id=<?php echo $id; ?>'" />
                    <input type="button" name="logout" id="logout" value="Logout"
                        onClick="document.location.href = 'logout.php'" />
                </td>
            </tr>
        </table>
    </form> 
</body>

</html>