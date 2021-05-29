<?php 
session_start();
include "functions.php";

$transit = query("SELECT * FROM tbl_transitstok ORDER BY id_trstok DESC");

?>
<?php require '_header.php'; ?>

        <section class="content">
            <div class="inner">
                <h3>Data Barang Transit</h3>
                    <hr>

                    <!-- Form Cari/search -->
                    <form action="" method="post">
                        <div class="form-group">
                            <div>
                                <a href="data_stok.php" class="btn btn-danger"><i class="fas fa-arrow-left"></i> Kembali</a>
                            </div>
                        </div>                      
                    </form>
                    <!-- Batas Form Cari/search -->

                    <!-- Tabel Data  -->
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
                                                    <th><center>Jml Masuk</center></th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>

                                            <?php $no = 1; ?>
                                            <?php foreach($transit as $trs): ?>
                                            <tr>
                                                <td><center><?= $no; ?></center></td>
                                                <td><?= $trs["kode_barang"]; ?></td>
                                                <td><?= $trs["nama_barang"]; ?></td>
                                                <td><center><?= $trs["jml_masuk"]; ?></center></td>
                                                <td>
                                                    <a href="form_kirim.php?id_trstok=<?= $trs["id_trstok"]; ?>" class="btn btn-primary"><span class="fas fa-download"></span> Simpan</a>
                                                    <a href="form_batal.php?id_trstok=<?= $trs["id_trstok"]; ?>" class="btn btn-danger"><span class="fas fa-window-close"></span> Batal</a>
                                                </td>
                                            </tr>
                                            <?php $no++; ?>
                                            <?php endforeach; ?>
                                        </table>
                                        <?php if(empty($transit)): ?>
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
                    <!-- Batas Tabel Data -->
                    
            </div>
        </section>

<?php require '_footer.php'; ?>