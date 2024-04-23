
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Koleksi</h6>
                            
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>username</th>
                                            <th>Buku</th>
                                            <th>Penerbit</th>
                                            <th>Penulis</th>
                                            <th>Aksi</th>
                                            <?php
                                            $where = "WHERE koleksipribadi.userID=" . $_SESSION['user']['userID'];
                                            ?>
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    <?php
                                    $i = 1;
                                    $query = mysqli_query($koneksi, "SELECT*FROM koleksipribadi LEFT JOIN user ON user.userID = koleksipribadi.userID LEFT JOIN buku ON buku.bukuID=koleksipribadi.bukuID $where");
                                    while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                        <tr>
                                            <td scope="row"><?php echo $i++; ?></td>
                                            <td><?php echo $data['username']; ?></td>
                                            <td><?php echo $data['judul']; ?></td>
                                            <td><?php echo $data['penerbit']; ?></td>
                                            <td><?php echo $data['penulis']; ?></td>
                                            <td>
                                                <a onclick="return confirm('Yakin Hapus?')" class="btn btn-danger" href="?page=koleksi-hapus&id=<?php echo $data['koleksiID']; ?>"><i class="fa-solid fa-trash"></i></a>
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

           