<?php
include "../koneksi.php";

$id = $_GET['id'];

// Menghapus data restock berdasarkan ID
$sql = "DELETE FROM restock WHERE id=$id";
$result = mysqli_query($conn, $sql);

if ($result) {
    header("Location: restock.php");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
?>
