<?php
include "../koneksi.php";

if (isset($_POST['submit'])) {
    $order_number = $_POST['order_number'];
    $date = $_POST['date'];
    $qty = $_POST['qty'];
    $total_price = $_POST['total_price'];
    $customer_id = $_POST['customer_id'];
    $product_id = $_POST['product_id'];

    $sql = "INSERT INTO `order` (order_number, date, qty, total_price, customer_id, product_id) 
            VALUES ('$order_number', '$date', '$qty', '$total_price', '$customer_id', '$product_id')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: order.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!-- index.php -->
<!DOCTYPE html>
<html>
<head>
	<title>Add New Order</title>
	<!-- Load Bootstrap CSS -->
	<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h2>Add New Order</h2>
		<form method="post" action="">
			<div class="form-group">
				<label for="order_number">Order Number:</label>
				<input type="text" class="form-control" name="order_number" id="order_number" required>
			</div>

			<div class="form-group">
				<label for="date">Date:</label>
				<input type="date" class="form-control" name="date" id="date" required>
			</div>

			<div class="form-group">
				<label for="qty">Quantity:</label>
				<input type="number" class="form-control" name="qty" id="qty" required>
			</div>

			<div class="form-group">
				<label for="total_price">Total Price:</label>
				<input type="number" class="form-control" name="total_price" id="total_price" required>
			</div>

			<div class="form-group">
				<label for="customer_id">Customer:</label>
				<select class="form-control" name="customer_id" id="customer_id">
					<?php
					$sql_customer = "SELECT * FROM customer";
					$result_customer = mysqli_query($conn, $sql_customer);
					while ($row = mysqli_fetch_assoc($result_customer)) {
						echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
					}
					?>
				</select>
			</div>

			<div class="form-group">
				<label for="product_id">Product:</label>
				<select class="form-control" name="product_id" id="product_id">
					<?php
					$sql_product = "SELECT * FROM product";
					$result_product = mysqli_query($conn, $sql_product);
					while ($row = mysqli_fetch_assoc($result_product)) {
						echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
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

