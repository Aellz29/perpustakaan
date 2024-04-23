<?php
$id = $_GET['id'];

// Ambil nama file gambar yang akan dihapus
$query_get_filename = mysqli_query($koneksi, "SELECT foto FROM buku WHERE bukuID = $id");
$row = mysqli_fetch_assoc($query_get_filename);
$filename = $row['foto'];

// Hapus entri dari database
$query_delete = mysqli_query($koneksi, "DELETE FROM buku WHERE bukuID = $id");

if ($query_delete) {
    // Hapus gambar dari direktori jika entri berhasil dihapus dari database
    $file_path = "foto/" . $filename;
    if (file_exists($file_path)) {
        unlink($file_path);
    }

    echo '<script>alert("DATA BERHASIL DI HAPUS"); location.href="index.php?page=buku";</script>';
} else {
    echo '<script>alert("DATA GAGAL DIHAPUS"); location.href="index.php?page=buku";</script>';
}
?>