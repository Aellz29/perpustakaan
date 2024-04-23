<?php
if (isset($_POST['bsimpan'])) {
    $bukuID = $_POST['bukuID'];
    $userID = $_SESSION['user']['userID'];
    $tanggalPeminjaman = date('Y-m-d h:i:s');
    $tanggalPengembalian = $_POST['tanggalPengembalian'];
    $jml_pinjam = $_POST['jml_pinjam'];
    
    if (strtotime($tanggalPengembalian) < strtotime($tanggalPeminjaman)) {
        echo '<script>alert("Tanggal Pengembalian Tidak Bisa Lebih dari Tanggal Peminjaman"); location.href="index.php?page=pinjambuku";</script>';
        exit;
    }
    $query = mysqli_query($koneksi, "INSERT INTO peminjaman(bukuID, userID, tanggalPeminjaman, tanggalPengembalian, jml_pinjam) VALUES ('$bukuID', '$userID', '$tanggalPeminjaman', '$tanggalPengembalian', '$jml_pinjam')");

    
    if ($query) {
        echo '<script>alert("Peminjaman Berhasil"); location.href="index.php?page=peminjaman";</script>';
    }else {
        echo '<script>alert("Peminjaman Gagal"); location.href="index.php?page=peminjaman";</script>';
    }
}
?>


<div class="content-wrapper" style="margin-top:10rem;">
    <div  style="margin-top: -5rem; width:61rem;">
    
    <div class="row">
		<div class="col-12">
		<div class="card" style="margin-bottom: 1rem; margin-left:14rem; width:50rem;">
				<div class="card-body">
                    <h4 class="card-title">Tambah Data</h4>             
                    <a href="?page=peminjaman" class="btn btn-primary" style="margin-bottom:1rem; margin-top:1rem;">Kembali</a>
                    
                    
                    <form method="post">
                        <table class="table">
                            <tr>
                                <select class="form-select form-control" name="bukuID" required style="margin-bottom:0.5rem;"> 
                                <option value="">Buku</option>
                                <?php
                                $buk = mysqli_query($koneksi, "SELECT*FROM buku");
                                while ($buku = mysqli_fetch_array($buk)) {
                                ?>
                                <option value="<?php echo $buku['bukuID']; ?>"><?php echo $buku['judul']; ?></option>
                                <?php
                                    }
                                ?>
                                    
                                </select>
                                </tr>
                                <tr>
                                <select class="form-select form-control" name="jml_pinjam" required>
                                <option value="">Jumlah Pinjam</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                               </select>
                            </tr>
                            <tr>
                                <td width="200">Tanggal Pengembalian</td>
                                <td width="1">:</td>
                                <td><input type="date" class="form-control" name="tanggalPengembalian" required></td>
                            </tr>
                            <tr>
                            
                            <tr>
                                <td></td>
                                <td></td>
                                <td><button class="btn btn-success" type="submit" name="bsimpan">Simpan</button></td>
                            </tr>
                            
                        </table>
                    </form>
				</div>
			</div>
		</div>
	</div>

