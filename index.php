<?php
include 'koneksi.php';
$query = "SELECT * FROM produk ORDER BY id DESC";
$result = mysqli_query($koneksi, $query);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2>Daftar Produk</h2>
    <a href="form.php" class="btn btn-add">+ Tambah Produk</a>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Foto</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Stok</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $no = 1;
            while($row = mysqli_fetch_assoc($result)) { 
            ?>
            <tr>
                <td><?= $no++; ?></td>
                <td><img src="uploads/<?= $row['foto']; ?>" class="thumbnail" alt="Foto Produk"></td>
                <td><?= htmlspecialchars($row['nama_produk']); ?></td>
                <td>Rp <?= number_format($row['harga'], 0, ',', '.'); ?></td>
                <td><?= $row['stok']; ?></td>
                <td>
                    <a href="form.php?id=<?= $row['id']; ?>" class="btn btn-edit">Edit</a>
                    <a href="hapus.php?id=<?= $row['id']; ?>" class="btn btn-delete" onclick="return confirm('Yakin ingin menghapus produk ini?');">Hapus</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>

</body>
</html>