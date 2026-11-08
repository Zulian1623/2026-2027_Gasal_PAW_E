<?php
include 'koneksi.php';

$transaksi_id = isset($_GET['id']) ? (int)$_GET['id'] : 1;
$pesan = "";

if (isset($_POST['tambah_detail'])) {
    $barang_id = (int)$_POST['barang_id'];
    $qty = (int)$_POST['qty'];

    $q_harga = mysqli_query($koneksi, "SELECT harga FROM barang WHERE id = '$barang_id'");
    $dt_harga = mysqli_fetch_assoc($q_harga);
    $harga = $dt_harga['harga'];

    $insert = mysqli_query($koneksi, "INSERT INTO transaksi_detail (transaksi_id, barang_id, harga, qty) 
                                      VALUES ('$transaksi_id', '$barang_id', '$harga', '$qty')");

    if ($insert) {
        $q_sum = mysqli_query($koneksi, "SELECT SUM(harga * qty) AS total_baru FROM transaksi_detail WHERE transaksi_id = '$transaksi_id'");
        $d_sum = mysqli_fetch_assoc($q_sum);
        $total_baru = $d_sum['total_baru'] ?? 0;

        mysqli_query($koneksi, "UPDATE transaksi SET total = '$total_baru' WHERE id = '$transaksi_id'");
        
        $pesan = "<p style='color:green;'>Detail tersimpan dan Total Transaksi berhasil diperbarui!</p>";
    } else {
        $pesan = "<p style='color:red;'>Gagal menyimpan detail transaksi!</p>";
    }
}

$q_master = mysqli_query($koneksi, "SELECT t.*, p.nama AS nama_pelanggan 
                                     FROM transaksi t 
                                     LEFT JOIN pelanggan p ON t.pelanggan_id = p.id 
                                     WHERE t.id = '$transaksi_id'");
$master = mysqli_fetch_assoc($q_master);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Soal 4 - Auto Update Total Transaksi</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        .card { border: 1px solid #ccc; padding: 15px; border-radius: 5px; margin-bottom: 20px; background: #eef7ff; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #17a2b8; color: white; }
    </style>
</head>
<body>

    <?= $pesan ?>

    <div class="card">
        <h3>Header Transaksi #<?= $master['id'] ?></h3>
        <p><strong>Tanggal:</strong> <?= $master['waktu_transaksi'] ?></p>
        <p><strong>Pelanggan:</strong> <?= $master['nama_pelanggan'] ?></p>
        <h3 style="color:#d9534f;">Total Transaksi (Real-time): Rp <?= number_format($master['total'], 0, ',', '.') ?></h3>
    </div>

    <div class="card">
        <h4>Tambah Barang Baru</h4>
        <form method="POST" action="">
            <label>Barang:</label>
            <select name="barang_id" required>
                <option value="">-- Pilih Barang --</option>
                <?php
                $q_barang = mysqli_query($koneksi, "SELECT * FROM barang");
                while ($b = mysqli_fetch_assoc($q_barang)) {
                    echo "<option value='{$b['id']}'>{$b['nama_barang']} - Rp {$b['harga']}</option>";
                }
                ?>
            </select>

            <label>Qty:</label>
            <input type="number" name="qty" min="1" value="1" required>

            <button type="submit" name="tambah_detail">Tambah & Update Total</button>
        </form>
    </div>

    <h3>Rincian Barang Terdaftar</h3>
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Barang</th>
                <th>Harga Satuan</th>
                <th>Qty</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $q_detail = mysqli_query($koneksi, "SELECT td.*, b.nama_barang 
                                                 FROM transaksi_detail td 
                                                 JOIN barang b ON td.barang_id = b.id 
                                                 WHERE td.transaksi_id = '$transaksi_id'");
            $no = 1;
            while ($d = mysqli_fetch_assoc($q_detail)) {
                $subtotal = $d['harga'] * $d['qty'];
                echo "<tr>
                        <td>{$no}</td>
                        <td>{$d['nama_barang']}</td>
                        <td>Rp " . number_format($d['harga'], 0, ',', '.') . "</td>
                        <td>{$d['qty']}</td>
                        <td>Rp " . number_format($subtotal, 0, ',', '.') . "</td>
                      </tr>";
                $no++;
            }
            ?>
        </tbody>
    </table>

</body>
</html>