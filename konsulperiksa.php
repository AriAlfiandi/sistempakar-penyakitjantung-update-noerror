<?php 
ob_start();
include "koneksi.php";

// Mengambil variabel dari halaman konsultasiFM.php
$gejala = '';
$events = '';
if (isset($_POST['gejala'])) {
    $selectors = htmlentities(implode(',', $_POST['gejala']));
    //$events = htmlentities(implode('', $_POST['bobot']));
}
$data = $selectors;
//$databobot = $events;
echo "$selectors<br>";
//echo "$events";
$input = $data;

// Memecahkan string input berdasarkan karakter '\r\n\r\n'
$pecah = explode("\r\n\r\n", $input);
// String kosong inisialisasi
$text = "";
// Untuk setiap substring hasil Jantung, sisipkan <p> di awal dan </p> di akhir
// lalu menggabungnya menjadi satu string untuk $text
for ($i = 0; $i <= count($pecah) - 1; $i++) {
    $part = str_replace($pecah[$i], "<p>".$pecah[$i]."</p>", $pecah[$i]);
    $text .= $part;
}
// Menampilkan outputnya
echo $text;

// Menghapus data dari tabel tmp_gejala
$kosongtabel = mysqli_query($koneksi, "DELETE FROM tmp_gejala") or die(mysqli_error($koneksi));

$text_line = $data;
$text_line = explode(",", $text_line);
$posisi = 0;

for ($start = 0; $start < count($text_line); $start++) {
    $baris = $text_line[$start]; //echo "$baris<br>";
    // untuk nilai bobot	
    //$bobot=substr($databobot,$posisi,1); echo $bobot. "<br>";
    $sql = "INSERT INTO tmp_gejala (kd_gejala) VALUES ('$baris')";
    $query = mysqli_query($koneksi, $sql) or die(mysqli_error($koneksi));
    $posisi++;
    print $text_line[$start] . "<br>";
}

ob_end_flush();
echo "<meta http-equiv='refresh' content='0; url=index.php?top=proses_diagnosa.php&id=1'>";
?>
