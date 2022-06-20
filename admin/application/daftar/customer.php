<div class="col-12 mt-5">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahuser">
    Tambah User Baru
  </button> <br> <br>
  <div class="modal fade" id="tambahuser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah User Baru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post">
            <div class="form-group">
              <label>Username</label>
              <input type="text" name="txtUsername" class="form-control" placeholder="Enter username">
            </div>
            <div class="form-group">
              <label>Password</label>
              <input type="password" name="txtPassword" class="form-control" placeholder="Password">
            </div>
            <div class="form-group">
              <label>Level</label>
              <select name="txtLevel" class="form-control form-control-lg">
                <option disabled="" selected="">Pilih Level</option>
                <option value="pelanggan">Pelanggan</option>
                <option value="produksi">Produksi</option>
                <option value="pemilik">Pemilik</option>
                <option value="admin">Admin</option>
              </select>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" name="btnSimpan" class="btn btn-primary">Simpan</button>
        </div>
          </form>
      </div>
    </div>
  </div>
<div class="card">
<div class="card-body">
<h2>Data Customer</h2>
<br>
<table id="dataTable3" class="table">
    <thead class="bg-light">
        <tr class="border-0">
                <th class="card-body">Nomor</th>
                <th class="card-body">ID Pelanggan</th>
                <th class="card-body">Nama Pelanggan</th>
                <th class="card-body">Password</th>
                <th class="card-body">Level</th>
                <th class="card-body">Aksi</th> 
              </tr>
            </thead>                  
            <tbody>
            <?php
              include '../koneksi.php';
              $no = 1;
              $tampil = mysqli_query($db, "SELECT * FROM user order by id_user desc");
              while ($ambil = mysqli_fetch_array($tampil)) {
                $id = $ambil['id_user'];
              ?>
              <tr>
                <td><?php echo $no++; ?></td>
                <td><?php echo $ambil['id_user']; ?></td>
                <td><?php echo $ambil['username']; ?></td>
                <td><?php echo $ambil['password']; ?></td>
                <td><?php echo $ambil['level']; ?></td>
                <td>
                  <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#ubahuser<?=$id;?>"> <i class="fa fa-md fa-edit"></i> </button>
                  <a href="index.php?p=daftar/customer.php&id_user=<?=$id;?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin hapus data user ini ?')">Hapus</a>
              </tr> 
              <div class="modal fade" id="ubahuser<?=$id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Tambah User Baru</h5>
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>
                    <div class="modal-body">
                      <form method="post">
                        <div class="form-group">
                          <label>Username</label>
                          <input type="hidden" name="txtIdUser" value=<?=$id;?>>
                          <input type="text" name="txtUsername" value="<?=$ambil['username'];?>" class="form-control" placeholder="Enter username">
                        </div>
                        <div class="form-group">
                          <label>Password</label>
                          <input type="text" name="txtPassword" value="<?=$ambil['password'];?>" class="form-control" placeholder="Password">
                        </div>
                        <div class="form-group">
                          <label>Level</label>
                          <select name="txtLevel" class="form-control form-control-lg">
                            <option disabled="" selected="">Pilih Level</option>
                            <option <?php if($ambil['level']=="pelanggan"){ echo 'selected';}?> value="pelanggan">Pelanggan</option>
                            <option <?php if($ambil['level']=="produksi"){ echo 'selected';}?> value="produksi">Produksi</option>
                            <option <?php if($ambil['level']=="pemilik"){ echo 'selected';}?> value="pemilik">Pemilik</option>
                            <option <?php if($ambil['level']=="admin"){ echo 'selected';}?> value="admin">Admin</option>
                          </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                      <button type="submit" name="btnUbah" class="btn btn-warning">Ubah</button>
                    </div>
                      </form>
                  </div>
                </div>
              </div>
            <?php 
            } ?>
            </tbody>  
          </table>     
      </div>
  </div>
</div>
</div>

<?php
  if(isset($_POST['btnSimpan'])){
    $username = $_POST['txtUsername'];
    $password = $_POST['txtPassword'];
    $level = $_POST['txtLevel'];

    $query_simpan = mysqli_query($db,"insert into user (username,password,level) values ('$username','$password','$level')");

    if($query_simpan){
      echo '<script>alert("Data user baru berhasil di simpan")</script>';
      echo '<meta http-equiv="refresh" content="0; url=index.php?p=daftar/customer.php">';
    }else{
      echo '<script>alert("Data user baru gagal di simpan")</script>';
      echo '<meta http-equiv="refresh" content="0; url=index.php?p=daftar/customer.php">';
    }
  }elseif(isset($_POST['btnUbah'])){
    $id_user = $_POST['txtIdUser'];
    $username = $_POST['txtUsername'];
    $password = $_POST['txtPassword'];
    $level = $_POST['txtLevel'];

    $query_ubah = mysqli_query($db,"update user set username='$username', password='$password', level='$level' where id_user='$id_user'");

    if($query_ubah){
      echo '<script>alert("Data user berhasil di ubah")</script>';
      echo '<meta http-equiv="refresh" content="0; url=index.php?p=daftar/customer.php">';
    }else{
      echo '<script>alert("Data user gagal di ubah")</script>';
      echo '<meta http-equiv="refresh" content="0; url=index.php?p=daftar/customer.php">';
    }
  }elseif(isset($_GET['id_user'])){
    $id_user = $_GET['id_user'];
    $query_hapus = mysqli_query($db,"delete from user where id_user='$id_user'");
    if($query_hapus){
      echo '<script>alert("Data user berhasil di hapus")</script>';
      echo '<meta http-equiv="refresh" content="0; url=index.php?p=daftar/customer.php">';
    }else{
      echo '<script>alert("Data user gagal di hapus")</script>';
      echo '<meta http-equiv="refresh" content="0; url=index.php?p=daftar/customer.php">';
    }
  }
?>