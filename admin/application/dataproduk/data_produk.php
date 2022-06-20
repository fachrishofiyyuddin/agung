<div class="col-12 mt-5">
  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#tambahproduk">
    Tambah Produk & Bahan Baru
  </button> <br> <br>
  <div class="modal fade" id="tambahproduk" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Tambah Produk & Bahan Baru</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form method="post" enctype="multipart/form-data">
            <div class="form-group">
              <label>Nama Produk</label>
              <select name="txtIdProduk" class="form-control form-control-lg">
                <option disabled="" selected="">Pilih Produk</option>
                <?php
                  include '../koneksi.php';
                  $query_produk = mysqli_query($db,"select * from produk order by id_produk desc");
                  while($data_produk = mysqli_fetch_array($query_produk)){
                    $id_produk = $data_produk['id_produk'];
                    $nama_produk = $data_produk['nama_produk'];
                ?>
                <option value="<?=$id_produk;?>"><?=$nama_produk;?></option>
                <?php
                  }
                ?>
              </select>
            </div>
            <div class="form-group">
              <label>Bahan</label>
              <input type="text" name="txtBahan" class="form-control" placeholder="Enter bahan">
            </div>
            <div class="form-group">
              <label>Harga</label>
              <input type="number" name="txtHarga" class="form-control" placeholder="Enter harga">
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
<h2>Data Produk & Bahan</h2>
<br>
<table id="dataTable3" class="table">
    <thead class="bg-light">
        <tr class="border-0">
                <th class="card-body">No</th>
                <th class="card-body">Nama Produk</th>
                <th class="card-body">Gambar Produk</th>
                <th class="card-body">Nama Bahan</th>
                <th class="card-body">Harga Bahan</th>
                <th class="card-body">Aksi</th> 
              </tr>
            </thead>                  
            <tbody>
            <?php
              include '../koneksi.php';
              $tampil = mysqli_query($db, "SELECT * FROM bahan JOIN produk ON bahan.id_produk=produk.id_produk order by bahan.id_produk desc");
              $no = 1;
              while ($ambil = mysqli_fetch_array($tampil)) {
                $id = $ambil['id_bahan'];
              ?>
              <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $ambil['nama_produk']; ?></td>
                <td>
                  <img src="../../kain/<?php echo $ambil['gambar_produk'];?>" width="100">
                </td>
                <td><?php echo $ambil['nama_bahan']; ?></td>
                <td><?php echo $ambil['harga_bahan']; ?> </td>
                <td>
                  <button class="btn btn-warning btn-xs" onclick="window.location = 'index.php?p=dataproduk/edit.php&id=<?php echo $id; ?>'"> <i class="fa fa-md fa-edit"></i> 
                  </button>
                  <a href="index.php?p=dataproduk/data_produk.php&id_bahan=<?=$id;?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin hapus data produk & bahan ini ?')">Hapus</a>
              </tr> 
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
    $id_produk = $_POST['txtIdProduk'];
    $bahan = $_POST['txtBahan'];
    $harga = $_POST['txtHarga'];
    $query_simpan = mysqli_query($db,"insert into bahan (id_produk,nama_bahan,harga_bahan) values('$id_produk','$bahan','$harga')");
    if($query_simpan){
      echo '<script>alert("Data berhasil di simpan")</script>';
      echo '<meta http-equiv="refresh" content="0; url=index.php?p=dataproduk/data_produk.php">';
    }else{
      echo '<script>alert("Data gagal di simpan")</script>';
      echo '<meta http-equiv="refresh" content="0; url=index.php?p=dataproduk/data_produk.php">';
    }
  }elseif(isset($_GET['id_bahan'])){
        $id_bahan = $_GET['id_bahan'];
        $query_hapus = mysqli_query($db,"delete from bahan where id_bahan='$id_bahan'");
        if($query_hapus){
            echo '<script>alert("Data berhasil di hapus")</script>';
            echo '<meta http-equiv="refresh" content="0; url=index.php?p=dataproduk/data_produk.php">';
        }else{
            echo '<script>alert("Data gagal di hapus")</script>';
            echo '<meta http-equiv="refresh" content="0; url=index.php?p=dataproduk/data_produk.php">';
        }
    }
?>