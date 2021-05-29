<?php 
session_start();
require 'functions.php';

$customer = query("SELECT * FROM customer");

// tombol cari di klik
if( isset($_POST["cari"])){
    $customer  =  cari($_POST["keyword"]);
}

// Tambah Data
if( isset($_POST["submit"]) ) {
    if( tambah($_POST) > 0){
        echo "
                <script>
                    alert('Data Berhasil Ditambahkan');
                    document.location.href = 'customer.php';
                </script>
            ";
            } else {
        echo "
                <script>
                    alert('Data Gagal Ditambahkan');
                    document.location.href = 'customer.php';
                </script>
            ";
            }
    }

?>

<?php require '_header.php'; ?>

        <section class="content">
            <div class="inner">
                <h2>Customer</h2><br>

                    <!-- Tambah Supplier -->
                    <a href="#" class="btn btn-success" style="font-size: 18px;" data-toggle="modal" data-target="#tambah" ><span class="fas fa-plus"></span>Tambah Data</a>
                    <div id="tambah" class="modal fade" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" >&times;</button>
                                    <h2 class="modal-title">Tambah Data Supplier</h2>
                                </div>
                                <form action="" method="post" class="form form-control-static">
                                    <div class="modal-body">
                                        <div class="form-group">
                                                <label class="control-label" for="nama_customer">Nama Customer*</label>
                                                <input type="text" name="nama_customer" id="nama_customer" class="form-control" placeholder="Masukkan Nama Customer" autocomplete="off" style="font-size: 18px;" autofocus required />
                                            </div>
                                            <div class="form-group">
                                                <label for="alamat">Alamat*</label>
                                                <textarea type="text" name="alamat" id="alamat" class="form-control" rows="3" placeholder="Masukkan Alamat" autocomplete="off" style="font-size: 18px;" required></textarea>
                                            </div>
                                            <div class="form-group">                                        
                                                <label for="email">Email*</label>                                            
                                                <input type="text" name="email" id="email" class="form-control" placeholder="Masukkan Email" autocomplete="off" style="font-size: 18px;" required />                                           
                                            </div>
                                            <div class="form-group">
                                                <label for="telepon">No.Telepon</label> 
                                                <input type="text" onkeypress="return angka(event)" name="telepon" id="telepon" class="form-control" placeholder="Masukkan Nomor Telepon" autocomplete="off" style="font-size: 18px;" maxlength="13" required/>
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
                                    Tabel Data Customer
                                </div>
                                <div class="panel-body">
                                    <div class="table">
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th><center>No</center></th>
                                                    <th>Nama</th>
                                                    <th>Alamat</th>
                                                    <th>Email</th>
                                                    <th>No.Telp</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>

                                            <?php $no = 1; ?>
                                            <?php foreach($customer as $cus): ?>
                                            <tr>
                                                <td><center><?= $no; ?></center></td>
                                                <td><?= $cus["nama_customer"]; ?></td>
                                                <td><?= $cus["alamat"]; ?></td>
                                                <td><?= $cus["email"]; ?></td>
                                                <td><?= $cus["telepon"]; ?></td>
                                                <td>
                                                    <a href="edit.php?id_customer=<?= $cus["id_customer"]; ?>" class="btn btn-info"><span class="fas fa-edit"></span>Edit</a>
                                                    <a href="hapus.php?id_customer=<?= $cus["id_customer"]; ?>" onclick="return confirm('Yakin untuk menghapus?')" class="btn btn-danger "><span class="fas fa-trash"></span>Hapus</a>
                                                </td>
                                            </tr>
                                            <?php $no++; ?>
                                            <?php endforeach; ?>
                                        </table>
                                        
                                        <?php if(empty($cus)): ?>
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