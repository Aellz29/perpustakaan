<?php
include "koneksi.php";
?>
<center>
<h2>Laporan Peminjaman</h2>
</center>
<table border="1" cellspacing="0" cellpadding="5" width="100%">
    <tr>
        <th>No</th>
        <th>Username</th>
        <th>Buku</th>
        <th>Tanggal Peminjaman</th>
        <th>Tanggal Pengembalian</th>
        <th>Jumlah Pinjam</th>
        <th>Status Peminjaman</th>
    </tr>

    <?php
    // fungsi untuk menampilkan data
    $i =1;
    $query = mysqli_query($koneksi, "SELECT*FROM peminjaman LEFT JOIN user ON user.userID=peminjaman.userID LEFT JOIN buku ON buku.bukuID=peminjaman.bukuID");
    while ($data = mysqli_fetch_array($query)) {
    ?>
    <tr>
        <td scope="row"><?php echo $i++; ?></td>
        <td><?php echo $data['username']; ?></td>
        <td><?php echo $data['judul']; ?></td>
        <td><?php echo $data['tanggalPeminjaman']; ?></td>
        <td><?php echo $data['tanggalPengembalian']; ?></td>
        <td><?php echo $data['jml_pinjam']; ?></td>
        <td><?php echo $data['statusPeminjaman']; ?></td>
    </tr>
    <?php
    }
    ?>
</table>

<script>
window.print();
setTimeout(function(){

}, 1000);
</script>