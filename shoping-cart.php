<?php
$title = "Cart";
include("config/connection.php");
include("public/header.php");
?>

<!-- breadcrumb -->
<div class="container">
	<div class="bread-crumb flex-w p-l-25 p-r-15 p-t-30 p-lr-0-lg">
		<a href="index.php" class="stext-109 cl8 hov-cl1 trans-04">
			Home
			<i class="fa fa-angle-right m-l-9 m-r-10" aria-hidden="true"></i>
		</a>
		<span class="stext-109 cl4">
			Shoping Cart
		</span>
	</div>
</div>


<!-- Shoping Cart -->
<form action="ajax.php?action=order" method="POST" class="bg0 p-t-75 p-b-85">
	<div class="container">
		<div class="row">
			<div class="col-lg-10 col-xl-7 m-lr-auto m-b-50">
				<div class="m-l-25 m-r--38 m-lr-0-xl">
					<div class="wrap-table-shopping-cart">
						<table class="table-shopping-cart">
							<tr class="table_head">
								<th class="column-1">Product</th>
								<th class="column-2"></th>
								<th class="column-3">Price</th>
								<th class="column-4">Quantity</th>
								<th class="column-5">Total</th>
							</tr>
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
									<tr class="table_row" style="height: 115px;">
										<td class="column-1">
											<div class="how-itemcart1">
												<img src="images/<?php echo $data->image; ?>" alt="IMG">
											</div>
										</td>
										<td class="column-2">
											<input type="hidden" name="product_id" value="<?php echo $data->id; ?>">
											<input type="hidden" name="product_price" value="<?php echo $data->price; ?>">
											<input type="hidden" name="product_quantity" value="<?php echo $data->quantity; ?>">
											<?php echo $data->name; ?>
										</td>
										<td class="column-3 p-l-10"><?php echo '₹' . $data->price; ?></td>
										<td class="column-4">
											<div class="wrap-num-product flex-w m-l-auto m-r-0">
												<div class="btn-num-product-down cl8 hov-btn3 trans-04 flex-c-m">
													<i class="fs-16 zmdi zmdi-minus"></i>
												</div>

												<input class="mtext-104 cl3 txt-center num-product" type="number"
													name="num-product1" value="<?php echo $data->quantity; ?>">

												<div class="btn-num-product-up cl8 hov-btn3 trans-04 flex-c-m">
													<i class="fs-16 zmdi zmdi-plus"></i>
												</div>
											</div>
										</td>
										<td class="column-5">₹ <?php echo $data->cart_price; ?></td>
									</tr>
									<?php
								}
							} else {
								?>
								<tr>
									<td colspan="5" class="text-center">Cart is empty</td>
								</tr>
								<?php
							}
							?>
						</table>
					</div>
				</div>
			</div>

			<div class="col-sm-10 col-lg-7 col-xl-5 m-lr-auto m-b-50">
				<div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-63 m-r-40 m-lr-0-xl p-lr-15-sm">
					<h4 class="mtext-109 cl2 p-b-30">
						Cart Totals
					</h4>

					<div class="flex-w flex-t bor12 p-t-15 p-b-30">
						<div class="size-208 w-full-ssm">
							<span class="stext-110 cl2">
								Shipping:
							</span>
						</div>

						<div class="size-209 p-r-18 p-r-0-sm w-full-ssm">
							<p class="stext-111 cl6 p-t-2">
								Select Shipping Method
							</p>

							<div class="p-t-15">
								<div class="rs1-select2 rs2-select2 bor8 bg0 m-b-12 m-t-9">
									<select class="js-select2" name="time">
										<option>Cash On Delivery</option>
									</select>
									<div class="dropDownSelect2"></div>
								</div>
							</div>
						</div>
					</div>

					<div class="flex-w flex-t p-t-27 p-b-33">
						<div class="size-208">
							<span class="mtext-101 cl2">
								Total:
							</span>
						</div>

						<div class="size-209 p-t-1">
							<span class="mtext-110 cl2"><?php
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
								echo "<input type='hidden' name='total_price' value='" . $data->cart_price . "'>";
								echo "₹" . $data->cart_price . " ";
							} else {
								echo "₹0";
							}
							?>
							</span>
						</div>
					</div>

					<button class="flex-c-m stext-101 cl0 size-116 bg3 bor14 hov-btn3 p-lr-15 trans-04 pointer">
						Proceed to Checkout
					</button>
				</div>
			</div>
		</div>
	</div>
</form>
<?php
include("public/footer.php");
?>