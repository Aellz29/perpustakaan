
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                  <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <?php
                      if ($_SESSION['user']['level'] == 'peminjam') {
                    ?>
                    <a href="index.php?page=ulasan-tambah" class="btn btn-primary mb-3">+ Tambah Data</a> 
                    <?php
                        }
                    ?>
                    
                    <?php
                      if ($_SESSION['user']['level'] == 'peminjam') {
                    ?>
                    <div class="card mb-4">
                        <div class="card-header">
                            <b><p>Anda tidak bisa melakukan aksi, sebelum menambahkan ulasan</p></b>
                        </div>
                    </div>
                    <?php
                        }
                    ?>
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Ulasan</h6>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Username</th>
                                            <th>Buku</th>
                                            <th>Ulasan</th>
                                            <th>Rating</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php
                                    $i = 1;
                                    $user = isset($_SESSION['user']['userID']) ? $_SESSION['user']['userID'] : null;
                                    $userLevel = isset($_SESSION['user']['level']) ? $_SESSION['user']['level'] : null;
                                    $query = mysqli_query($koneksi, "SELECT*FROM ulasanbuku LEFT JOIN user ON user.userID=ulasanbuku.userID LEFT JOIN buku ON buku.bukuID=ulasanbuku.bukuID");
                                    while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <td scope="row"><?php echo $i++; ?></td>
                                            <td><?php echo $data['username']; ?></td>
                                            <td><?php echo $data['judul']; ?></td>
                                            <td><?php echo $data['ulasan']; ?></td>
                                            <td><?php echo $data['rating']; ?></td>
                                            <td>
                                                <?php
                                                if ($user !== null) {
                                                   if ($data['userID'] == $user) {
                                                ?>
                                                <a class="btn btn-success" href="?page=ulasan-ubah&id=<?php echo $data['ulasanID']; ?>"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a onclick="return confirm('Yakin Hapus?')" class="btn btn-danger" href="?page=ulasan-hapus&id=<?php echo $data['ulasanID']; ?>"><i class="fa-solid fa-trash"></i></a>
                                                
                                                <?php
                                                   }elseif ($userLevel !== 'peminjam') {
                                                ?>

                                                <a onclick="return confirm('Yakin Hapus?')" class="btn btn-danger" href="?page=ulasan-hapus&id=<?php echo $data['ulasanID']; ?>"><i class="fa-solid fa-trash"></i></a>
                                                <?php
                                                }
                                            }
                                            ?>

                                            </td>
                                            
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

           