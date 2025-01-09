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
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Change Password</title>
    <script src="js/function.js"></script>
</head>

<body>
    <form method="POST" action="" name="change_password">
        <table border="1" width="40%" align="center" cellpadding="5" cellspacing="0">
            <tr>
                <td colspan="2" align="center">
                    Change Password
                    <div>
                        <?php
                        if (isset($_REQUEST['message'])) {
                            echo $_REQUEST['message'];
                        }
                        ?>
                    </div>
                </td>
            </tr>
            <tr>
                <td><label>Current Password*</label></td>
                <td>
                    <input type="password" name="current_password" id="current_password" value="" autofocus required />
                </td>
            </tr>
            <tr>
                <td><label>New Password*</label></td>
                <td>
                    <input type="password" name="new_password" id="new_password" value="" required />
                </td>
            </tr>
            <tr>
                <td><label>Re-New Password*</label></td>
                <td>
                    <input type="password" name="re_new_password" id="re_new_password" value="" required />
                </td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" name="change" id="change" value="Change" />
                    <input type="button" name="cancel" id="cancel" value="Cancel"
                        onClick="document.location.href = 'profile.php'" />
                </td>
            </tr>
        </table>
    </form>
</body>

</html>