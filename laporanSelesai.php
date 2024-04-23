<?php
// Check if 'id' is set in the URL
if (isset($_GET['id'])) {
    // Get the id from the URL
    $id = $_GET['id'];

    // Perform the update query
    $query = mysqli_query($koneksi, "UPDATE peminjaman SET statusPeminjaman='dikembalikan' WHERE peminjamanID='$id'");

    // Check if the query was successful
    if ($query) {
        // If successful, show alert and redirect to datapinjam page
        echo '<script>alert("Buku Dikembalikan"); window.location.href="index.php?page=datapinjam";</script>';
        exit; // Exit to prevent further execution
    } else {
        // If query fails, show alert and redirect to datapinjam page
        echo '<script>alert("Gagal memperbarui status peminjaman"); window.location.href="index.php?page=datapinjam";</script>';
        exit; // Exit to prevent further execution
    }
} else {
    // If 'id' is not set in the URL, handle accordingly (e.g., redirect back to datapinjam or show an error message)
    echo '<script>alert("ID tidak tersedia"); window.location.href="index.php?page=datapinjam";</script>';
    exit; // Exit to prevent further execution
}
?>