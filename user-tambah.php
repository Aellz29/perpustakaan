<?php
if (isset($_POST['bsimpan'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    $namaLengkap = $_POST['namaLengkap'];
    $alamat = $_POST['alamat'];
    $level = $_POST['level'];
    
    $query = mysqli_query($koneksi, "INSERT INTO user (username,password,email,namaLengkap,alamat,level) VALUES ('$username','$password','$email','$namaLengkap','$alamat','$level')");

    
    if ($query) {
        echo '<script>alert("Tambah User Berhasil"); location.href="index.php?page=user";</script>';
    }else {
        echo '<script>alert("Tambah User Gagal"); location.href="index.php?page=user";</script>';
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
                    <a href="?page=user" class="btn btn-primary" style="margin-bottom:1rem; margin-top:1rem;">Kembali</a>
                    
                    
                    <form method="post">
                        <table class="table">
                            <tr>
                                <td width="200">Username</td>
                                <td width="1">:</td>
                                <td><input type="text" class="form-control" name="username" required></td>
                            </tr>
                            <tr>
                                <td width="200">Password</td>
                                <td width="1">:</td>
                                <td><input type="password" class="form-control" name="password" required></td>
                            </tr>
                            <tr>
                                <td width="200">Email</td>
                                <td width="1">:</td>
                                <td><input type="email" class="form-control" name="email" required></td>
                            </tr>
                            <tr>
                                <td width="200">Nama Lengkap</td>
                                <td width="1">:</td>
                                <td><input type="text" class="form-control" name="namaLengkap" required></td>
                            </tr>
                            <tr>
                                <td width="200">alamat</td>
                                <td width="1">:</td>
                                <td><textarea class="form-control" name="alamat" cols="5" rows="5" required></textarea></td>
                            </tr>
                            <tr>
                                <td width="200">Level</td>
                                <td width="1">:</td>
                                <td>
                                    <select name="level" class="form-select form-control">
                                        <option value="admin">Admin</option>
                                        <option value="petugas">Petugas</option>
                                        <option value="peminjam">peminjam</option>
                                    </select>
                                </td>
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

