<?php
$id = $_GET['id'];
$query = mysqli_query($koneksi, "SELECT*FROM buku WHERE bukuID = $id"); 
$data = mysqli_fetch_array($query);

if (isset($_POST['bubah'])) {
    $judul = $_POST['judul'];
    $kategori= $_POST['kategori'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahunterbit = $_POST['tahunTerbit'];

    if (!empty($_FILES['foto']['name'])) {
        // Jika ada, hapus gambar lama
        $old_image_path = "foto/" . $data['foto'];
        if (file_exists($old_image_path)) {
            unlink($old_image_path);
        }
        // Unggah gambar baru
        $foto = $_FILES['foto'];
        $nama_foto = $foto['name'];
        move_uploaded_file($foto['tmp_name'], "foto/" . $nama_foto);
    } else {
        // Jika tidak ada gambar baru, gunakan gambar lama
        $nama_foto = $data['foto'];
    }

    $query = mysqli_query($koneksi, "UPDATE buku SET judul='$judul', penulis='$penulis', penerbit='$penerbit', tahunTerbit='$tahunterbit', foto='$nama_foto' WHERE bukuID='$id'");

    $cek_kategori = mysqli_query($koneksi, "SELECT * FROM kategoribuku_relasi WHERE bukuID='$id'");
    if (mysqli_num_rows($cek_kategori) == 0) {
      $kategori_insert = mysqli_query($koneksi, "INSERT INTO kategoribuku_relasi SET bukuID='$id', kategoriID='$kategori'");
    } else {
      $kategori_delete = mysqli_query($koneksi, "DELETE FROM kategoribuku_relasi WHERE bukuID='$id'");
      if ($kategori_delete) {
        $kategori_insert = mysqli_query($koneksi, "INSERT INTO kategoribuku_relasi SET bukuID='$id', kategoriID='$kategori'");
      }
    }
    if ($query) {
      echo "<script>alert('Ubah data berhasil'); document.location='index.php?page=buku';</script>";
  } else {
      echo "<script>alert('Ubah data gagal'); document.location='index.php?page=buku';</script>";
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
                    <a href="?page=buku" class="btn btn-primary" style="margin-bottom:1rem; margin-top:1rem;">Kembali</a>
                    
                    <form method="post" enctype="multipart/form-data">
                        <table class="table">
                        <input type="hidden" name="bukuID" value="<?php echo $data['bukuID']; ?>">
                            <tr>
                                <select class="form-select form-control" name="kategori" style="width:58.3rem;">
                                <option value="" hidden></option>
                                    <?php
                                    $kategori_query = mysqli_query($koneksi, "SELECT * FROM kategoribuku");

                                    $cek_kategori_edit = mysqli_query($koneksi, "SELECT * FROM kategoribuku_relasi WHERE bukuID='".$data['bukuID']."'");

                                    if (mysqli_num_rows($cek_kategori_edit) > 0) {
                                        $kategori_trigger = true;
                                        $fetch_kategori = mysqli_fetch_array($cek_kategori_edit);
                                    }

                                    while ($kategori = mysqli_fetch_array($kategori_query)) {
                                        ?>
                                        <option value="<?= $kategori['kategoriID'] ?>" <?php if (isset($kategori_trigger)) {echo ($kategori['kategoriID'] == $fetch_kategori['kategoriID'] ? 'selected' : '');} ?>><?= $kategori['namaKategori'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                </tr>
                                <tr>
                            <td>Buku</td>
                            <td>:</td>
                            <td>
                            <img src="foto/<?php echo $data['foto']; ?>" alt="" width="100">
                                <input type="file" name="foto" id="foto" class="form-control">
                            </td>
                        </tr>

                            <tr>
                                <td width="200">Judul</td>
                                <td width="1">:</td>
                                <td><input class="form-control" type="text" name="judul" value="<?php echo $data['judul'];  ?>"></td>
                            </tr>
                            
                            <tr>
                                <td width="200">Penulis</td>
                                <td width="1">:</td>
                                <td><input class="form-control" type="text" name="penulis"  value="<?php echo $data['penulis']; ?>"></td>
                            </tr>
                            <tr>
                                <td width="200">Penerbit</td>
                                <td width="1">:</td>
                                <td><input class="form-control" type="text" name="penerbit"  value="<?php echo $data['penerbit'];  ?>"></td>
                            </tr>
                            <tr>
                                <td width="200">Tahun Terbit</td>
                                <td width="1">:</td>
                                <td><input class="form-control" type="date" name="tahunTerbit"  value="<?php echo $data['tahunTerbit'];  ?>"></td>
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

                       
