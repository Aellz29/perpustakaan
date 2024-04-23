  <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <a href="index.php?page=pinjambuku" class="btn btn-primary mb-3">+ Tambah Data</a> 
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Peminjaman</h6>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Buku</th>
                                            <th>Tanggal Peminjaman</th>
                                            <th>Tanggal Pengembalian</th>
                                            <th>Jumlah Pinjam</th>
                                            <th>Status Peminjaman</th>
                                            <th>Aksi</th>
                                            <?php
                                            if(isset($_SESSION['user']) && isset($_SESSION['user']['userID'])) {
                                                // Filter data peminjaman berdasarkan userID pengguna yang sedang login
                                                $userID = $_SESSION['user']['userID'];
                                                $where = "peminjaman.userID = $userID";
                                            ?>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                    // fungsi untuk menampilkan data
                                      $i=1;
                                        $query = mysqli_query($koneksi, "SELECT * FROM peminjaman LEFT JOIN user ON user.userID = peminjaman.userID LEFT JOIN buku ON buku.bukuID = peminjaman.bukuID WHERE $where");
                                      while ($data = mysqli_fetch_array($query)) {
                                    ?>     

                                        <td scope="row"><?php echo $i++; ?></td>
                                        <td><?php echo $data['username']; ?></td>
                                        <td><?php echo $data['judul']; ?></td>
                                        <td><?php echo $data['tanggalPeminjaman']; ?></td>
                                        <td><?php echo $data['tanggalPengembalian']; ?></td>
                                        <td><?php echo $data['jml_pinjam']; ?></td>
                                        <td><?php echo $data['statusPeminjaman']; ?></td>
                                        <td>
                                            <a onclick="return confirm('yakin  hapus?')" class="btn btn-danger" href="?page=peminjaman-hapus&id=<?php echo $data['peminjamanID']?>">
                                            <i class="fa-regular fa-trash-can"></i></a>
                                        </td>
                                    </tr>
                                    
                                    <?php
                                        }
                                    }else {
                                        echo "Silakan Login Terlebih dahulu";
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
