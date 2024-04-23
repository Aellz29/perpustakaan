<?php

// fungsi untuk ubah data
$id = $_GET['id'];

if (isset($_POST['bubah'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);
    $email = $_POST['email'];
    $namaLengkap = $_POST['namaLengkap'];
    $alamat = $_POST['alamat'];
    $level = $_POST['level'];

    if ($_POST['password'] != "") {
    $query = mysqli_query($koneksi, "UPDATE user SET username='$username', password='$password', email='$email', namaLengkap='$namaLengkap', alamat='$alamat', level='$level' WHERE userID=$id");

        if ($query) {
            echo "<script>alert('Ubah data berhasil');document.location='index.php?page=user';</script>";
        } else {
            echo "<script>alert('Ubah data gagal');document.location='index.php?page=user';</script>";
        }
    }else {
        $query = mysqli_query($koneksi, "UPDATE user SET username='$username', email='$email', namaLengkap='$namaLengkap', alamat='$alamat', level='$level' WHERE userID=$id");
        if ($query) {
            echo "<script>alert('Ubah data berhasil');document.location='index.php?page=user';</script>";
        } else {
            echo "<script>alert('Ubah data gagal');document.location='index.php?page=user-tambah';</script>";
        }
    }
}
$query = mysqli_query($koneksi, "SELECT*FROM user WHERE userID=$id");
$data = mysqli_fetch_array($query);
?>

<div class="content-wrapper" style="margin-top:10rem;">
    <div  style="margin-top: -5rem; width:61rem;">
    
    <div class="row">
		<div class="col-12">
		<div class="card" style="margin-bottom: 1rem; margin-left:14rem; width:50rem;">
				<div class="card-body">
                    <h4 class="card-title">Ubah Data</h4>             
                    <a href="?page=user" class="btn btn-primary" style="margin-bottom:1rem; margin-top:1rem;">Kembali</a>
                    
                    
                    <form method="post">
                        <table class="table">
                            <tr>
                                <td width="200">Nama User</td>
                                <td width="1">:</td>
                                <td><input type="text" class="form-control" name="username" value="<?php echo $data['username']; ?>"></td>
                            </tr>
                            <tr>
                                <td width="200">Password</td>
                                <td width="1">:</td>
                                <td><input type="password" class="form-control" placeholder="Password" name="password"></td>
                            </tr>
                            <tr>
                                <td width="200">Email</td>
                                <td width="1">:</td>
                                <td><input type="email" class="form-control" name="email" value="<?php echo $data['email']; ?>"></td>
                            </tr>
                            <tr>
                                <td width="200">Nama Lengkap</td>
                                <td width="1">:</td>
                                <td><input type="text" class="form-control" name="namaLengkap" value="<?php echo $data['namaLengkap']; ?>"></td>
                            </tr>
                            <tr>
                                <td width="200">alamat</td>
                                <td width="1">:</td>
                                <td><textarea class="form-control" name="alamat" cols="5" rows="5" required><?php echo $data['alamat'];?></textarea></td>
                            </tr>
                            <tr>
                                <td width="200">Level</td>
                                <td width="1">:</td>
                                <td>
                                    <select name="level" class="form-select form-control">
                                        <option value="admin" <?php if($data['level'] == 'admin') echo 'selected'; ?>>Admin</option>
                                        <option value="petugas" <?php if($data['level'] == 'petugas') echo 'selected'; ?>>Petugas</option>
                                        <option value="peminjam" <?php if($data['level'] == 'peminjam') echo 'selected'; ?>>Peminjam</option>
                                    </select>
                                </td>
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

