<?php
// fungsi untuk hapus data
$id = $_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM ulasanbuku WHERE ulasanID='$id'");

if ($query) {
    echo '<script>alert("DATA BERHASIL DI HAPUS"); location.href="index.php?page=ulasan";</script>';
} else {
    echo '<script>alert("DATA GAGAL DIHAPUS"); location.href="index.php?page=ulasan";</script>';
}

?>