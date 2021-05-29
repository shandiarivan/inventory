<?php 
session_start();
include "functions.php";

$datakeluar = query("SELECT * FROM tbl_datakeluar ORDER BY id_datakeluar DESC");

// // tombol cari di klik
if( isset($_POST["cari"])){
    $datakeluar  =  cari($_POST["keyword"]);
}

?>

<?php require '_header.php'; ?>

        <section class="content">
            <div class="inner">
                <h3>Data Keluar</h3>
                <hr>

                <!-- Form Cari/search -->
                <form action="" method="post">
                        <div class="form-group">
                            <div class="col-md-3" > 
                                <input type="text" name="keyword" class="form-control" autofocus autocomplete="off" placeholder="Masukkan Kata Kunci">                           
                            </div>
                            <div>
                                <button type="submit" name="cari" class="btn btn-primary"><span class="fas fa-search"></span>Cari</button>
                                <a href="../cetak_laporan/cetak_datakeluar.php" class="btn btn-warning"><i class="fas fa-print"> Cetak PDF</i></a>
                            </div>
                        </div>
                    </form>
                    <!-- Batas Form Cari/search -->
                    
                    <!-- Tabel Data Supplier -->
                    <div class="table-content" style="font-size: 18px;">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                   Tabel Data Keluar
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
                                                    <th>Nama Customer</th>
                                                    <th>Jml Keluar</th>
                                                    <th>Keterangan</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            
                                            <?php $no = 1; ?>
                                            <?php foreach($datakeluar as $dtk): ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $dtk["kode_barang"]; ?></td>
                                                <td><?= $dtk["nama_barang"]; ?></td>
                                                <td><?= $dtk["tgl_keluar"]; ?></td>
                                                <td><?= $dtk["customer"]; ?></td>
                                                <td><center><?= $dtk["jml_keluar"]; ?></center></td>
                                                <td><?= $dtk["keterangan"]; ?></td>
                                                
                                                <td>
                                                    <a href="hapus.php?id_datakeluar=<?= $dtk["id_datakeluar"]; ?>" onclick="return confirm('Yakin untuk menghapus?')" class="btn btn-danger "><span class="fas fa-trash"></span>Hapus</a>
                                                </td>
                                            </tr>
                                            <?php $no++; ?>
                                            <?php endforeach; ?>
                                        </table>

                                            <?php if(empty($datakeluar)): ?>
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
