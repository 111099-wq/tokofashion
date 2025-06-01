<?php
include 'koneksi.php';

$id_produk = $_POST['id_produk'];
$nama = $_POST['nama_pembeli'];
$alamat = $_POST['alamat_pembeli'];

$sql = "INSERT INTO transaksi (id_produk, nama_pembeli, alamat_pembeli)
        VALUES ('$id_produk', '$nama', '$alamat')";

if ($koneksi->query($sql) === TRUE) {
    echo "✅ Transaksi berhasil! <a href='produk.php'>Kembali ke produk</a>";
} else {
    echo "❌ Gagal: " . $koneksi->error;
}
?>
