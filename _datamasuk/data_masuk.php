<?php 
session_start();
include "functions.php";

$datamasuk = query("SELECT * FROM tbl_datamasuk ORDER BY id_datamasuk DESC ");

// tombol cari di klik
if( isset($_POST["cari"])){
    $datamasuk  =  cari($_POST["keyword"]);
}

?>

<?php require '_header.php'; ?>

        <section class="content">
            <div class="inner">
                <h3>Data Masuk</h3>
                <hr>

                    <!-- Form Cari/search -->
                    <form action="" method="post">
                        <div class="form-group">
                            <div class="col-md-3" > 
                                <input type="text" name="keyword" class="form-control" autofocus autocomplete="off" placeholder="Masukkan Kata Kunci">                           
                            </div>
                            <div>
                                <button type="submit" name="cari" class="btn btn-primary"><span class="fas fa-search"></span>Cari</button>
                                <a href="../cetak_laporan/cetak_datamasuk.php" class="btn btn-warning"><i class="fas fa-print"> Cetak PDF</i></a>
                            </div>
                        </div>
                    </form>
                    <!-- Batas Form Cari/search -->
                    
                    <!-- Tabel Data Supplier -->
                    <div class="table-content" style="font-size: 18px;">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Data Masuk
                                </div>
                                <div class="panel-body">
                                    <div class="table">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Kode Barang</th>
                                                    <th>Nama Barang</th>
                                                    <th>Tgl Transaksi</th>
                                                    <th>Nama Supplier</th>
                                                    <th>Jml Masuk</th>
                                                    <th>Keterangan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            
                                            <?php $no = 1; ?>
                                            <?php foreach($datamasuk as $dtm): ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $dtm["kode_barang"]; ?></td>
                                                <td><?= $dtm["nama_barang"]; ?></td>
                                                <td><?= $dtm["tgl_masuk"]; ?></td>
                                                <td><?= $dtm["supplier"]; ?></td>
                                                <td><center><?= $dtm["jml_masuk"]; ?></center></td>
                                                <td><?= $dtm["keterangan"]; ?></td>
                                                
                                                <td>
                                                    <a href="hapus.php?id_datamasuk=<?= $dtm["id_datamasuk"]; ?>" onclick="return confirm('Yakin untuk menghapus?')" class="btn btn-danger "><span class="fas fa-trash"></span>Hapus</a>
                                                </td>
                                            </tr>
                                            <?php $no++; ?>
                                            <?php endforeach; ?>
                                        </table>

                                            <?php if(empty($datamasuk)): ?>
                                                <div class="alert alert-danger">
                                                    <center>Data Tidak Ditemukan.</center>
                                                </div>
                                            <?php endif; ?>
                                        
                                    </div>
                                </div>
                                <div class="panel-footer">
                                    Inventory
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Batas Tabel Data Supplier -->

            </div>
        </section>

<?php require '_footer.php'; ?>
