<?php
include 'koneksi.php';
$id = $_GET['id'];
$data = $koneksi->query("SELECT * FROM produk WHERE id_produk = $id")->fetch_assoc();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Detail Produk</title>
</head>
<body>
  <h2><?php echo $data['nama_produk']; ?></h2>
  <p><?php echo $data['deskripsi']; ?></p>
  <p>Harga: Rp <?php echo number_format($data['harga']); ?></p>

  <form method="POST" action="proses_beli.php">
    <input type="hidden" name="id_produk" value="<?php echo $data['id_produk']; ?>">
    <label>Nama Pembeli:</label><br>
    <input type="text" name="nama_pembeli" required><br>
    <label>Alamat:</label><br>
    <textarea name="alamat_pembeli" required></textarea><br><br>
    <button type="submit">Beli</button>
  </form>
</body>
</html>
