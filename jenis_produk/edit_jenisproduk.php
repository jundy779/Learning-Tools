<?php
include "../koneksi.php";

if (isset($_POST['submit'])) {
    $id = $_POST['id'];
    $nama_jenis_produk = $_POST['nama_jenis_produk'];

    $sql = "UPDATE product_type SET name='$nama_jenis_produk' WHERE id=$id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: jenis_produk.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}

$id = $_GET['id'];
$sql = "SELECT * FROM product_type WHERE id=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Jenis Produk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Update Jenis Produk</h2>

    <form method="POST">
        <input type="hidden" name="id" value="<?= $row['id'] ?>">

        <div class="form-group">
            <label for="nama_jenis_produk">Nama Jenis Produk:</label>
            <input type="text" class="form-control" id="nama_jenis_produk" name="nama_jenis_produk" value="<?= $row['name'] ?>">
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
