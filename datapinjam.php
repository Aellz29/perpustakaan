 <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
                    <a href="cetak.php" class="btn btn-primary mb-3"><i class="fa-solid fa-print"></i></a> 
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Tabel Data Pinjam</h6>
                            
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
                                            <th>status Peminjaman</th>
                                        </tr>
                                    </thead>
                                  
                                    <tbody>
                                    <?php
                                    $i = 1;
                                    $query = mysqli_query($koneksi, "SELECT*FROM peminjaman LEFT JOIN user ON user.userID=peminjaman.userID LEFT JOIN buku ON buku.bukuID=peminjaman.bukuID");
                                    while ($data = mysqli_fetch_array($query)) {
                                    ?>
                                   
                                    <tr>
                                        <td scope = "row"><?php echo $i++; ?></td>
                                        <td><?php echo $data['username']; ?></td>
                                        <td><?php echo $data['judul']; ?></td>
                                        <td><?php echo $data['tanggalPeminjaman']; ?></td>
                                        <td><?php echo $data['tanggalPengembalian']; ?></td>
                                        <td><?php echo $data['jml_pinjam']; ?></td>
                                        <td><?php echo $data['statusPeminjaman']; ?>
                                       
                                       <?php
                                        if ($data['statusPeminjaman'] == 'dipinjam') {
                                            echo '<a href="?page=laporanSelesai&id=' . $data['peminjamanID'] . '" class="btn btn-success"><i class="fas fa-check"></i></a>';
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


             