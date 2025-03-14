<?php
$title = "Order";
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
			Oreder
		</span>
	</div>
</div>


<!-- Oreder -->
<form action="ajax.php?action=order" method="POST" class="bg0 p-t-75 p-b-85">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-xl-12 m-lr-auto m-b-50">
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
							$sql = "SELECT tbl_products.*, tbl_order.quantity, tbl_order.price as cart_price FROM tbl_products ";
							$sql .= "INNER JOIN tbl_order ON tbl_order.product_id = tbl_products.id ";
							$sql .= "WHERE tbl_order.is_delete = 0 ";
							$sql .= "AND tbl_order.user_id = " . $user_id . " ";
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
											<?php echo $data->quantity; ?>
										</td>
										<td class="column-5"><?php echo '₹' . $data->cart_price; ?></td>
									</tr>
									<?php
								}
							} else {
								?>
								<tr>
									<td colspan="5" class="text-center">You Don't Have any Order</td>
								</tr>
								<?php
							}
							?>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
<?php
include("public/footer.php");
?>