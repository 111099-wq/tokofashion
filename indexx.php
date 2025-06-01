<?php
include 'koneksi.php';
$query = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY id_produk DESC LIMIT 10");
?>

<!DOCTYPE html>
<html>
<head>
  <title>Beranda Toko Fashion</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: linear-gradient(to right, #e0c3fc, #8ec5fc);
    }
    .header {
      background-color: #2e2eae;
      padding: 20px;
      color: white;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }
    .header .logo {
      font-size: 28px;
      font-weight: bold;
    }
    .menu a {
      color: white;
      margin-left: 20px;
      text-decoration: none;
      font-weight: bold;
    }
    .content {
      text-align: center;
      margin-top: 50px;
    }
    .produk-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      gap: 20px;
      max-width: 1200px;
      margin: auto;
    }
    .produk-item {
      background-color: white;
      border-radius: 20px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.3);
      width: 200px;
      padding: 10px;
      transition: transform 0.3s ease;
    }
    .produk-item:hover {
      transform: scale(1.05);
    }
    .produk-item img {
      width: 100%;
      height: auto;
      border-radius: 10px;
      display: block;
      margin: auto;
    }
  </style>
</head>
<body>
  <div class="header">
    <div class="logo">Toko Fashion</div>
    <div class="menu">
      <a href="index.php">Beranda</a>
      <a href="cara_pembelian.html">Cara Pembelian</a>
      <a href="produk.php">Produk</a>
      <a href="kontak.html">Kontak</a>
    </div>
  </div>

  <div class="content">
    <h2>Produk Terbaru</h2>
    <div class="produk-container">
      <?php while ($row = mysqli_fetch_assoc($query)): ?>
        <div class="produk-item">
          <img src="gambar_produk/<?= htmlspecialchars($row['gambar']); ?>" alt="Produk <?= htmlspecialchars($row['nama_produk']); ?>">
        </div>
      <?php endwhile; ?>
    </div>
  </div>
</body>
</html>
