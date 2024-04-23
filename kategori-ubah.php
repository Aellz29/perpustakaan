
<?php
// fungsi untuk ubah data
$id = $_GET['id'];
if (isset($_POST['bubah'])) {
    $namaKategori = $_POST['namaKategori'];
    
    $query_ubah = mysqli_query($koneksi, "UPDATE kategoribuku SET namaKategori='$namaKategori' WHERE kategoriID='$id'");

    
    if ($query_ubah) {
        echo '<script>alert("Ubah Kategori Berhasil"); location.href="index.php?page=kategori";</script>';
    }else {
        echo '<script>alert("Ubah Kategori Gagal"); location.href="index.php?page=kategori";</script>';
    }
}
?>


<div class="content-wrapper" style="margin-top:10rem;">
    <div  style="margin-top: -5rem; width:61rem;">
    
    <div class="row">
		<div class="col-12">
		<div class="card" style="margin-bottom: 1rem; margin-left:14rem; width:50rem;">
				<div class="card-body">
                    <h4 class="card-title">Ubah Data</h4>             
                    <a href="?page=kategori" class="btn btn-primary" style="margin-bottom:1rem; margin-top:1rem;">Kembali</a>
                    
                    <?php
                    $query = mysqli_query($koneksi, "SELECT*FROM kategoribuku WHERE kategoriID = '$id'");
                    $data = mysqli_fetch_array($query);
                    ?>
                    <form method="post">
                        <table class="table">
                            <tr>
                                <td width="200">Nama Kategori</td>
                                <td width="1">:</td>
                                <td><input type="text" name="namaKategori" class="form-control" value="<?php echo $data['namaKategori'];  ?>" required></td>
                            </tr>
                            <tr>
                            
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

