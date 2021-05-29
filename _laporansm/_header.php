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
    <link rel="stylesheet" href="../dist/plugin/jquery-ui.min.css" /> <!-- Load file css jquery-ui -->
    <script src="../dist/js/jquery.min.js"></script> <!-- Load file jquery -->

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
