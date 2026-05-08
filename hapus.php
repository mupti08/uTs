<?php
include 'koneksi.php';

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $query = "SELECT foto FROM produk WHERE id='$id'";
    $result = mysqli_query($koneksi, $query);
    $data = mysqli_fetch_assoc($result);

    if(is_file("uploads/".$data['foto'])){
        unlink("uploads/".$data['foto']);
    }

    $delete = mysqli_query($koneksi, "DELETE FROM produk WHERE id='$id'");
    
    if($delete){
        echo "<script>alert('Produk berhasil dihapus!'); window.location='index.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus produk.'); window.location='index.php';</script>";
    }
}
?>