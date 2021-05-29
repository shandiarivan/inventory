<?php 
session_start();   
include "functions.php";
date_default_timezone_set("Asia/Jakarta");

$dts = query("SELECT * FROM tbl_datastok ORDER BY id_datastok DESC");

$sql = "SELECT * FROM tbl_transitstok";
$query = mysqli_query($conn,$sql);
$count = mysqli_num_rows($query);

// tombol cari di klik
if( isset($_POST["cari"])){
    $dts  =  cari($_POST["keyword"]);
}

?>

<?php require '_header.php'; ?>

        <section class="content">
            <div class="inner">
                <h3>Data Stok Masuk</h3>
                    <hr>

                    <!-- Form Cari/search -->
                    <form action="" method="post">
                        <div class="form-group">
                            <div class="col-md-3" > 
                                <input type="text" name="keyword" class="form-control" autofocus autocomplete="off" placeholder="Masukkan Kata Kunci">                           
                            </div>
                            <div>
                                <button type="submit" name="cari" class="btn btn-primary"><span class="fas fa-search"></span>Cari</button>
                                <?php if(empty($count)): ?>
                                    <button type="button" disabled class="btn btn-info"><i class="fas fa-bell-slash"></i> Stok Transit <span class="badge badge-light"><?= $count ?></span></button>
                                <?php else: ?>
                                    <a href="stok_transit.php" class="btn btn-info"><i class="fas fa-bell"></i> Stok Transit <span class="badge badge-light"><?= $count ?></span></a>
                                <?php endif;?>
                            </div>
                        </div>
                    </form>
                    <!-- Batas Form Cari/search -->
                    
                    <!-- Tabel Data Supplier -->
                    <div class="table-content" style="font-size: 18px;">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Tabel Data Barang
                                </div>
                                <div class="panel-body">
                                    <div class="table">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th><center>No</center></th>
                                                    <th>Kode Barang</th>
                                                    <th>Nama Barang</th>
                                                    <th><center>Stok</center></th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>

                                            <?php $no = 1; ?>
                                            <?php foreach($dts as $ds): ?>
                                            <tr>
                                                <td><center><?= $no; ?></center></td>
                                                <td><?= $ds["kode_barang"]; ?></td>
                                                <td><?= $ds["nama_barang"]; ?></td>
                                                <td><center><?= $ds["stok"]; ?></center></td>
                                                <td>
                                                    <a href="form_tambah.php?id_datastok=<?= $ds["id_datastok"]; ?>" class="btn btn-success"><span class="fas fa-sync fa-spin"></span> Proses</a>
                                                </td>
                                            </tr>
                                            <?php $no++; ?>
                                            <?php endforeach; ?>
                                        </table>
                                        <?php if(empty($dts)): ?>
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
    
