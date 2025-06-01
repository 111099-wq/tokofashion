<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    echo "Produk tidak dipilih.";
    exit;
}

$id_produk = intval($_GET['id']);
$query = $koneksi->query("SELECT * FROM produk WHERE id_produk = $id_produk LIMIT 1");
if ($query->num_rows == 0) {
    echo "Produk tidak ditemukan.";
    exit;
}

$produk = $query->fetch_assoc();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $koneksi->real_escape_string($_POST['nama']);
    $alamat = $koneksi->real_escape_string($_POST['alamat']);
    $jumlah = intval($_POST['jumlah']);
    $ukuran = $koneksi->real_escape_string($_POST['ukuran']);
    $tanggal = date('Y-m-d H:i:s');

    // Simpan transaksi
    $sql = "INSERT INTO transaksi (id_produk, nama_pembeli, alamat_pembeli, jumlah, ukuran, tanggal) 
            VALUES ($id_produk, '$nama', '$alamat', $jumlah, '$ukuran', '$tanggal')";

    if ($koneksi->query($sql)) {
        echo "<h3>Pembelian berhasil!</h3>";
        echo "<p>Terima kasih sudah membeli <strong>".htmlspecialchars($produk['nama_produk'])."</strong>.</p>";
        echo '<a href="produk.php">Kembali ke Produk</a>';
        exit;
    } else {
        echo "Gagal menyimpan data: " . $koneksi->error;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <title>Beli Produk - <?php echo htmlspecialchars($produk['nama_produk']); ?></title>
  <style>
    body { font-family: Arial, sans-serif; background: #f1f3f6; padding: 30px; }
    .form-container {
      background: white;
      max-width: 400px;
      margin: auto;
      padding: 20px;
      border-radius: 12px;
      box-shadow: 0 4px 10px rgba(0,0,0,0.1);
    }
    h2 { text-align: center; }
    label {
      display: block;
      margin-top: 15px;
      font-weight: bold;
    }
    input[type=text], textarea, input[type=number], select {
      width: 100%;
      padding: 8px;
      margin-top: 5px;
      border-radius: 6px;
      border: 1px solid #ccc;
    }
    button {
      margin-top: 20px;
      background: #28a745;
      color: white;
      border: none;
      padding: 10px;
      width: 100%;
      border-radius: 6px;
      font-weight: bold;
      cursor: pointer;
    }
    button:hover {
      background: #1e7e34;
    }
    .back-link {
      text-align: center;
      margin-top: 15px;
    }
    .back-link a {
      color: #007bff;
      text-decoration: none;
    }
  </style>
</head>
<body>

<div class="form-container">
  <h2>Beli: <?php echo htmlspecialchars($produk['nama_produk']); ?></h2>

  <form method="POST" action="">
    <label for="nama">Nama Pembeli:</label>
    <input type="text" id="nama" name="nama" required>

    <label for="alamat">Alamat:</label>
    <textarea id="alamat" name="alamat" rows="3" required></textarea>

    <label for="jumlah">Jumlah:</label>
    <input type="number" id="jumlah" name="jumlah" min="1" value="1" required>

    <label for="ukuran">Ukuran:</label>
    <select id="ukuran" name="ukuran" required>
      <option value="">-- Pilih Ukuran --</option>
      <option value="S">S</option>
      <option value="M">M</option>
      <option value="L">L</option>
      <option value="XL">XL</option>
    </select>

    <button type="submit">Konfirmasi Pembelian</button>
  </form>

  <div class="back-link">
    <a href="produk.php">Kembali ke Produk</a>
  </div>
</div>

</body>
</html>
