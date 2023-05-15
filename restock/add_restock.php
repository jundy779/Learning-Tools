<?php
include "../koneksi.php";

// Mengecek apakah tombol submit ditekan
if (isset($_POST['submit'])) {
    $restock_number = $_POST['restock_number'];
    $date = $_POST['date'];
    $qty = $_POST['qty'];
    $supplier_id = $_POST['supplier_id'];
    $price = $_POST['price'];

    // Menjalankan query untuk menambahkan data restock baru
    $sql = "INSERT INTO restock (restock_number, date, qty,price, supplier_id)
            VALUES ('$restock_number', '$date', '$qty', '$price','$supplier_id')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: restock.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

// Menjalankan query untuk mengambil data restock dan nama supplier
$sql = "SELECT restock.*, supplier.name AS supplier_name
        FROM restock
        JOIN supplier ON restock.supplier_id = supplier.id";
$result = mysqli_query($conn, $sql);

// Menjalankan query untuk mengambil data supplier
$sql_supplier = "SELECT * FROM supplier";
$result_supplier = mysqli_query($conn, $sql_supplier);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add New Restock</title>
	<!-- Load Bootstrap CSS -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<h2>Add New Restock</h2>
		<form method="post">
			<div class="form-group">
				<label for="restock_number">Restock Number:</label>
				<input type="text" class="form-control" name="restock_number" id="restock_number" required>
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
				<label for="price">Price:</label>
				<input type="number" class="form-control" name="price" id="price" required>
			</div>

			<div class="form-group">
				<label for="supplier_id">Supplier:</label>
				<select class="form-control" name="supplier_id" id="supplier_id" required>
					<?php
					while ($row = mysqli_fetch_assoc($result_supplier)) {
						echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
					}
					?>
				</select>
			</div>

			<button type="submit" name="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>

	<!-- Load Bootstrap JS -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
</body>
</html>
