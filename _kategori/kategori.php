<?php 
session_start();
require 'functions.php';

$kategori = query("SELECT * FROM tbl_kategori");

// tombol cari di klik
if( isset($_POST["cari"])){
    $kategori  =  cari($_POST["keyword"]);
}

// Tambah Data
if( isset($_POST["submit"]) ) {
    if( tambah($_POST) > 0){
        echo "
                <script>
                    alert('Data Berhasil Ditambahkan');
                    document.location.href = 'kategori.php';
                </script>
            ";
            } else {
        echo "
                <script>
                    alert('Data Gagal Ditambahkan');
                    document.location.href = 'kategori.php';
                </script>
            ";
            }
    }

?>

<?php require '_header.php'; ?>

        <section class="content">
            <div class="inner">
                <h2>Kategori</h2><br>

                    <!-- Tambah Supplier -->
                    <a href="#" class="btn btn-success" style="font-size: 18px;" data-toggle="modal" data-target="#tambah" ><span class="fas fa-plus"></span>Tambah Data</a>
                    <div id="tambah" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" >&times;</button>
                                    <h2 class="modal-title">Tambah Data Kategori</h2>
                                </div>
                                <form action="" method="post" class="form form-control-static">
                                    <div class="modal-body">
                                        <div class="form-group">
                                                <label class="control-label" for="nama_kategori">Nama Kategori*</label>
                                                <input type="text" name="nama_kategori" id="nama_kategori" class="form-control" placeholder="Masukkan Nama Kategori" autocomplete="off" style="font-size: 18px;" autofocus required />
                                            </div>                              
                                            <button type="submit" name="submit" class="btn btn-info">Tambah</button>
                                            <button type="reset" name="reset" class="btn btn-danger">Reset</button>
                                        </div>
                                    </div>    
                                </form>
                            </div>
                        </div>
                    <!-- Batas Tambah Supplier --> 

                    <hr>

                    <!-- Form Cari/search -->
                    <form action="" method="post">
                        <div class="form-group">
                                <div class="col-md-3" > 
                                    <input type="text" name="keyword" class="form-control" autofocus autocomplete="off" placeholder="Masukkan Kata Kunci">                           
                                </div>
                                <div>
                                    <button type="submit" name="cari" class="btn btn-primary"><span class="fas fa-search"></span>Cari</button>
                                </div>
                        </div>
                    </form>
                    <!-- Batas Form Cari/search -->
                    
                    <!-- Tabel Data Supplier -->
                    <div class="table-content" style="font-size: 18px;">
                        <div class="col-md-12">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    Tabel Data Kategori
                                </div>
                                <div class="panel-body">
                                    <div class="table">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No.</th>
                                                    <th>Nama Kategori</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>

                                            <?php $no = 1; ?>
                                            <?php foreach($kategori as $kt): ?>
                                            <tr>
                                                <td><?= $no; ?></td>
                                                <td><?= $kt["nama_kategori"]; ?></td>
                                                <td> 
                                                    <a href="hapus.php?id_kategori=<?= $kt["id_kategori"]; ?>" onclick="return confirm('Yakin untuk menghapus?')" class="btn btn-danger "><span class="fas fa-trash"></span>Hapus</a>
                                                </td>
                                            </tr>
                                            <?php $no++; ?>
                                            <?php endforeach; ?>
                                        </table>
                                        
                                        <?php if(empty($kt)): ?>
                                            <div class="alert alert-danger">
                                                <center>
                                                    Data Tidak Ditemukan.
                                                </center>
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