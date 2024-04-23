<?php
if (isset($_SESSION['user']['userID'])) {
    $id_self = $_SESSION['user']['userID'];
}else {
    $id_self = null;
}

if (isset($_POST['favorite'])) {
    $id = $_POST['id'];

    if ($id_self !== null) {
        $query = mysqli_query($koneksi, "INSERT INTO koleksipribadi SET bukuID='$id', userID='$id_self'");
    if (!$query) {
        echo '<script>alert("Favorite Buku Gagal ditambahkan");</script>';
    }
    }else {
        echo '<script>alert("Anda harus login untuk menambahkan buku favorite");</script>';
    }
}

if (isset($_POST['un_favorite'])) {
    $id = $_POST['id'];

    if ($id_self !== null) {
        $query = mysqli_query($koneksi, "DELETE FROM koleksipribadi WHERE bukuID='$id' AND userID='$id_self'");
        if (!$query) {
            echo '<script>alert("Menghilangkan Buku Favorite Gagal");</script>';
        }
    }else {
        echo '<script>alert("Anda harus login untuk menghapus buku favorite");</script>';
    }
}
?>
               
                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <?php
                        if ($_SESSION['user']['level'] != 'peminjam') {
                    ?>
                    <a href="index.php?page=buku-tambah" class="btn btn-primary mb-3">+ Tambah Data</a> 
                    <?php
                        }
                    ?>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"> Tabel Buku</h6>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Foto</th>
                                            <th>Judul</th>
                                            <th>Kategori</th>
                                            <th>Penulis</th>
                                            <th>Penerbit</th>
                                            <th>Tahun Terbit</th>
                                            <?php
                                                if ($_SESSION['user']['level'] == 'peminjam') {
                                            ?>
                                            <th>Koleksi</th>
                                            <?php
                                                }
                                            ?>
                                            <?php
                                                if ($_SESSION['user']['level'] != 'peminjam') {
                                            ?>
                                            <th>Aksi</th>
                                            <?php
                                                }
                                            ?>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php
                                    // fungsi untuk menampilkan data pada tabel buku
                                    $i = 1;
                                    $query = mysqli_query($koneksi, "SELECT buku.*, kategoribuku.* FROM buku LEFT JOIN kategoribuku_relasi ON buku.bukuID = kategoribuku_relasi.bukuID 
                                    LEFT JOIN kategoribuku ON kategoribuku_relasi.kategoriID = kategoribuku.kategoriID");
                                    while ($data = mysqli_fetch_array($query)) {
                                    $buku = $data['bukuID'];
                                    ?>
                                        <tr>
                                            <td scope="row"><?php echo $i++; ?></td>
                                            <td><img src="foto/<?php echo $data['foto']; ?>" width="100" ></td>
                                            <td><?php echo $data['judul']; ?></td>
                                            <td><?php echo $data['namaKategori']; ?></td>
                                            <td><?php echo $data['penulis']; ?></td>
                                            <td><?php echo $data['penerbit']; ?></td>
                                            <td><?php echo $data['tahunTerbit']; ?></td>
                                            <?php
                                                if ($_SESSION['user']['level'] == 'peminjam') {
                                            ?>
                                            <td class="text-center">
                                                <div class="d-flex px-2 py-1">
                                                    <?php
                                                    $cek_koleksi = mysqli_query($koneksi, "SELECT*FROM  koleksipribadi WHERE userID='$id_self' AND bukuID='$buku'");
                                                    $koleksi = mysqli_num_rows($cek_koleksi);
                                                    ?>
                                                <form method="post">
                                                    <input type="hidden" name="id" value="<?= $data['bukuID']; ?>">
                                                    <button type="submit" class="background-color: transparent;" name="<?= ($koleksi != 0 ? 'un_favorite' : 'favorite')?>">
                                                    <div class="imageBox">
                                                        <div class="imageInn">
                                                            <i class="fa-<?= ($koleksi != 0 ? 'solid' : 'regular') ?> fa-bookmark"></i>
                                                        </div>
                                                    </div>
                                                </button>
                                                </form>
                                                </div>
                                            </td>
                                            <?php
                                            }
                                            if ($_SESSION['user']['level'] != 'peminjam') {
                                            ?>
                                            
                                            <td>
                                                <a class="btn btn-success" href="?page=buku-ubah&id=<?php echo $data['bukuID']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a onclick="return confirm('Yakin Hapus?')" class="btn btn-danger" href="?page=buku-hapus&id=<?php echo $data['bukuID']; ?>"><i class="fa-solid fa-trash"></i></a>
                                            </td>
                                            <?php
                                                }
                                            ?>
                                        </tr>
                                    <?php
                                    }
                                    ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

           