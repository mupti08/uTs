<?php
include 'koneksi.php';

$id = ''; $nama_produk = ''; $harga = ''; $stok = ''; $foto_lama = '';
$is_edit = false;

if (isset($_GET['id'])) {
    $is_edit = true;
    $id = $_GET['id'];
    $query = mysqli_query($koneksi, "SELECT * FROM produk WHERE id='$id'");
    $data = mysqli_fetch_assoc($query);
    $nama_produk = $data['nama_produk'];
    $harga = $data['harga'];
    $stok = $data['stok'];
    $foto_lama = $data['foto'];
}

if (isset($_POST['submit'])) {
    $nama_post = $_POST['nama_produk'];
    $harga_post = $_POST['harga'];
    $stok_post = $_POST['stok'];

    $nama_file = $_FILES['foto']['name'];
    $ukuran_file = $_FILES['foto']['size'];
    $tmp_file = $_FILES['foto']['tmp_name'];
    $ext_allowed = array('jpg', 'jpeg', 'png');
    $x = explode('.', $nama_file);
    $ekstensi = strtolower(end($x));
    
    $foto_baru = time() . '-' . uniqid() . '.' . $ekstensi; 
    if ($nama_file != "") {
        if (in_array($ekstensi, $ext_allowed) === true) {
            if ($ukuran_file <= 2097152) { // Max 2 MB
                move_uploaded_file($tmp_file, 'uploads/' . $foto_baru);
                
                if ($is_edit) {
                    if (is_file("uploads/".$foto_lama)) unlink("uploads/".$foto_lama);
                    $q = "UPDATE produk SET nama_produk='$nama_post', harga='$harga_post', stok='$stok_post', foto='$foto_baru' WHERE id='$id'";
                } else {
                    $q = "INSERT INTO produk (nama_produk, harga, stok, foto) VALUES ('$nama_post', '$harga_post', '$stok_post', '$foto_baru')";
                }
            } else {
                echo "<script>alert('Ukuran file terlalu besar (Max 2MB).');</script>";
            }
        } else {
            echo "<script>alert('Ekstensi file tidak diperbolehkan.');</script>";
        }
    } else {
        if ($is_edit) {
            $q = "UPDATE produk SET nama_produk='$nama_post', harga='$harga_post', stok='$stok_post' WHERE id='$id'";
        } else {
            echo "<script>alert('Foto wajib diisi untuk produk baru!');</script>";
        }
    }
    
    if (isset($q) && mysqli_query($koneksi, $q)) {
        echo "<script>alert('Data produk berhasil disimpan!'); window.location='index.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title><?= $is_edit ? 'Edit' : 'Tambah'; ?> Data Produk</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h2><?= $is_edit ? 'Edit' : 'Tambah'; ?> Data Produk</h2>
    
    <form action="" method="POST" enctype="multipart/form-data" onsubmit="return validasiForm(<?= $is_edit ? 'true' : 'false' ?>)">
        <p>
            <label>Nama Produk:</label><br>
            <input type="text" name="nama_produk" id="nama_produk" value="<?= $nama_produk; ?>" required>
        </p>
        <p>
            <label>Harga (Rp):</label><br>
            <input type="number" name="harga" id="harga" value="<?= $harga; ?>" min="0" required>
        </p>
        <p>
            <label>Stok:</label><br>
            <input type="number" name="stok" id="stok" value="<?= $stok; ?>" min="0" required>
        </p>
        <p>
            <label>Foto (Max 2MB, jpg/jpeg/png):</label><br>
            <?php if($is_edit) echo "<img src='uploads/$foto_lama' width='80'><br>"; ?>
            <input type="file" name="foto" id="foto" accept=".jpg, .jpeg, .png">
        </p>
        <button type="submit" name="submit">Simpan</button>
        <a href="index.php">Batal</a>
    </form>

    <script src="script.js"></script>
</body>
</html>