<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    echo "ID produk tidak ditemukan.";
    exit;
}

$id = intval($_GET['id']);

$query = $koneksi->query("SELECT * FROM produk WHERE id_produk = $id LIMIT 1");
if ($query->num_rows == 0) {
    echo "Produk tidak ditemukan.";
    exit;
}

$produk = $query->fetch_assoc();

$imagePath = "gambar_produk/" . $produk['gambar'];
if (!file_exists($imagePath)) {
    $imagePath = "images/no-image.png";
}

?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Detail Produk - <?php echo htmlspecialchars($produk['nama_produk']); ?></title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #f1f3f6;
      margin: 0; padding: 20px;
    }
    .navbar {
      background: #333;
      padding: 15px;
      text-align: center;
    }
    .navbar a {
      color: white;
      margin: 0 15px;
      text-decoration: none;
      font-weight: bold;
    }
    .detail-container {
      background: white;
      max-width: 700px;
      margin: 30px auto;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      display: flex;
      gap: 20px;
      align-items: flex-start;
      flex-wrap: wrap;
    }
    .detail-container img {
      max-width: 300px;
      border-radius: 12px;
      flex-shrink: 0;
    }
    .detail-info {
      flex-grow: 1;
    }
    .detail-info h2 {
      margin-top: 0;
    }
    .detail-info p {
      font-size: 16px;
      color: #444;
    }
    .detail-info .harga {
      font-size: 20px;
      font-weight: bold;
      margin-top: 15px;
      color: #007bff;
    }
    .beli-btn {
      display: inline-block;
      margin-top: 15px;
      background: #28a745;
      color: #fff;
      padding: 10px 20px;
      border-radius: 8px;
      text-decoration: none;
      font-weight: bold;
    }
  </style>
</head>
<body>

<div class="navbar">
  <a href="index.php">Beranda</a>
  <a href="produk.php">Produk</a>
  <a href="cara_pembelian.php">Cara Pembelian</a>
  <a href="kontak.php">Kontak</a>
</div>

<div class="detail-container">
  <img src="<?php echo htmlspecialchars($imagePath); ?>" alt="<?php echo htmlspecialchars($produk['nama_produk']); ?>">
  <div class="detail-info">
    <h2><?php echo htmlspecialchars($produk['nama_produk']); ?></h2>
    <p><?php echo nl2br(htmlspecialchars($produk['deskripsi'])); ?></p>
    <p class="harga">Rp <?php echo number_format($produk['harga'], 0, ',', '.'); ?></p>
    <a href="beli.php?id=<?php echo $produk['id_produk']; ?>" class="beli-btn">Beli</a>
  </div>
</div>

</body>
</html>
