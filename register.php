<?php
include 'koneksi.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Register</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-2"></div>
                    <div class="col-lg-8">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Registrasi</h1>
                            </div>

                            <?php

                            // Fungsi untuk register
                            if (isset($_POST['bsimpan'])) {
                                $namaLengkap = $_POST['namaLengkap'];
                                $username = $_POST['username'];
                                $email = $_POST['email'];
                                $alamat = $_POST['alamat'];
                                $password = md5($_POST['password']);
                                $level = $_POST['level'];

                                $insert_query = mysqli_query($koneksi, "INSERT INTO user(namaLengkap, username, email, alamat, password, level) VALUES ('$namaLengkap', '$username', '$email', '$alamat', '$password', '$level')");

                                if ($insert_query) {
                                    echo '<script>alert("berhasil Register, Silakan Login"); location.href="login.php";</script>';
                                }else{
                                    echo '<script>alert("Gagal Register, Silakan coba lagi");</script>';
                                }

                            }
                            ?>
                            <form method="post">
                                <div class="form-group">
                                    <input type="text" name="namaLengkap" class="form-control form-control-user" id="namaLengkap"
                                        placeholder="nama Lengkap">
                                </div>
                                <div class="form-group">
                                    <input type="text" name="username" class="form-control form-control-user" id="username"
                                        placeholder="username">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control form-control-user" id="email"
                                        placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <textarea name="alamat" class="form-control form-control-user" cols="10" rows="5" id="email"
                                        placeholder="Alamat"></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="password" name="password" class="form-control form-control-user" id="password"
                                        placeholder="Password">
                                </div>
                                <div class="form-group">
                                   <select name="level" class="form-select form-control form-control-user">
                                    <option value="">Level</option>
                                    <option value="admin">Admin</option>
                                    <option value="peminjam">Peminjam</option>
                                   </select>
                                </div>
                                <button type="submit" name="bsimpan" class="btn btn-primary btn-user btn-block">Register</button>
                                <hr>
                            </form>
                            <div class="text-center">
                            </div>
                            <div class="text-center">
                                <a class="small" href="login.php">Already have an account? Login!</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>

</body>

</html>