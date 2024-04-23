<?php
if (isset($_POST['bsimpan'])) {
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $penerbit = $_POST['penerbit'];
    $tahunterbit = $_POST['tahunTerbit'];

   // Mendapatkan informasi tentang file yang diunggah
   $foto = $_FILES['foto'];
   $nama_foto = $foto['name'];
   $tmp_foto = $foto['tmp_name'];

   // Direktori tempat menyimpan foto
   $upload_directory = "foto/";

   // Pindahkan foto ke direktori yang ditentukan
   if (move_uploaded_file($tmp_foto, $upload_directory . $nama_foto)) {  
       // Jika berhasil diunggah, lakukan penyisipan data ke database

    $query_buku = mysqli_query($koneksi, "INSERT INTO buku(judul, penulis, penerbit, tahunTerbit, foto) VALUES ('$judul', '$penulis', '$penerbit', '$tahunterbit', '$nama_foto')");

    if ($query_buku) {
        $bukuID = mysqli_insert_id($koneksi);

        if ($_POST['kategori'] != "") {
            $kategori = $_POST['kategori'];
            $query_relasi = mysqli_query($koneksi, "INSERT INTO kategoribuku_relasi(kategoriID, bukuID) VALUES ('$kategori', '$bukuID')");

            if ($query_relasi) {
                echo "<script>alert('Tambah data berhasil!'); location.href='index.php?page=buku';</script>";
            } else {
                echo "<script>alert('Tambah data gagal!');</script>";
            }
        } else {
            echo "<script>alert('Tambah data berhasil!'); location.href='index.php?page=buku';</script>";
        }
    } else {
        echo "<script>alert('Tambah data gagal!');</script>";
    }
  }
}
?>



<div class="content-wrapper" style="margin-top:10rem;">
    <div  style="margin-top: -5rem; width:61rem;">
    
    <div class="row">
		<div class="col-12">
		<div class="card" style="margin-bottom: 1rem; margin-left:14rem; width:70rem;">
				<div class="card-body">
                    <h4 class="card-title">Tambah Data</h4>             
                    <a href="?page=buku" class="btn btn-primary" style="margin-bottom:1rem; margin-top:1rem;">Kembali</a>
                    
                    
                    <form method="post" enctype="multipart/form-data">
                        <table class="table">
                            <tr>
                                <select class="form-select form-control" name="kategori" required>
                                <option value="">Kategori</option>
                                    <?php
                                    $kategori_query  = mysqli_query($koneksi, "SELECT * FROM kategoribuku");
                                    while ($kategori = mysqli_fetch_array($kategori_query)) {
                                        ?>
                                        <option value="<?= $kategori['kategoriID'] ?>"><?= $kategori['namaKategori'] ?></option>
                                        <?php
                                    }
                                    ?>
                                </select>
                                </tr>

                                <tr>
                                <td width="200">Buku</td>
                                <td width="1">:</td>
                                <td><input type="file" class="form-control"  name="foto" id="foto" required></td>
                            </tr>
                            <tr>
                                <td width="200">Judul</td>
                                <td width="1">:</td>
                                <td><input class="form-control" type="text" name="judul" required></td>
                            </tr>
                            
                            <tr>
                                <td width="200">Penulis</td>
                                <td width="1">:</td>
                                <td><input class="form-control" type="text" name="penulis" required></td>
                            </tr>
                            <tr>
                                <td width="200">Penerbit</td>
                                <td width="1">:</td>
                                <td><input class="form-control" type="text" name="penerbit" required></td>
                            </tr>
                            <tr>
                                <td width="200">Tahun Terbit</td>
                                <td width="1">:</td>
                                <td><input class="form-control" type="date" name="tahunTerbit" required></td>
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

