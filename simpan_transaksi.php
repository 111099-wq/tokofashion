<?php
include 'koneksi.php';

$id_produk = $_POST['id_produk'];
$nama_pembeli = $_POST['nama_pembeli'];
$alamat = $_POST['alamat_pembeli'];

$query = "INSERT INTO transaksi (id_produk, nama_pembeli, alamat_pembeli) 
          VALUES ('$id_produk', '$nama_pembeli', '$alamat')";

if (mysqli_query($conn, $query)) {
    echo "Transaksi berhasil disimpan!";
    // Redirect ke halaman laporan atau produk jika ingin
    // header("Location: laporan.php");
} else {
    echo "Gagal menyimpan transaksi: " . mysqli_error($conn);
}
?>
