<?php
include "../koneksi.php";

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $restock_number = $_POST['restock_number'];
    $date = $_POST['date'];
    $qty = $_POST['qty'];
    $supplier_id = $_POST['supplier_id'];
    $price = $_POST['price'];

    // Menjalankan query untuk update data restock
    $sql = "UPDATE restock SET restock_number='$restock_number', date='$date', qty='$qty', price='$price', supplier_id='$supplier_id' WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: restock.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

$id = $_GET['id'];
$sql = "SELECT restock.*, supplier.name AS supplier_name
        FROM restock
        JOIN supplier ON restock.supplier_id = supplier.id
        WHERE restock.id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Edit Restock</title>
	<!-- Load Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h2>Edit Restock</h2>
		<form method="post">
			<input type="hidden" name="id" value="<?= $row['id'] ?>">

			<div class="form-group">
				<label for="restock_number">Restock Number:</label>
				<input type="text" class="form-control" name="restock_number" id="restock_number" value="<?= $row['restock_number'] ?>" required>
			</div>

			<div class="form-group">
				<label for="date">Date:</label>
				<input type="date" class="form-control" name="date" id="date" value="<?= $row['date'] ?>" required>
			</div>

			<div class="form-group">
				<label for="qty">Quantity:</label>
				<input type="number" class="form-control" name="qty" id="qty" value="<?= $row['qty'] ?>" required>
			</div>

			<div class="form-group">
				<label for="price">Price:</label>
				<input type="number" class="form-control" name="price" id="price" value="<?= $row['price'] ?>" required>
			</div>

			<div class="form-group">
				<label for="supplier_id">Supplier:</label>
				<select class="form-control" name="supplier_id" id="supplier_id" required>
					<?php
					$selected_supplier_id = $row['supplier_id'];
					$sql_supplier = "SELECT * FROM supplier";
					$result_supplier = mysqli_query($conn, $sql_supplier);
					while ($supplier = mysqli_fetch_assoc($result_supplier)) {
						$selected = ($supplier['id'] == $selected_supplier_id) ? "selected" : "";
						echo "<option value='" . $supplier['id'] . "' $selected>" . $supplier['name'] . "</option>";
					}
					?>
				</select>
			</div>

			<button type="submit" name="submit" class="btn btn-primary">Update</button>
		</form>
	</div>

	<!-- Load Bootstrap JS -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
