<?php
include("config/connection.php");
if (isset($_REQUEST['product_id'])) {
	$product_id = $_REQUEST['product_id'];
}

$query = "SELECT * FROM tbl_products WHERE id='$product_id'";
$result = $db->prepare($query);
$result->execute();
$total = $result->rowcount();
if ($total > 0) {
	$data = $result->fetch(PDO::FETCH_OBJ);

	$product_id = $data->id;
	$name = $data->name;
	$category_id = $data->category_id;
	$image = $data->image;
	$description = $data->description;
	$price = $data->price;
	$created_date = $data->created_date;
} else {
	echo "Product Not Found";
	exit;
}
$title = "Ptoduct Details";
include("public/header.php");
?>

<!-- Product Detail -->
<section class="sec-product-detail bg0 p-t-65 p-b-60">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-7 p-b-30">
				<div class="p-l-25 p-r-30 p-lr-0-lg">
					<div class="wrap-slick3 flex-sb flex-w">
						<div class="slick3 gallery-lb">
							<div class="item-slick3" data-thumb="images/<?php echo $image; ?>">
								<div class="wrap-pic-w pos-relative">
									<img src="images/<?php echo $image; ?>" alt="IMG-PRODUCT">

									<a class="flex-c-m size-108 how-pos1 bor0 fs-16 cl10 bg0 hov-btn3 trans-04"
										href="images/<?php echo $image; ?>">
										<i class="fa fa-expand"></i>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-md-6 col-lg-5 p-b-30">
				<div class="p-r-50 p-t-5 p-lr-0-lg">
					<h4 class="mtext-105 cl2 js-name-detail p-b-14">
						<?php echo $name; ?>
					</h4>
					<span class="mtext-106 cl2">
						$<?php echo $price; ?>
					</span>
					<p class="stext-102 cl3 p-t-23">
						<?php echo $description; ?>
					</p>
					<!--  -->
					<div class="p-t-33">
						<div class="flex-w p-b-10">
							<div class="flex-m p-r-10 m-r-11">
								<div class="wrap-num-product flex-w m-r-20 m-tb-10">
									<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
										<i class="fs-16 zmdi zmdi-minus"></i>
									</div>
									<input class="mtext-104 cl3 txt-center num-product" type="number" name="num-product"
										value="1">
									<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
										<i class="fs-16 zmdi zmdi-plus"></i>
									</div>
								</div>
							</div>
							<button
								class="flex-c-m stext-101 cl0 size-101 bg1 bor1 hov-btn1 p-lr-15 m-tb-10 trans-04 js-addcart-detail">
								Add to cart
							</button>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="bor10 m-t-50 p-t-43 p-b-40">
			<!-- Tab01 -->
			<div class="tab01">
				<!-- Nav tabs -->
				<ul class="nav nav-tabs" role="tablist">
					<li class="nav-item p-b-10">
						<a class="nav-link active" data-toggle="tab" href="#description" role="tab">Description</a>
					</li>
				</ul>

				<!-- Tab panes -->
				<div class="tab-content p-t-43">
					<!-- - -->
					<div class="tab-pane fade show active" id="description" role="tabpanel">
						<div class="how-pos2 p-lr-15-md">
							<p class="stext-102 cl6">
								<?php echo $description; ?>
							</p>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>


<!-- Related Products -->
<section class="sec-relate-product bg0 p-t-45 p-b-105">
	<div class="container">
		<div class="p-b-45">
			<h3 class="ltext-106 cl5 txt-center">
				Related Products
			</h3>
		</div>

		<!-- Slide2 -->
		<div class="wrap-slick2">
			<div class="slick2">
				<?php
				$sql = "SELECT tbl_products.*, tbl_category.name as category_name  FROM tbl_products ";
				$sql .= "INNER JOIN tbl_category ON tbl_products.category_id = tbl_category.id ";
				$sql .= "WHERE tbl_products.id != $product_id ";
				$sql .= "ORDER BY id DESC";
				$statement = $db->prepare($sql);
				$statement->execute();
				if ($statement->rowCount() > 0) {
					while ($data = $statement->fetch(PDO::FETCH_OBJ)) {
						?>
						<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
							<!-- Block2 -->
							<a href="product-detail.php?product_id=<?php echo $data->id; ?>">
								<div class="block2-pic hov-img0">
									<img src="images/<?php echo $data->image; ?>" alt="IMG-PRODUCT">
									<!-- <a href="#"
										class="block2-btn flex-c-m stext-103 cl2 size-102 bg0 bor2 hov-btn1 p-lr-15 trans-04 js-show-modal1">
										Quick View
									</a> -->
								</div>
								<div class="block2-txt flex-w flex-t p-t-14">
									<div class="block2-txt-child1 flex-col-l ">
										<a href="product-detail.php" class="stext-104 cl4 hov-cl1 trans-04 js-name-b2 p-b-6">
											<?php echo $data->name; ?>
										</a>
										<span class="stext-105 cl3">
											$<?php echo $data->price; ?>
										</span>
									</div>
									<div class="block2-txt-child2 flex-r p-t-3">
										<a href="#" class="btn-addwish-b2 dis-block pos-relative js-addwish-b2">
											<img class="icon-heart1 dis-block trans-04" src="images/icons/icon-heart-01.png"
												alt="ICON">
											<img class="icon-heart2 dis-block trans-04 ab-t-l"
												src="images/icons/icon-heart-02.png" alt="ICON">
										</a>
									</div>
								</div>
							</a>
						</div>
						<?php
					}
				}
				?>
			</div>
		</div>
	</div>
</section>

<?php
include("public/footer.php");
?>