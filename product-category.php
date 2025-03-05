<?php
include("config/connection.php");
if (isset($_REQUEST['category_id'])) {
	$category_id = $_REQUEST['category_id'];
}

$query = "SELECT * FROM tbl_category WHERE id='$category_id'";
$result = $db->prepare($query);
$result->execute();
$total = $result->rowcount();
if ($total > 0) {
	$data = $result->fetch(PDO::FETCH_OBJ);
	$category_name = $data->name;
	$image = $data->image;
}

$title = "Products";
include("public/header.php");
?>

<!-- Product -->
<div class="bg0 m-t-100 p-b-140">
	<div class="container">
		<div class="p-b-10">
			<h3 class="ltext-103 cl5">
				<?php echo $category_name; ?>
			</h3>
		</div>
		<div class="row isotope-grid">
			<?php
			$sql = "SELECT * FROM tbl_products ";
			$sql .= "WHERE category_id='$category_id' ";
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
											₹<?php echo $data->price; ?>
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
				exit;
			}
			?>
		</div>
	</div>
</div>


<?php
include("public/footer.php");
?>