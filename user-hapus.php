<?php
$id = 
$_GET['id'];
$query = mysqli_query($koneksi, "DELETE FROM user WHERE userID='$id'");

if ($query) {
    echo '<script>alert("DATA BERHASIL DI HAPUS"); location.href="index.php?page=user";</script>';
} else {
    echo '<script>alert("DATA GAGAL DIHAPUS"); location.href="index.php?page=user";</script>';
}

?>