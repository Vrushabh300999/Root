<!DOCTYPE html>
<html lang="en">

<head>
	<title><?php echo $title; ?></title>
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
	<link rel="stylesheet" type="text/css" href="css/custom.css">
	<!--===============================================================================================-->
</head>

<body class="">
	<!-- Header -->
	<header>
		<!-- Header desktop -->
		<div class="container-menu-desktop m-b-80">
			<div class="wrap-menu-desktop">
				<nav class="limiter-menu-desktop container">
					<!-- Logo desktop -->
					<a href="<?php echo ROOT ?>" class="logo">
						<img src="images/icons/mc_logo.png" alt="IMG-LOGO">
					</a>
					<!-- Menu desktop -->
					<div class="menu-desktop">
						<ul class="main-menu">
							<li class="active-menu">
								<a href="index.php">Home</a>
							</li>
							<li>
								<a href="product.php">Shop</a>
							</li>
							<li>
								<a href="about.php">About</a>
							</li>
							<li>
								<a href="contact.php">Contact</a>
							</li>
						</ul>
					</div>

					<!-- Icon header -->
					<div class="wrap-icon-header flex-w flex-r-m main-menu">
						<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 js-show-modal-search">
							<i class="zmdi zmdi-search"></i>
						</div>
						<li class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
							<a href="#"><i class="zmdi zmdi-account" style="font-size: x-large;"></i></a>
							<ul class="sub-menu">
								<?php
								if (isset($_SESSION['id'])) {
									?>
									<li><a class="dropdown-item" href="profile.php">Profile</a></li>
									<li><a class="dropdown-item" href="order.php">Your Orders</a></li>
									<li><a class="dropdown-item" href="logout.php">Logout</a></li>
									<?php
								} else {
									?>
									<li><a class="dropdown-item" href="login.php">Login</a></li>
									<?php
								}
								?>
							</ul>
						</li>
					</div>
					<?php
					$user_id = $_SESSION['id'];
					$sql = "SELECT tbl_products.*, COUNT(tbl_cart.id) as cart_items FROM tbl_products ";
					$sql .= "INNER JOIN tbl_cart ON tbl_cart.product_id = tbl_products.id ";
					$sql .= "WHERE tbl_cart.is_check_out = 0 ";
					$sql .= "AND tbl_cart.user_id = " . $user_id . " ";
					$sql .= "ORDER BY id DESC";
					$statement = $db->prepare($sql);
					$statement->execute();
					if ($statement->rowCount() > 0) {
						$data = $statement->fetch(PDO::FETCH_OBJ);
						$cart_items = $data->cart_items;
					} else {
						$cart_items = 0;
					}
					?>
					<div class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti js-show-cart"
						data-notify="<?php echo $cart_items; ?>">
						<i class="zmdi zmdi-shopping-cart"></i>
					</div>

					<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11 icon-header-noti"
						data-notify="0">
						<i class="zmdi zmdi-favorite-outline"></i>
					</a>
			</div>
			</nav>
		</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap-header-mobile">
			<!-- Logo moblie -->
			<div class="logo-mobile">
				<a href="index.php"><img src="images/icons/mc_logo.png" alt="IMG-LOGO"></a>
			</div>

			<!-- Icon header -->
			<div class="wrap-icon-header flex-w flex-r-m m-r-15">
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 js-show-modal-search">
					<i class="zmdi zmdi-search"></i>
				</div>
				<li class="icon-header-item cl2 hov-cl1 trans-04 p-l-22 p-r-11">
					<a href="#" class="mobile-account"><i class="zmdi zmdi-account" style="font-size: x-large;"></i></a>
					<ul class="sub-menu mobile-menu">
						<?php
						if (isset($_SESSION['id'])) {
							?>
							<li><a class="dropdown-item" href="profile.php">Profile</a></li>
							<li><a class="dropdown-item" href="order.php">Your Orders</a></li>
							<li><a class="dropdown-item" href="logout.php">Logout</a></li>
							<?php
						} else {
							?>
							<li><a class="dropdown-item" href="login.php">Login</a></li>
							<?php
						}
						?>
					</ul>
				</li>
				<div class="icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti js-show-cart"
					data-notify="<?php echo $cart_items; ?>">
					<i class="zmdi zmdi-shopping-cart"></i>
				</div>

				<a href="#" class="dis-block icon-header-item cl2 hov-cl1 trans-04 p-r-11 p-l-10 icon-header-noti"
					data-notify="0">
					<i class="zmdi zmdi-favorite-outline"></i>
				</a>
			</div>

			<!-- Button show menu -->
			<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
				<span class="hamburger-box">
					<span class="hamburger-inner"></span>
				</span>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="menu-mobile">
			<ul class="main-menu-m">
				<li>
					<a href="index.php">Home</a>
				</li>
				<li>
					<a href="product.php">Shop</a>
				</li>
				<li>
					<a href="about.php">About</a>
				</li>
				<li>
					<a href="contact.php">Contact</a>
				</li>
			</ul>
		</div>

		<!-- Modal Search -->
		<div class="modal-search-header flex-c-m trans-04 js-hide-modal-search">
			<div class="container-search-header">
				<button class="flex-c-m btn-hide-modal-search trans-04 js-hide-modal-search">
					<img src="images/icons/icon-close2.png" alt="CLOSE">
				</button>

				<form class="wrap-search-header flex-w p-l-15">
					<button class="flex-c-m trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>
					<input class="plh3" type="text" name="search" placeholder="Search...">
				</form>
			</div>
		</div>
	</header>

	<!-- Cart -->
	<div class="wrap-header-cart js-panel-cart">
		<div class="s-full js-hide-cart"></div>

		<div class="header-cart flex-col-l p-l-65 p-r-25">
			<div class="header-cart-title flex-w flex-sb-m p-b-8">
				<span class="mtext-103 cl2">
					Your Cart
				</span>

				<div class="fs-35 lh-10 cl2 p-lr-5 pointer hov-cl1 trans-04 js-hide-cart">
					<i class="zmdi zmdi-close"></i>
				</div>
			</div>

			<div class="header-cart-content flex-w js-pscroll">
				<ul class="header-cart-wrapitem w-full">
					<?php
					$user_id = $_SESSION['id'];
					$sql = "SELECT tbl_products.*, tbl_cart.quantity, tbl_cart.price as cart_price FROM tbl_products ";
					$sql .= "INNER JOIN tbl_cart ON tbl_cart.product_id = tbl_products.id ";
					$sql .= "WHERE tbl_cart.is_check_out = 0 ";
					$sql .= "AND tbl_cart.user_id = " . $user_id . " ";
					$sql .= "ORDER BY id DESC";
					$statement = $db->prepare($sql);
					$statement->execute();
					if ($statement->rowCount() > 0) {
						while ($data = $statement->fetch(PDO::FETCH_OBJ)) {
							?>
							<li class="header-cart-item flex-w flex-t m-b-12">
								<div class="header-cart-item-img">
									<img src="images/<?php echo $data->image; ?>" alt="IMG">
								</div>
								<div class="header-cart-item-txt p-t-8">
									<a href="#" class="header-cart-item-name m-b-18 hov-cl1 trans-04">
										<?php echo $data->name; ?>
									</a>
									<span class="header-cart-item-info">
										<?php echo $data->quantity . ' x ₹' . $data->price; ?>
									</span>
								</div>
							</li>
							<?php
						}
					} else {
						echo "Cart is empty";
					}
					?>
				</ul>

				<div class="w-full">
					<div class="header-cart-total w-full p-tb-40">
						<?php
						$user_id = $_SESSION['id'];
						$sql = "SELECT tbl_products.*, SUM(tbl_cart.price) as cart_price FROM tbl_products ";
						$sql .= "INNER JOIN tbl_cart ON tbl_cart.product_id = tbl_products.id ";
						$sql .= "WHERE tbl_cart.is_check_out = 0 ";
						$sql .= "AND tbl_cart.user_id = " . $user_id . " ";
						$sql .= "ORDER BY id DESC";
						$statement = $db->prepare($sql);
						$statement->execute();
						if ($statement->rowCount() > 0) {
							$data = $statement->fetch(PDO::FETCH_OBJ);
							echo "Total: ₹" . $data->cart_price . " ";
						} else {
							echo "Total: ₹0";
						}
						?>
					</div>
					<div class="header-cart-buttons flex-w w-full">
						<a href="shoping-cart.php"
							class="flex-c-m stext-101 cl0 size-107 bg3 bor2 hov-btn3 p-lr-15 trans-04 m-r-8 m-b-10">
							View Cart
						</a>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- header end -->