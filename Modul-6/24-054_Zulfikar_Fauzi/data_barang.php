<?php
include 'koneksi.php';

$notif = "";

if (isset($_GET['hapus_id'])) {
    $id_barang = (int)$_GET['hapus_id'];

    $check_relasi = mysqli_query($koneksi, "SELECT COUNT(*) as total FROM transaksi_detail WHERE barang_id = '$id_barang'");
    $dt_check = mysqli_fetch_assoc($check_relasi);

    if ($dt_check['total'] > 0) {
        $notif = "<div style='padding:10px; background-color:#f8d7da; color:#721c24; border:1px solid #f5c6cb; margin-bottom:15px;'>
                    <strong>Gagal Hapus!</strong> Barang tidak boleh dihapus karena masih digunakan dalam data transaksi.
                  </div>";
    } else {
        $delete = mysqli_query($koneksi, "DELETE FROM barang WHERE id = '$id_barang'");
        if ($delete) {
            $notif = "<div style='padding:10px; background-color:#d4edda; color:#155724; border:1px solid #c3e6cb; margin-bottom:15px;'>
                        Data barang berhasil dihapus!
                      </div>";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Soal 3 - Hapus Barang Check Relasi</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #28a745; color: white; }
        .btn-hapus { color: red; text-decoration: none; font-weight: bold; }
    </style>
</head>
<body>

    <?= $notif ?>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Kode Barang</th>
                <th>Nama Barang</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $res = mysqli_query($koneksi, "SELECT * FROM barang");
            while ($row = mysqli_fetch_assoc($res)) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['kode_barang']}</td>
                        <td>{$row['nama_barang']}</td>
                        <td>Rp " . number_format($row['harga'], 0, ',', '.') . "</td>
                        <td>{$row['stok']}</td>
                        <td>
                            <a class='btn-hapus' href='data_barang_soal3.php?hapus_id={$row['id']}' onclick='return confirm(\"Yakin ingin menghapus?\")'>Hapus</a>
                        </td>
                      </tr>";
            }
            ?>
        </tbody>
    </table>

</body>
</html>