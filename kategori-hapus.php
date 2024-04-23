<?php
// fungsi untuk hapus data
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM kategoribuku WHERE kategoriID='$id'");

if ($query) {
    echo '<script>alert("DATA BERHASIL DI HAPUS"); location.href="index.php?page=kategori";</script>';
} else {
    echo '<script>alert("DATA GAGAL DIHAPUS"); location.href="index.php?page=kategori";</script>';
}

?>