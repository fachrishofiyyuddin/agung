<div class="col-12 mt-5">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahproduk">
    Tambah Produk Baru
  </button> <br> <br>
  <div class="modal fade" id="tambahproduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Produk Baru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label>Nama Produk</label>
              <input type="text" name="txtProduk" class="form-control" placeholder="Enter nama produk">
            </div>
            <div class="form-group">
              <label>Gambar Produk</label>
              <input type="file" name="txtGambarProduk" class="form-control">
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
<h2>Data Produk</h2>
<br>
<table id="dataTable3" class="table">
    <thead class="bg-light">
        <tr class="border-0">
                <th class="card-body">No</th>
                <th class="card-body">Nama Produk</th>
                <th class="card-body">Gambar Produk</th>
                <th class="card-body">Aksi</th> 
              </tr>
            </thead>                  
            <tbody>
            <?php
              include '../koneksi.php';
              $tampil = mysqli_query($db, "SELECT * FROM produk");
              $no = 1;
              while ($ambil = mysqli_fetch_array($tampil)) {
                $id = $ambil['id_produk'];
              ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $ambil['nama_produk']; ?></td>
                <td>
                  <img src="../../kain/<?php echo $ambil['gambar_produk'];?>" width="100">
                </td>
                <td><?php echo $ambil['nama_bahan']; ?></td>
                <td>
                  <button class="btn btn-warning btn-xs" data-toggle="modal" data-target="#ubahproduk<?=$id;?>"> <i class="fa fa-md fa-edit"></i> </button>
                  <a href="index.php?p=dataproduk/produk.php&id_produk=<?=$id;?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin hapus data produk ini ?')">Hapus</a>
              </tr> 
              <div class="modal fade" id="ubahproduk<?=$id;?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit Produk</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body">
                    <form method="post" enctype="multipart/form-data">
                        <div class="form-group">
                        <label>Nama Produk</label>
                        <input type="hidden" name="txtIdProduk" value="<?=$id;?>">
                        <input type="text" name="txtProduk" value="<?=$ambil['nama_produk'];?>" class="form-control" placeholder="Enter nama produk">
                        </div>
                        <div class="form-group">
                        <label>Gambar Produk</label><br>
                         <img src="../../kain/<?php echo $ambil['gambar_produk'];?>" width="100">
                        <input type="file" name="txtGambarProduk" class="form-control">
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
            $no ++;} ?>
            </tbody>  
          </table>     
      </div>
  </div>
</div>
</div>

<?php
    if(isset($_POST['btnSimpan'])){
        $nama_produk = $_POST['txtProduk'];
        $rand = rand();
        $filename = $_FILES['txtGambarProduk']['name'];
        $gambar_produk = $rand.$filename;
        move_uploaded_file($_FILES['txtGambarProduk']['tmp_name'], '../../kain/'.$gambar_produk);
        $query_simpan = mysqli_query($db,"insert into produk (nama_produk,gambar_produk) values('$nama_produk','$gambar_produk')");
        if($query_simpan){
            echo '<script>alert("Data berhasil di simpan")</script>';
            echo '<meta http-equiv="refresh" content="0; url=index.php?p=dataproduk/produk.php">';
        }else{
            echo '<script>alert("Data gagal di simpan")</script>';
            echo '<meta http-equiv="refresh" content="0; url=index.php?p=dataproduk/produk.php">';
        }
    }elseif(isset($_GET['id_produk'])){
        $id_produk = $_GET['id_produk'];
        $query_hapus = mysqli_query($db,"delete from produk where id_produk='$id_produk'");
        if($query_hapus){
            echo '<script>alert("Data berhasil di hapus")</script>';
            echo '<meta http-equiv="refresh" content="0; url=index.php?p=dataproduk/produk.php">';
        }else{
            echo '<script>alert("Data gagal di hapus")</script>';
            echo '<meta http-equiv="refresh" content="0; url=index.php?p=dataproduk/produk.php">';
        }
    }elseif(isset($_POST['btnUbah'])){
        $id_produk = $_POST['txtIdProduk'];
        $nama_produk = $_POST['txtProduk'];
        $rand = rand();
        $filename = $_FILES['txtGambarProduk']['name'];
        // query cek 
        $query_cek = mysqli_query($db,"select * from produk where id_produk='$id_produk'");
        $data_cek  = mysqli_fetch_array($query_cek);
        $gambar_produk_cek = $data_cek['gambar_produk'];
        if($filename==""){
            $gambar_produk = $gambar_produk_cek;
        }else{
            $gambar_produk = $rand.$filename;
        }
        move_uploaded_file($_FILES['txtGambarProduk']['tmp_name'], '../../kain/'.$gambar_produk);
        $query_ubah = mysqli_query($db,"update produk set nama_produk='$nama_produk', gambar_produk='$gambar_produk' where id_produk='$id_produk'");
        if($query_ubah){
            echo '<script>alert("Data berhasil di ubah")</script>';
            echo '<meta http-equiv="refresh" content="0; url=index.php?p=dataproduk/produk.php">';
        }else{
            echo '<script>alert("Data gagal di ubah")</script>';
            echo '<meta http-equiv="refresh" content="0; url=index.php?p=dataproduk/produk.php">';
        }
        
    }
?>