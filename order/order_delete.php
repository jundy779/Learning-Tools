<?php
include "../koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM `order` WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: order.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
