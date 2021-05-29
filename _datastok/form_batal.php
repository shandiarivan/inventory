<?php 
    include "functions.php";
    date_default_timezone_set("Asia/Jakarta");

    $id = $_GET["id_trstok"];

    $trs = query("SELECT A.*, B.nama FROM tbl_transitstok AS A INNER JOIN supplier AS B ON (A.id_supplier = B.id_supplier) WHERE id_trstok = $id")[0];

    if( isset($_POST["submit"]) ) {

        if( batal($_POST) > 0){
            echo "
                    <script>
                        alert('Data Berhasil Di Dibatalkan');
                        document.location.href = 'data_stok.php';
                    </script>
                ";
        } else {
            echo "
                    <script>
                        alert('Data Gagal Di Dibatalkan');
                        document.location.href = 'stok_transit.php';
                    </script>
                ";
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Inventory</title>

    <link rel='shortcut icon' href="../dist/img/ivantory.png">
    
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../fontawesome/css/all.min.css">
    <link rel="stylesheet" href="../dist/css/admin.css">
    <link rel="stylesheet" href="form.css">

</head>
<body>
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="navbar navbar-default">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".sidebar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Inventory</a>
            </div>
        </nav>
        <!-- Batas Navbar -->

        <!-- Menu Sidebar -->
        <aside class="sidebar sidebar-collapse">
            <div class="menu">
                <ul class="menu-content">
                    <li>
                        <a href="../dashboard.php"><i class="fas fa-warehouse"></i> Dashboard</a>
                    </li>
                    <li>
                        <a href="../_kartustok/kartu_stok.php"><i class="fas fa-list"></i> Kartu Stok</a>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-cube"></i> <span>Master Data</span> <i class="fas fa-angle-down pull-right"></i></a>
                        <ul>
                            <li>
                                <a href="../_barang/barang.php"> Data Barang</a>
                            </li>
                            <li>
                                <a href="../_kategori/kategori.php"> Data Kategori</a>
                            </li>
                            <li>
                                <a href="../_satuan/satuan.php"> Data Satuan</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-tag"></i> <span>Barang Masuk</span> <i class="fas fa-angle-down pull-right"></i></a>
                        <ul>
                            <li>
                                <a href="../_barangmasuk/barang_masuk.php"> Data Barang Masuk</a>
                            </li>
                            <li>
                                <a href="../_datastok/data_stok.php"> Data Stok</a>
                            </li>
                            <li>
                                <a href="../_datamasuk/data_masuk.php"> Data Masuk</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-tag"></i> <span>Barang Keluar</span> <i class="fas fa-angle-down pull-right"></i></a>
                        <ul>
                            <li>
                                <a href="../_barangkeluar/barang_keluar.php"> Data Barang Keluar</a>
                            </li>
                            <li>
                                <a href="../_datakeluar/data_keluar.php"> Data Keluar</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#"><i class="fas fa-book"></i> <span>Laporan</span> <i class="fas fa-angle-down pull-right"></i></a>
                        <ul>
                            <li>
                                <a href="../_laporanbm/laporan_bm.php"> Laporan Barang Masuk</a>
                            </li>
                            <li>
                                <a href="../_laporanbk/laporan_bk.php"> Laporan Barang Keluar</a>
                            </li>
                            <li>
                                <a href="../_laporansm/laporan_sm.php"> Laporan Stok Masuk</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="../_supplier/supplier.php"><i class="fas fa-dolly"></i> Supplier</a>
                    </li>
                    <li>
                        <a href="../_customer/customer.php"><i class="fas fa-address-book"></i> Customer</a>
                    </li>
                    <li>
                        <a href="../logout.php" onclick="return confirm('Yakin Untuk Keluar?')"><span style="color: red;"><i class="fas fa-sign-out-alt"></i> Log Out</span></a>
                    </li>
                   <div class="sidebar-footer">
                        <p style="color: white;">&copy Copyright Ivantory 2020</p>
                   </div>
                </ul>
            </div>
        </aside>
        <!-- Batas Menu Sidebar -->

        <!-- Form -->
        <section class="content">
            <div class="inner">
                <div class="table-content">
                    <div class="box">
                        <h2>Konfirmasi Pembatalan</h2>
                            <form action="" method="post" class="form form-control-static">
                                <div class="container">
                                <input type="hidden" name="id_trstok" id="id_trstok" value="<?= $trs["id_trstok"]; ?>">
                                <input type="hidden" class="form-control" name="id_barangmasuk" id="id_barangmasuk" value="<?= $trs["id_brgmasuk"]; ?>">               
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="kode">Kode Barang</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="kode_barang" id="kode_barang" class="form-control" style="font-size: 18px;" autocomplete="off" required readonly value="<?= $trs["kode_barang"]; ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="nama">Nama Barang</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="nama_barang" id="nama_barang" class="form-control" style="font-size: 18px;" autocomplete="off" required value="<?= $trs["nama_barang"]; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="tgl_transaksi">Tgl Transaksi</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="tgl_transaksi" id="tgl_transaksi" class="form-control" style="font-size: 18px;" autocomplete="off" required value="<?= $trs["tgl_transaksi"]; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>

                                    <input type="hidden" name="stok_awal" id="stok_awal" class="form-control" style="font-size: 18px;" autocomplete="off" required value="<?= $trs["stok_awal"]; ?>" readonly>

                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="jml_masuk">Jumlah Masuk</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="jml_masuk" id="jml_masuk" class="form-control" style="font-size: 18px;" autocomplete="off" required value="<?= $trs["jml_masuk"]; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                <label for="supplier">Nama Supplier</label>
                                            </div>
                                            <div class="col-md-5">
                                                <input type="text" name="supplier" id="supplier" class="form-control" style="font-size: 18px;" autocomplete="off" required value="<?= $trs["nama"]; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    
                                        

                                    <center>
                                        <button type="submit" name="submit" class="btn btn-info" style="margin-left: 200px;"><span class="fas fa-save"> Selesai</span></button>
                                        <a href="stok_transit.php" class="btn btn-danger">Kembali</a>
                                    </center>
                            </form>
                    </div>
                </div>
            </div>
        </section>
        <!-- Batas Form -->

    </div>    

<!-- jquery.min.js wajib disisipkan agar bootstrap.min.js dapat bekerja -->
<script src="../dist/js/jquery.min.js"></script>
<script src="../bootstrap/js/bootstrap.min.js"></script>
<script src="../dist/js/admin.js"></script>
<script src="../dist/js/onlynumber.js"></script>
</body>
</html>
