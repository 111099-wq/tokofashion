<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Produk - Toko Pakaian</title>
  <style>
    body { font-family: Arial, sans-serif; background: #f1f3f6; margin: 0; padding: 0; }
    .navbar { background: #333; padding: 15px; text-align: center; }
    .navbar a { color: white; margin: 0 15px; text-decoration: none; font-weight: bold; }
    .container { padding: 30px; display: flex; flex-wrap: wrap; justify-content: center; }
    .product {
      background: white;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
      margin: 15px;
      width: 250px;
      overflow: hidden;
      text-align: center;
      transition: transform 0.3s;
      display: flex;
      flex-direction: column;
      justify-content: space-between;
    }
    .product:hover { transform: scale(1.05); }
    .product img { width: 100%; height: 200px; object-fit: cover; }
    .product h3 { margin: 10px 0 5px; }
    .product p {
      color: #666;
      font-size: 14px;
      margin: 0 10px 15px;
      height: 50px;
      overflow: hidden;
    }
    .product a {
      display: block;
      background: #007bff;
      color: white;
      padding: 10px;
      text-decoration: none;
      border-radius: 0 0 12px 12px;
      margin-top: auto;
    }
    .product a:hover { background: #0056b3; }
    .btn-beli {
      background: #28a745;
      color: white;
      padding: 10px;
      margin: 10px;
      border: none;
      border-radius: 6px;
      cursor: pointer;
      font-weight: bold;
      text-decoration: none;
      display: inline-block;
    }
    .btn-beli:hover {
      background: #1e7e34;
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

<div class="container">
  <?php
  $query = $koneksi->query("SELECT * FROM produk ORDER BY id_produk ASC");
  if ($query->num_rows > 0) {
      while ($row = $query->fetch_assoc()) {
          $imagePath = "gambar_produk/" . $row['gambar'];
          echo '<div class="product">';
          echo '<img src="'.htmlspecialchars($imagePath).'" alt="'.htmlspecialchars($row['nama_produk']).'">';
          echo '<h3>'.htmlspecialchars($row['nama_produk']).'</h3>';
          echo '<p>'.htmlspecialchars(substr($row['deskripsi'], 0, 80)).'...</p>';
          echo '<p><strong>Rp '.number_format($row['harga'],0,',','.').'</strong></p>';
          echo '<a href="detail_produk.php?id='.$row['id_produk'].'">Lihat Detail</a>';
          echo '<a class="btn-beli" href="beli.php?id='.$row['id_produk'].'">Beli</a>';
          echo '</div>';
      }
  } else {
      echo "<p>Produk belum tersedia.</p>";
  }
  ?>
</div>

</body>
</html>