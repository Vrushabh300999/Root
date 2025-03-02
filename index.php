<?php
$title = "Home";
include("config/connection.php");
include("public/header.php");

?>

<!-- Slider -->
<section class="section-slide">
	<div class="wrap-slick1">
		<div class="slick1">
			<?php
			$sql = "SELECT * FROM tbl_banner ";
			$sql .= "ORDER BY id DESC";
			$statement = $db->prepare($sql);
			$statement->execute();
			if ($statement->rowCount() > 0) {
				while ($data = $statement->fetch(PDO::FETCH_OBJ)) {
					?>
					<div class="item-slick1" style="background-image: url('images/<?php echo $data->image; ?>');">
						<div class="container h-full">
							<div class="flex-col-l-m h-full p-t-100 p-b-30 respon5">
								<div class="layer-slick1 animated visible-false" data-appear="fadeInDown" data-delay="0">
									<span class="ltext-101 cl2 respon2">
										<?php echo $data->description; ?>
									</span>
								</div>
								<div class="layer-slick1 animated visible-false" data-appear="fadeInUp" data-delay="800">
									<h2 class="ltext-201 cl2 p-t-19 p-b-43 respon1">
										<?php echo $data->name; ?>
									</h2>
								</div>
							</div>
						</div>
					</div>
					<?php
				}
			}
			?>
		</div>
	</div>
</section>


<!-- Banner -->
<div class="sec-banner bg0 p-t-80 p-b-50">
	<div class="container">
		<!-- Slide2 -->
		<div class="wrap-slick2">
			<div class="slick2">
				<?php
				$sql = "SELECT * FROM tbl_category ";
				$sql .= "ORDER BY id ASC";
				$statement = $db->prepare($sql);
				$statement->execute();
				if ($statement->rowCount() > 0) {
					while ($data = $statement->fetch(PDO::FETCH_OBJ)) {
						?>
						<div class="item-slick2 p-l-15 p-r-15 p-t-15 p-b-15">
							<!-- Block2 -->
							<div class="block1 wrap-pic-w">
								<img src="images/<?php echo $data->image; ?>" alt="IMG-BANNER">
								<a href="product-category.php?category_id=<?php echo $data->id; ?>"
									class="block1-txt ab-t-l s-full flex-col-l-sb p-lr-38 p-tb-34 trans-03 respon3">
									<div class="block1-txt-child2 p-b-4 trans-05">
										<span class="block1-name ltext-102 trans-04 p-b-8">
											<?php echo $data->name; ?>
										</span>
									</div>
									<div class="block1-txt-child2 p-b-4 trans-05">
										<div class="block1-link stext-101 cl0 trans-09">
											Shop Now
										</div>
									</div>
								</a>
							</div>
						</div>
						<?php
					}
				}
				?>
			</div>
		</div>
	</div>
</div>


<!-- Product -->
<section class="bg0 p-t-23 p-b-140">
	<div class="container">
		<div class="p-b-10">
			<h3 class="ltext-103 cl5">
				Product Overview
			</h3>
		</div>

		<div class="flex-w flex-sb-m p-b-52">
			<div class="flex-w flex-l-m filter-tope-group m-tb-10">
				<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5 how-active1" data-filter="*">
					All Products
				</button>
				<?php
				$sql = "SELECT * FROM tbl_category ";
				$sql .= "ORDER BY id ASC";
				$statement = $db->prepare($sql);
				$statement->execute();
				if ($statement->rowCount() > 0) {
					while ($data = $statement->fetch(PDO::FETCH_OBJ)) {
						?>
						<button class="stext-106 cl6 hov1 bor3 trans-04 m-r-32 m-tb-5"
							data-filter=".<?php echo str_replace(" ", "_", strtolower($data->name)); ?>">
							<?php echo $data->name; ?>
						</button>
						<?php
					}
				}
				?>
			</div>

			<div class="flex-w flex-c-m m-tb-10">
				<div class="flex-c-m stext-106 cl6 size-105 bor4 pointer hov-btn3 trans-04 m-tb-4 js-show-search">
					<i class="icon-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-search"></i>
					<i class="icon-close-search cl2 m-r-6 fs-15 trans-04 zmdi zmdi-close dis-none"></i>
					Search
				</div>
			</div>

			<!-- Search product -->
			<div class="dis-none panel-search w-full p-t-10 p-b-15">
				<div class="bor8 dis-flex p-l-15">
					<button class="size-113 flex-c-m fs-16 cl2 hov-cl1 trans-04">
						<i class="zmdi zmdi-search"></i>
					</button>

					<input class="mtext-107 cl2 size-114 plh2 p-r-15" type="text" name="search-product"
						placeholder="Search">
				</div>
			</div>
		</div>

		<div class="row isotope-grid">
			<?php
			$sql = "SELECT tbl_products.*, tbl_category.name as category_name FROM tbl_products ";
			$sql .= "INNER JOIN tbl_category ON tbl_products.category_id = tbl_category.id ";
			$sql .= "ORDER BY id DESC";
			$statement = $db->prepare($sql);
			$statement->execute();
			if ($statement->rowCount() > 0) {
				while ($data = $statement->fetch(PDO::FETCH_OBJ)) {
					?>
					<div
						class="col-sm-6 col-md-4 col-lg-3 p-b-35 isotope-item <?php echo str_replace(" ", "_", strtolower($data->category_name)); ?>">
						<div class="block2">
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
					</div>
					<?php
				}
			} else {
				echo "Product Not Found";
			}
			?>
		</div>
	</div>
</section>

<?php
include("public/footer.php");
?>