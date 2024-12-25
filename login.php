<?php
include("config/connection.php");
if (!empty($_SESSION['id'])) {
	header("Location:profile.php");
	exit;
}
if (isset($_POST['btn_submit'])) {
	$email = strip_tags($_POST['email']);
	$password = strip_tags($_POST['password']);

	$sql = "SELECT * FROM tbl_user 
            WHERE id!='0' 
            AND email='$email' 
            AND password='$password' ";
	$statement = $db->prepare($sql);
	$statement->execute();
	if ($statement->rowcount() > 0) {
		$rows = $statement->fetch(PDO::FETCH_OBJ);
		$id = $rows->id;
		$name = $rows->name;
		$email = $rows->email;
		$images = $rows->images;
		$_SESSION['id'] = $id;
		$_SESSION['name'] = $name;
		$_SESSION['email'] = $email;
		$_SESSION['images'] = $images;
		header("location:profile.php", true);
	} else {
		$alrt = '<div class="alert alert-danger w-50%  text-center" role="alert">Please Enter Valid details</div>';
	}
}


$title = "Login";
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
			<div class="size-210 bor10 p-lr-70 p-t-55 p-b-50 p-lr-15-lg w-full-md" style="margin: auto;">
				<form method="post" enctype="multipart/form-data">
					<h4 class="mtext-105 cl2 txt-center p-b-30">Login</h4>
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Email</label>
						<input type="email" class="form-control" name="email" placeholder="Enter your Email">
					</div>
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Password</label>
						<input type="password" class="form-control" name="password" placeholder="Enter your Password">
					</div>
					<button class="flex-c-m stext-101 cl0 size-121 bg3 bor1 hov-btn3 p-lr-15 trans-04 pointer mb-5"
						name="btn_submit">
						Login
					</button>

					If you don't have account
					<a href="registration.php"> Registration Now</a>
				</form>
			</div>
		</div>
	</div>
</section>



<?php
include("public/footer.php");
?>