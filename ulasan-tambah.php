<?php
// fungsi untuk tambah data
if (isset($_POST['bsimpan'])) {
    $userID = $_SESSION['user']['userID'];
    $bukuID = $_POST['bukuID'];
    $ulasan = $_POST['ulasan'];
    $rating = $_POST['rating'];
    
    $query = mysqli_query($koneksi, "INSERT INTO ulasanbuku(userID, bukuID, ulasan, rating) VALUES ('$userID', '$bukuID', '$ulasan', '$rating')");

    
    if ($query) {
        echo '<script>alert("Tambah Ulasan Berhasil"); location.href="index.php?page=ulasan";</script>';
    }else {
        echo '<script>alert("Tambah Ulasan Gagal"); location.href="index.php?page=ulasan";</script>';
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
                    <a href="?page=ulasan" class="btn btn-primary" style="margin-bottom:1rem; margin-top:1rem;">Kembali</a>
                    
                    
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
                                <td width="200">Ulasan</td>
                                <td width="1">:</td>
                                <td><input type="text" class="form-control" name="ulasan" required></td>
                            </tr>

                            <tr>
                                <select class="form-select form-control" name="rating" required>
                                    <option value="">Rating</option>
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

