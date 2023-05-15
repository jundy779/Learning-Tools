<?php
include "../koneksi.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $sql = "DELETE FROM product WHERE id='$id'";

    $result = mysqli_query($conn, $sql);

    if($result){
        header("Location: produk.php");
    }else{
        echo "Delete data product gagal";
    }
}
?>