<?php
if (isset($_POST['bsimpan'])) {
    $namaKategori = $_POST['namaKategori'];
    
    $query = mysqli_query($koneksi, "INSERT INTO kategoribuku(namaKategori) VALUES ('$namaKategori')");

    
    if ($query) {
        echo '<script>alert("Tambah Kategori Berhasil"); location.href="index.php?page=kategori";</script>';
    }else {
        echo '<script>alert("Tambah Kategori Gagal"); location.href="index.php?page=kategori";</script>';
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
                    <a href="?page=kategori" class="btn btn-primary" style="margin-bottom:1rem; margin-top:1rem;">Kembali</a>
                    
                    
                    <form method="post">
                        <table class="table">
                            <tr>
                                <td width="200">Nama Kategori</td>
                                <td width="1">:</td>
                                <td><input type="text" class="form-control" name="namaKategori" required></td>
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

