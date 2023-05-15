<?php
include "../koneksi.php";

$id = $_GET['id'];

$sql = "DELETE FROM product_type WHERE id=$id";
$result = mysqli_query($conn, $sql);

if ($result) {
    header("Location: jenis_produk.php");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
