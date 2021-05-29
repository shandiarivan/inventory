<?php 
session_start();
include "functions.php";
date_default_timezone_set("Asia/Jakarta");

// Query tampil data 
$barangmasuk = query("SELECT A.*, B.nama_satuan, C.nama_kategori FROM tbl_barangmasuk AS A INNER JOIN tbl_satuan AS B ON (A.satuan = B.id_satuan) INNER JOIN tbl_kategori AS C ON (A.kategori = C.id_kategori) WHERE status = '1' ORDER BY A.id_brgmasuk DESC");

// Kode otomatis
$len = 8;
    $last = + 2;
    for($i = 0; $i < $len; $i++){
        do{
            $next_digit = mt_rand(0,9);
        }
        while($next_digit == $last);
        $last=$next_digit;
        $kode=$next_digit;
        $kode_barang="BM".date('d').$kode.date('yHis');
    }

// Kode Simpan/Tambah data
if(isset($_POST["submit"]) ){
    if( tambah($_POST) > 0){
        echo "
                <script>
                    alert('Data Berhasil Ditambahkan');
                    document.location.href = 'barang_masuk.php';
                </script>
            ";
    }else {
        echo "
                <script>
                    alert('Data Gagal Ditambahkan');
                    document.location.href = 'barang_masuk.php';
                </script>
            ";
    }
}

?>

<?php require '_header.php'; ?>

        <section class="content">
            <div class="inner">
                <h3>Data Barang Masuk</h3>                    
                   <hr>
                    <div class="table-content" style="font-size: 18px;">

                        <!-- Form Isi Barang Masuk -->
                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Barang Masuk
                                </div>
                                <div class="panel-body">
                                    <form action="" method="post">
                                        <div class="form-group">
                                            <label>Kode Pembelian</label>
                                            <input type="text" class="form-control" name="kode_barangmasuk" id="kode_barangmasuk" value="<?php echo $kode_barang; ?>" readonly="true" >
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Barang</label>
                                            <input type="text" class="form-control" name="nama_barangmasuk" id="nama_barangmasuk" placeholder="Masukan Nama Barang" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Satuan</label>
                                            <select class="form-control" name="satuan" id="satuan" required>
                                                <option value="">- Pilih Satuan -</option>
                                                <?php
                                                    $abc = mysqli_query($conn, "SELECT id_satuan, nama_satuan FROM tbl_satuan");
                                                    while($data = mysqli_fetch_assoc($abc)){
                                                        echo " <option value='$data[id_satuan]'>$data[nama_satuan]</option> ";
                                                    }
                                                ?>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Kategori</label>
                                            <select class="form-control" name="kategori" id="kategori" required>
                                                <option value="">- Pilih Kategori -</option>
                                                <?php 
                                                    $abc = mysqli_query($conn, "SELECT id_kategori, nama_kategori FROM tbl_kategori");
                                                    while($data = mysqli_fetch_assoc($abc)){
                                                        echo " <option value='$data[id_kategori]'>$data[nama_kategori]</option> ";
                                                    }
                                                ?>
                                            </select>
                                        </div>  
                                </div>
                            </div>    
                        </div>

                        <div class="col-md-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Transaksi
                                </div>
                                <div class="panel-body">
                                        <div class="form-group">
                                            <label>Jumlah Item</label>
                                            <input type="text" onkeypress="return angka(event)" min="1" onkeyup="javascript: if(parseInt(this.value) < 1){this.value='1'}" class="form-control" name="jumlah_item" id="jumlah_item" max="10000" min="0" required>
                                        </div>
                                            
                                        <input type="hidden" class="form-control" name="keterangan" id="keterangan" value="Barang Masuk" readonly="true">
                                        
                                        <div class="form-group">
                                            <label>Tanggal Masuk</label>
                                            <input type="date" class="form-control" name="tgl_masuk" id="tgl_masuk" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Pilih Supplier</label>
                                            <select class="form-control" name="supplier" id="supplier" required>
                                                <option value="">- Pilih Supplier -</option>
                                                <?php 
                                                    $abc = mysqli_query($conn, "SELECT id_supplier, nama FROM supplier");
                                                    while($data = mysqli_fetch_assoc($abc)){
                                                        echo " <option value='$data[id_supplier]'>$data[nama]</option> ";
                                                    }
                                                ?>
                                            </select>
                                        </div> 
                                        <div class="panel-footer">
                                            <button class="btn btn-info" name="submit" id="submit"><i class="fa fa-plus"></i> Tambah</button>
                                        </div>
                                    </form>    
                                </div>
                            </div>
                        </div>
                        <!-- Batas Form Isi Barang Masuk -->

                         <!-- Tabel Data Barang Masuk -->
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Tabel Data Barang Masuk
                                </div>
                                <div class="panel-body">
                                    <div class="table">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th><center>No</center></th>
                                                    <th>Nama Barang</th>
                                                    <th>Satuan</th>
                                                    <th>Kategori</th>
                                                    <th><center>Jumlah</center></th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            
                                            <?php $no = 1; ?>
                                            <?php foreach($barangmasuk as $bm): ?>
                                                <tr>
                                                    <td><center><?= $no; ?></center></td>
                                                    <td><?= $bm['nama_barang']; ?></td>
                                                    <td><?= $bm['nama_satuan']; ?></td>
                                                    <td><?= $bm['nama_kategori']; ?></td>
                                                    <td><center><?= $bm['jml_masuk']; ?></center></td>
                                                    <td>
                                                        <a href="form_simpan.php?id_brgmasuk=<?= $bm["id_brgmasuk"]; ?>" class="btn btn-success"><span class="fas fa-download"></span> Simpan</a>
                                                        <a href="batal.php?id_brgmasuk=<?= $bm["id_brgmasuk"]; ?>"  class="btn btn-danger "><span class="fas fa-window-close"></span> Batal</a>
                                                    </td>
                                                </tr>
                                            <?php $no++; ?>
                                            <?php endforeach; ?>
                                        </table>

                                        <?php if(empty($barangmasuk)): ?>
                                            <div class="alert alert-danger">
                                                <center>Data Masih Kosong.</center>
                                            </div>
                                        <?php endif; ?>
                                        
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    Inventory
                                </div>
                            </div>
                        </div>
                        <!-- Batas Tabel Data  -->

                    </div>
                    
                    
            </div>
        </section>

<?php require '_footer.php'; ?>
    