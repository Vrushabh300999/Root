<?php
include("config/connection.php");

if (isset($_POST['btn_submit'])) {
	$username = strip_tags($_POST['username']);
	$password = strip_tags($_POST['password']);
	$email = strip_tags($_POST['email']);
	$mobile_no = strip_tags($_POST['mobile_no']);

	if (isset($_POST['gender'])) {
		$gender = $_POST['gender'];
	} else {
		$gender = "";
	}

	$filename = basename($_FILES['uplodfile']['name']);
	$tmp_name = $_FILES['uplodfile']['tmp_name'];
	$uploadfolder = "images/";

	move_uploaded_file($tmp_name, $uploadfolder . $filename);

	$sql = "SELECT id FROM tbl_user WHERE email='$email'";
	$statement = $db->prepare($sql);
	$statement->execute();
	if ($statement->rowcount() > 0) {
		$alrt = '<div class="alert alert-danger w-50%  text-center" role="alert">Allreday exsits data.</div>';
	} else {
		$qurey = "INSERT INTO tbl_user
            (
                name,password,email,gender,mobile_no,images
            )
            VALUES
            (
                ?,?,?,?,?,?
            )";

		$statement = $db->prepare($qurey);
		$statement->execute(array(
			$username,
			$password,
			$email,
			$gender,
			$mobile_no,
			$filename
		));

		if (true) {
			$info = '<div class="alert alert-primary" role="alert">Registration Successfull</div>';
			header("location:login.php", true);
		}
	}
}


$title = "Registration";
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
			<div class="size-210 bor10 p-lr-70 p-t-55 p-b-70 p-lr-15-lg w-full-md" style="margin: auto;">
				<form method="post" enctype="multipart/form-data">
					<h4 class="mtext-105 cl2 txt-center p-b-30">Ragistetion</h4>
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Name</label>
						<input type="text" name="username" class="form-control" placeholder="Enter your Name">
					</div>
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Email</label>
						<input type="email" class="form-control" name="email" placeholder="Enter your Email">
					</div>
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Password</label>
						<input type="password" class="form-control" name="password" placeholder="Enter your Password">
					</div>
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Mobile_no</label>
						<input type="number" class="form-control" name="mobile_no" placeholder="Enter your Number">
					</div>
					<div class="mb-3">
						<label for="exampleFormControlInput1" class="form-label">Images</label>
						<input type="file" class="form-control" name="uplodfile" id="exampleFormControlInput1">
					</div>
					<label for="exampleFormControlInput1" class="form-label">Gender</label>
					<div class="form-check mb-3 ml-4">
						<input class="form-check-input" type="radio" name="gender" id="exampleRadios1" value="Male"
							checked>
						<label class="form-check-label" for="exampleRadios1">Male</label>
						<input class="form-check-input" type="radio" name="gender" id="exampleRadios2" value="Female">
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



<?php
include("public/footer.php");
?>