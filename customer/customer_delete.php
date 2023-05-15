<?php
include "../koneksi.php";

$id = $_GET['id'];
$sql = "DELETE FROM customer WHERE id=$id";
$result = mysqli_query($conn, $sql);

if ($result) {
    header("Location: customer.php");
    exit();
} else {
    echo "Error: " . mysqli_error($conn);
}
