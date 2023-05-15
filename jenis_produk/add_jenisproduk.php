<?php
include "../koneksi.php";

if (isset($_POST['submit'])) {
    $nama_jenis_produk = $_POST['nama_jenis_produk'];

    $sql = "INSERT INTO product_type (name) VALUES ('$nama_jenis_produk')";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: jenis_produk.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Tambah Jenis Produk</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>

<div class="container">
    <h2>Tambah Jenis Produk</h2>

    <form method="POST">
        <div class="form-group">
            <label for="nama_jenis_produk">Nama Jenis Produk:</label>
            <input type="text" class="form-control" id="nama_jenis_produk" name="nama_jenis_produk">
        </div>

        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </form>
</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
