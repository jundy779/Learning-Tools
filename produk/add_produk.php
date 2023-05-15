<?php
include "../koneksi.php";

if(isset($_POST['submit'])) {
  // Validasi input
  $sku = $_POST['sku'];
  $name = $_POST['name'];
  $purchase_price = $_POST['purchase_price'];
  $sell_price = $_POST['sell_price'];
  $stock = $_POST['stock'];
  $min_stock = $_POST['min_stock'];
  $product_type_id = $_POST['product_type_id'];
  $restock_id = $_POST['restock_id'];
  
  // Simpan data ke database
  $sql = "INSERT INTO product (sku, name, purchase_price, sell_price, stock, min_stock, product_type_id, restock_id) 
          VALUES ('$sku', '$name', '$purchase_price', '$sell_price', '$stock', '$min_stock', '$product_type_id', '$restock_id')";
  
  if(mysqli_query($conn, $sql)) {
    echo "Data berhasil disimpan";
    header("Location: produk.php");
    exit();
  } else {
    echo "Terjadi kesalahan: " . mysqli_error($conn);
  }
}
?>

<!-- index.php -->
<!DOCTYPE html>
<html>
<head>
	<title>Add New Product</title>
	<!-- Load Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h2>Add New Product</h2>
		<form method="post">
			<div class="form-group">
				<label for="sku">SKU:</label>
				<input type="text" class="form-control" name="sku" id="sku">
			</div>

			<div class="form-group">
				<label for="name">Product Name:</label>
				<input type="text" class="form-control" name="name" id="name">
			</div>

			<div class="form-group">
				<label for="purchase_price">Purchase Price:</label>
				<input type="text" class="form-control" name="purchase_price" id="purchase_price">
			</div>

			<div class="form-group">
				<label for="sell_price">Sell Price:</label>
				<input type="text" class="form-control" name="sell_price" id="sell_price">
			</div>

			<div class="form-group">
				<label for="stock">Stock:</label>
				<input type="text" class="form-control" name="stock" id="stock">
			</div>

			<div class="form-group">
				<label for="min_stock">Minimum Stock:</label>
				<input type="text" class="form-control" name="min_stock" id="min_stock">
			</div>

			<div class="form-group">
				<label for="product_type_id">Product Type:</label>
				<select class="form-control" name="product_type_id" id="product_type_id">
					<?php
					$sql = "SELECT * FROM product_type";
					$result = mysqli_query($conn, $sql);
					while ($row = mysqli_fetch_assoc($result)) {
						echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
					}
					?>
				</select>
			</div>

			<div class="form-group">
				<label for="restock_id">Restock:</label>
				<select class="form-control" name="restock_id" id="restock_id">
					<?php
					$sql = "SELECT * FROM restock";
					$result = mysqli_query($conn, $sql);
					while ($row = mysqli_fetch_assoc($result)) {
						echo "<option value='" . $row['id'] . "'>" . $row['restock_number'] . "</option>";
					}
					?>
				</select>
			</div>

			<input type="submit" class="btn btn-primary" name="submit" value="Submit">
		</form>
	</div>

	<!-- Load Bootstrap JS -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>

