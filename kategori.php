
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                  <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <?php
                      if ($_SESSION['user']['level'] != 'peminjam') {
                    ?>
                    <a href="index.php?page=kategori-tambah" class="btn btn-primary mb-3">+ Tambah Data</a> 
                    <?php
                        }
                    ?>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Kategori</h6>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>namaKategori</th>
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
                                    $i = 1;
                                    $query = mysqli_query($koneksi, "SELECT*FROM kategoribuku");
                                    while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <td scope="row"><?php echo $i++; ?></td>
                                            <td><?php echo $data['namaKategori']; ?></td>
                                            <?php
                                                if ($_SESSION['user']['level'] != 'peminjam') {
                                            ?>
                                            <td>
                                                <a class="btn btn-success" href="?page=kategori-ubah&id=<?php echo $data['kategoriID']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a onclick="return confirm('Yakin Hapus?')" class="btn btn-danger" href="?page=kategori-hapus&id=<?php echo $data['kategoriID']; ?>"><i class="fa-solid fa-trash"></i></a>
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

           