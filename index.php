<?php
include 'koneksi.php';
// Ambil 6 produk terbaru untuk ditampilkan di beranda
$queryProduk = mysqli_query($koneksi, "SELECT * FROM produk ORDER BY id_produk DESC LIMIT 6");
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Beranda - Toko dan Data Siswa</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0; padding: 0;
      background: #f0f4f8;
      color: #333;
    }
    .navbar {
      background: #2d3e50;
      padding: 15px;
      text-align: center;
    }
    .navbar a {
      color: white;
      text-decoration: none;
      margin: 0 20px;
      font-weight: bold;
      font-size: 16px;
      transition: color 0.3s;
    }
    .navbar a:hover {
      color: #00aaff;
    }
    header {
      padding: 80px 20px;
      background: linear-gradient(45deg, #00aaff, #005f99);
      color: white;
      text-align: center;
    }
    header h1 {
      font-size: 48px;
      margin-bottom: 10px;
    }
    header p {
      font-size: 20px;
      margin-top: 0;
    }
    .content {
      max-width: 900px;
      margin: 40px auto;
      padding: 0 20px;
    }
    .section {
      background: white;
      padding: 30px;
      margin-bottom: 30px;
      border-radius: 12px;
      box-shadow: 0 4px 12px rgba(0,0,0,0.1);
    }
    .section h2 {
      margin-top: 0;
      color: #005f99;
    }
    .section p {
      font-size: 16px;
      line-height: 1.5;
    }
    .btn {
      display: inline-block;
      margin-top: 15px;
      padding: 10px 20px;
      background: #00aaff;
      color: white;
      border-radius: 8px;
      text-decoration: none;
      font-weight: bold;
      transition: background 0.3s;
    }
    .btn:hover {
      background: #0077cc;
    }
    footer {
      text-align: center;
      padding: 20px;
      background: #2d3e50;
      color: white;
      font-size: 14px;
    }

    /* Styling untuk container gambar produk */
    .produk-list {
      display: flex;
      flex-wrap: wrap;
      gap: 15px;
      margin-top: 20px;
      justify-content: center;
    }
    .produk-list img {
      width: 140px;
      height: auto;
      border-radius: 12px;
      box-shadow: 0 3px 8px rgba(0,0,0,0.2);
      transition: transform 0.3s;
      cursor: pointer;
    }
    .produk-list img:hover {
      transform: scale(1.05);
    }

  </style>
</head>
<body>

<div class="navbar">
  <a href="indexx.php">Beranda</a>
  <a href="produk.php">Produk</a>
  <a href="cara_pembelian.html">Cara Pembelian</a>
  <a href="kontak.html">Kontak</a>
</div>

<header>
  <h1>Selamat Datang di Website TOKO FASHION AUREVAZ</h1>
  <p>Apakah Anda Ingin Tampil Beda Dan Percaya Diri Setiap Hari!! Belanjalah DI Toko Kami</p>
</header>

<div class="content">
  <div class="section">
    <h2>Produk Unggulan</h2>
    <p>Temukan berbagai produk pakaian berkualitas dengan harga terjangkau. Mulai dari kaos polos, kaos lengan panjang, hingga hoodie keren. Semua produk kami menggunakan bahan terbaik untuk kenyamanan Anda.</p>

    <!-- Tampilkan gambar produk -->
    <div class="produk-list">
      <?php while ($produk = mysqli_fetch_assoc($queryProduk)): ?>
        <img src="gambar_produk/<?= htmlspecialchars($produk['gambar']); ?>" alt="Produk <?= htmlspecialchars($produk['nama_produk']); ?>" title="<?= htmlspecialchars($produk['nama_produk']); ?>">
      <?php endwhile; ?>
    </div>

    <a class="btn" href="produk.php">Lihat Produk</a>
  </div>

  <div class="section">
    <h2>Cara Pembelian</h2>
    <p>Pembelian mudah dan cepat. Pilih produk favorit Anda, klik beli, isi data pembeli, dan transaksi Anda akan kami proses segera.</p>
    <a class="btn" href="cara_pembelian.html">Pelajari Cara Pembelian</a>
  </div>
</div>

<footer>
  &copy; 2025 Toko Pakaian & Sistem Data Siswa. All rights reserved.
</footer>

</body>
</html>
