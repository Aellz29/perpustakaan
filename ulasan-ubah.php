<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT*FROM ulasanbuku WHERE ulasanID = $id"); 
$data = mysqli_fetch_array($query);

if (isset($_POST['bubah'])) {
    $userID = $_SESSION['user']['userID'];
    $bukuID = $_POST['bukuID'];
    $ulasan = $_POST['ulasan'];
    $rating = $_POST['rating'];

    $query = mysqli_query($koneksi, "UPDATE ulasanbuku SET bukuID='$bukuID', ulasan='$ulasan', rating='$rating' WHERE ulasanID='$id'");

    if ($query) {
      echo "<script>alert('Ubah data berhasil'); document.location='index.php?page=ulasan';</script>";
  } else {
      echo "<script>alert('Ubah data gagal'); document.location='index.php?page=ulasan';</script>";
  }

 
}
?>


<div class="content-wrapper" style="margin-left:18rem; margin-top:10rem;">
    <div  style="margin-top: -5rem; width:61rem;">
    
    <div class="row">
		<div class="col-12">
		<div class="card" style="margin-bottom: 1rem;">
				<div class="card-body">
                    <h4 class="card-title">Ubah Data</h4>             
                    <a href="?page=ulasan" class="btn btn-primary" style="margin-bottom:1rem; margin-top:1rem;">Kembali</a>
                    
                    
                    <form method="post">
                        <table class="table">
                        <input type="hidden" name="ulasanID" value="<?php echo $data['ulasanID']; ?>">
                            <tr>
                                <select class="form-select form-control" name="bukuID" style="margin-bottom:0.5rem;"> 
                                    <option value="">Buku</option>
                                    <?php
                                        $buk = mysqli_query($koneksi, "SELECT*FROM buku");
                                        while ($buku = mysqli_fetch_array($buk)) {
                                    ?>
                                        <option <?php if($data['bukuID'] == $buku['bukuID']) echo 'selected'; ?> value="<?php echo $buku['bukuID']; ?>"><?php echo $buku['judul']; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </tr>
                                
                            <tr>
                                <td width="200">Ulasan</td>
                                <td width="1">:</td>
                                <td><input type="text" class="form-control" name="ulasan" value="<?php echo $data['ulasan']; ?>"></td>
                            </tr>

                            <tr>
                                <select class="form-select form-control" name="rating" required>
                                    <option value="">Rating</option>
                                    <?php
                                    for ($i=1; $i <=10; $i++) { 
                                    ?>
                                    <option <?php if($data['rating'] == $i) echo 'selected'; ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </tr>
                            <tr>
                                <td></td>
                                <td></td>
                                <td><button class="btn btn-success" type="submit" name="bubah">Simpan</button></td>
                            </tr>
                        </table>
                    </form>
				</div>
			</div>
		</div>
	</div>
    </div>
</div>

                       
