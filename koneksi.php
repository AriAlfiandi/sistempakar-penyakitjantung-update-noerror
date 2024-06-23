<?php
$host = "localhost:3308";
$user = "root";
$pass = "";
$dbName = "spjantung";

// Membuat koneksi ke database
$koneksi = mysqli_connect($host, $user, $pass, $dbName);

// Memeriksa koneksi
if (!$koneksi) {
    die("<center style='color:red;'><strong>Koneksi Gagal: " . mysqli_connect_error() . "</strong></center>");
} else {
    echo "<center style='color:green;'></center>";
}
?>
