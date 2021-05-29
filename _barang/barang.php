<?php 
session_start();   
include "functions.php";

$barang = query("SELECT A.*, B.nama_satuan, C.nama_kategori FROM tbl_databarang AS A INNER JOIN tbl_satuan AS B ON (A.satuan = B.id_satuan) INNER JOIN tbl_kategori AS C ON (A.kategori = C.id_kategori) ORDER BY id_barang DESC ");

if(isset($_POST["cari"])){
    $barang = cari($_POST["keyword"]);
}

?>

<?php require '_header.php'; ?>

        <section class="content">
            <div class="inner">
                <h3>Data Barang</h3>
                    <hr>
                        
                    <!-- Form Cari/search -->
                    <form action="" method="post">
                        <div class="form-group">
                            <div class="col-md-3" > 
                                <input type="text" name="keyword" class="form-control" autofocus autocomplete="off" placeholder="Masukkan Kata Kunci">                           
                            </div>
                            <div>
                                <button type="submit" name="cari" class="btn btn-primary"><span class="fas fa-search"></span>Cari</button>
                                <a href="../cetak_laporan/cetak_databarang.php" target="_blank" class="btn btn-warning"><i class="fas fa-print"> Cetak PDF</i></a>
                            </div>
                        </div>
                    </form>
                    <!-- Batas Form Cari/search -->
                    
                    <!-- Tabel Data Supplier -->
                    <div class="table-content" style="font-size: 18px;">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Tabel Data Barang Masuk
                                </div>
                                <div class="panel-body">
                                <?php// echo "Jumlah Data : $count"; ?>
                                    <div class="table">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th><center>No</center></th>
                                                    <th>Kode Barang</th>
                                                    <th>Nama Barang</th>
                                                    <th>Satuan</th>
                                                    <th>Kategori</th>
                                                    <th><center>Stok</center></th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>

                                            <?php $no = 1; ?>
                                            <?php  foreach($barang as $brg): ?>
                                            <tr>
                                                <td><center><?= $no; ?></center></td>
                                                <td><?= $brg["kode_barang"]; ?></td>
                                                <td><?= $brg["nama_barang"]; ?></td>
                                                <td><?= $brg["nama_satuan"]; ?></td>
                                                <td><?= $brg["nama_kategori"] ?></td>
                                                <td><center><?= $brg["stok"]; ?></center></td>
                                                <td>
                                                    <a href="hapus.php?id_brgmasuk=<?= $brg["id_brgmasuk"]; ?>" onclick="return confirm('Yakin untuk menghapus?')" class="btn btn-danger "><span class="fas fa-trash"></span>Hapus</a>
                                                </td>
                                            </tr>
                                            <?php $no++; ?>
                                            <?php endforeach; ?>
                                        </table>
                                        <?php if(empty($barang)): ?>
                                            <div class="alert alert-danger">
                                                <center>Data Kosong.</center>
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
    
