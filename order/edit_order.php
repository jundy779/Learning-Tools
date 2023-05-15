<?php
include "../koneksi.php";

if (isset($_POST['submit'])) {
    $order_number = $_POST['order_number'];
    $date = $_POST['date'];
    $qty = $_POST['qty'];
    $total_price = $_POST['total_price'];
    $customer_id = $_POST['customer_id'];
    $product_id = $_POST['product_id'];
    $id = $_POST['id'];

    $sql = "UPDATE `order` SET order_number='$order_number', date='$date', qty='$qty', total_price='$total_price', customer_id='$customer_id', product_id='$product_id' WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: order.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
} elseif (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM `order` WHERE id='$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);
} else {
    header("Location: order.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Order</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Edit Order</h2>

    <form method="post" action="">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">

        <div class="form-group">
            <label for="order_number">Order Number:</label>
            <input type="text" class="form-control" id="order_number" name="order_number" required value="<?= $row['order_number'] ?>">
        </div>

        <div class="form-group">
            <label for="date">Date:</label>
            <input type="date" class="form-control" id="date" name="date" required value="<?= $row['date'] ?>">
        </div>

        <div class="form-group">
            <label for="qty">Quantity:</label>
            <input type="number" class="form-control" id="qty" name="qty" required value="<?= $row['qty'] ?>">
        </div>

        <div class="form-group">
            <label for="total_price">Total Price:</label>
            <input type="number" class="form-control" id="total_price" name="total_price" required value="<?= $row['total_price'] ?>">
        </div>

        <div class="form-group">
            <label for="customer_id">Customer:</label>
            <select class="form-control" id="customer_id" name="customer_id">
                <?php
                $sql_customer = "SELECT * FROM customer";
                $result_customer = mysqli_query($conn, $sql_customer);
                while ($customer_row = mysqli_fetch_assoc($result_customer)) {
                    $selected = $customer_row['id'] == $row['customer_id'] ? 'selected' : '';
                    echo "<option value='" . $customer_row['id'] . "' $selected>" . $customer_row['name'] . "</option>";
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="product_id">Product:</label>
            <select class="form-control" id="product_id" name="product_id">
            <?php
                $sql_product = "SELECT * FROM product";
                $result_product = mysqli_query($conn, $sql_product);
                while ($product_row = mysqli_fetch_assoc($result_product)) {
                    $selected = $product_row['id'] == $row['product_id'] ? 'selected' : '';
                    echo "<option value='" . $product_row['id'] . "' $selected>" . $product_row['name'] . "</option>";
                }
                ?>
            </select>
        </div>

        <input type="submit" name="submit" value="Update" class="btn btn-primary">
    </form>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>

