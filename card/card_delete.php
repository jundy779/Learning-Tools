<?php
include "../koneksi.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM card WHERE id='$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        header("Location: card.php");
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request";
    exit;
}
?>
