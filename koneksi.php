<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_learningtools";

// Buat koneksi
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
