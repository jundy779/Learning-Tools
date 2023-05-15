<?php
include "../koneksi.php";

if(isset($_POST['submit'])) {
  // Validasi input
  $id = $_POST['id'];
  $sku = $_POST['sku'];
  $name = $_POST['name'];
  $purchase_price = $_POST['purchase_price'];
  $sell_price = $_POST['sell_price'];
  $stock = $_POST['stock'];
  $min_stock = $_POST['min_stock'];
  $product_type_id = $_POST['product_type_id'];
  $restock_id = $_POST['restock_id'];

  // Update data di database
  $sql = "UPDATE product SET sku='$sku', name='$name', purchase_price='$purchase_price', sell_price='$sell_price', stock='$stock', min_stock='$min_stock', product_type_id='$product_type_id', restock_id='$restock_id' WHERE id='$id'";
  
  if(mysqli_query($conn, $sql)) {
    echo "Data berhasil diupdate";
    header("Location: produk.php");
    exit();
  } else {
    echo "Terjadi kesalahan: " . mysqli_error($conn);
  }
} else {
  // Ambil data dari database untuk ditampilkan di form
  $id = $_GET['id'];
  $sql = "SELECT * FROM product WHERE id='$id'";
  $result = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($result);
}
?>


<!-- update_product.php -->
<!DOCTYPE html>
<html>

<head>
    <title>Update Product</title>
    <!-- Load Bootstrap CSS -->
    <link rel="stylesheet" type="text/css"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <h2>Update Product</h2>
        <form method="post">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">

            <div class="form-group">
                <label for="sku">SKU:</label>
                <input type="text" class="form-control" name="sku" id="sku" value="<?php echo $row['sku']; ?>">
            </div>

            <div class="form-group">
                <label for="name">Product Name:</label>
                <input type="text" class="form-control" name="name" id="name" value="<?php echo $row['name']; ?>">
            </div>

            <div class="form-group">
                <label for="purchase_price">Purchase Price:</label>
                <input type="text" class="form-control" name="purchase_price" id="purchase_price"
                    value="<?php echo $row['purchase_price']; ?>">
            </div>

            <div class="form-group">
                <label for="sell_price">Sell Price:</label>
                <input type="text" class="form-control" name="sell_price" id="sell_price"
                    value="<?php echo $row['sell_price']; ?>">
            </div>

            <div class="form-group">
                <label for="stock">Stock:</label>
                <input type="text" class="form-control" name="stock" id="stock" value="<?php echo $row['stock']; ?>">
            </div>

            <div class="form-group">
                <label for="min_stock">Minimum Stock:</label>
                <input type="text" class="form-control" name="min_stock" id="min_stock"
                    value="<?php echo $row['min_stock']; ?>">
            </div>

            <div class="form-group">
                <label for="product_type_id">Product Type:</label>
                <select class="form-control" name="product_type_id" id="product_type_id">
                    <?php
					$sql = "SELECT * FROM product_type";
					$result = mysqli_query($conn, $sql);
					while ($type = mysqli_fetch_assoc($result)) {
						$selected = ($type['id'] == $row['product_type_id']) ? 'selected' : '';
						echo "<option value='" . $type['id'] . "' " . $selected . ">" . $type['name'] . "</option>";
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
					while ($restock = mysqli_fetch_assoc($result)) {
						$selected = ($restock['id'] == $row['restock_id']) ? 'selected' : '';
						echo "<option value='" . $restock['id'] . "' " . $selected . ">" . $restock['restock_number'] . "</option>";
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