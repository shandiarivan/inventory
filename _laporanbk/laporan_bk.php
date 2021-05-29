<?php 
session_start();
include "../koneksi.php";

?>

<?php require '_header.php'; ?>

<section class="content">
    <div class="inner">
        <h3>Laporan Barang Keluar</h3>
        <hr>

        <form method="get" action="">
        
        <div class="col-md-4">
        <select name="filter" id="filter" class="form-control">
            <option value="">- Pilih Berdasarkan -</option>
            <option value="1">Per Tanggal</option>
            <option value="2">Per Bulan</option>
            <option value="3">Per Tahun</option>
            <option value="4">Per Periode</option>
        </select>
        </div>
        <br /><br />

        <div id="form-tanggal" class="col-md-4">
                <input type="date" name="tanggal" class="form-control" />
            <br /><br />
        </div>

        <div id="form-bulan" class="col-md-4">
            <select name="bulan" class="form-control">
                <option value="">- Pilih Bulan -</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
            </select>
            <br /><br />
        </div>

        <div id="form-tahun" class="col-md-4">
            <select name="tahun" class="form-control">
                <option value="">- Pilih Tahun -</option>
                <?php
                $query = "SELECT YEAR(tgl_keluar) AS tahun FROM tbl_lap_bk GROUP BY YEAR(tgl_keluar)"; // Tampilkan tahun sesuai di tabel transaksi
                $sql = mysqli_query($conn, $query); // Eksekusi/Jalankan query dari variabel $query

                while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                    echo '<option value="'.$data['tahun'].'">'.$data['tahun'].'</option>';
                }
                ?>
            </select>
            <br /><br />
        </div>

        <div id="form-periode" class="col-md-4">
            <label><h4>Mulai Tgl:</h4></label>
            <input type="date" name="dari" class="form-control">
            <label><h4>Sampai Tgl:</h4></label>
            <input type="date" name="sampai" class="form-control">
        </div>

        <button type="submit" class="btn btn-success" style="margin-left: 15px;"><i class="fas fa-eye"></i> Tampilkan</button>
        <a href="laporan_bk.php" class="btn btn-primary"><i class="fas fa-sync-alt"></i> Reset Filter</a>
    </form>
    <hr />

    <?php
    if(isset($_GET['filter']) && ! empty($_GET['filter'])){ // Cek apakah user telah memilih filter dan klik tombol tampilkan
        $filter = $_GET['filter']; // Ambil data filder yang dipilih user

        if($filter == '1'){ // Jika filter nya 1 (per tanggal)
            $tgl = date('d-m-y', strtotime($_GET['tanggal']));

            echo '<h5 class="alert alert-info" style="margin-top: 30px;"><b>Data Transaksi Tanggal '.$tgl.'</b></h5>';
            echo '<a href="../cetak_laporan/cetak_laporan_bk.php?filter=1&tanggal='.$_GET['tanggal'].'"class="btn btn-warning" style="margin-left: 15px;"><span class="fas fa-print" ></span> <b>Cetak PDF</b></a><br /><br />';

            $query = "SELECT * FROM tbl_lap_bk WHERE DATE(tgl_keluar)='".$_GET['tanggal']."' "; // Tampilkan data transaksi sesuai tanggal yang diinput oleh user pada filter
        }else if($filter == '2'){ // Jika filter nya 2 (per bulan)
            $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

            echo '<h5 class="alert alert-info" style="margin-top: 30px;"><b>Data Transaksi Bulan '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'].'</b></h5>';
            echo '<a href="../cetak_laporan/cetak_laporan_bk.php?filter=2&bulan='.$_GET['bulan'].'&tahun='.$_GET['tahun'].'"class="btn btn-warning" style="margin-left: 15px;"><span class="fas fa-print" ></span> <b>Cetak PDF</b></a><br /><br />';

            $query = "SELECT * FROM tbl_lap_bk WHERE MONTH(tgl_keluar)='".$_GET['bulan']."' AND YEAR(tgl_keluar)='".$_GET['tahun']."' "; // Tampilkan data transaksi sesuai bulan dan tahun yang diinput oleh user pada filter
        }else if($filter == '3'){ // Jika filter nya 3 (per tahun)
            echo '<h5 class="alert alert-info" style="margin-top: 30px;"><b>Data Transaksi Tahun '.$_GET['tahun'].' </b></h5>';
            echo '<a href="../cetak_laporan/cetak_laporan_bk.php?filter=3&tahun='.$_GET['tahun'].'"class="btn btn-warning" style="margin-left: 15px;"><span class="fas fa-print" ></span> <b>Cetak PDF</b></a><br /><br />';

            $query = "SELECT * FROM tbl_lap_bk WHERE YEAR(tgl_keluar)='".$_GET['tahun']."' "; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
        }else{ // Jika filter nya 3 (per tahun)
            echo '<h5 class="alert alert-info" style="margin-top: 30px;"><b>Data Transaksi Periode Mulai '.$_GET['dari'].' Sampai '.$_GET['sampai'].' </b></h5>';
            echo '<a href="../cetak_laporan/cetak_laporan_bk.php?filter=4&dari='.$_GET['dari'].'&sampai='.$_GET['sampai'].'"class="btn btn-warning" style="margin-left: 15px;"><span class="fas fa-print" ></span> <b>Cetak PDF</b></a><br /><br />';

            $query = "SELECT * FROM tbl_lap_bk WHERE DATE(tgl_keluar) BETWEEN '".$_GET['dari']."' AND '".$_GET['sampai']."' "; // Tampilkan data transaksi sesuai tahun yang diinput oleh user pada filter
        }
    }else{ // Jika user tidak mengklik tombol tampilkan
        
        echo '<a href="../cetak_laporan/cetak_laporan_bk.php" class="btn btn-warning" style="margin-left: 15px;"><span class="fas fa-print" ></span> <b>Cetak PDF</b></a><br /><br />';
        echo '<h5 class="alert alert-info" style="margin-top: 30px;"><b>Semua Data Transaksi</b></h5>';
        $query = "SELECT * FROM tbl_lap_bk ORDER BY id_lap DESC"; // Tampilkan semua data transaksi diurutkan berdasarkan tanggal
    }
    ?>

    <div class="table-content">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Laporan Barang Masuk
                </div>
                <div class="panel-body">
                    <div class="table">
                        <table class="table table-striped table-bordered table-hover">
                        <tr>
                            <th><center>No</center></th>
                            <th>Tanggal</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th><center>Jumlah</center></th>
                            <th>Customer</th>
                            <th>Keterangan</th>
                        </tr>

                        <?php
                        $sql = mysqli_query($conn, $query); // Eksekusi/Jalankan query dari variabel $query
                        $row = mysqli_num_rows($sql); // Ambil jumlah data dari hasil eksekusi $sql
                        $no = 1;

                        if($row > 0){ // Jika jumlah data lebih dari 0 (Berarti jika data ada)
                            while($data = mysqli_fetch_array($sql)){ // Ambil semua data dari hasil eksekusi $sql
                                $tgl = date('d-m-Y', strtotime($data['tgl_keluar'])); // Ubah format tanggal jadi dd-mm-yyyy
                                
                                echo "<tr>";
                                echo "<td><center>".$no."</center></td>";
                                echo "<td>".$tgl."</td>";
                                echo "<td>".$data['kode_barang']."</td>";
                                echo "<td>".$data['nama_barang']."</td>";
                                echo "<td><center>".$data['jml_keluar']."</center></td>";
                                echo "<td>".$data['customer']."</td>";
                                echo "<td>".$data['keterangan']."</td>";
                                echo "</tr>";

                                $no++;
                            }
                        }else{ // Jika data tidak ada
                            echo "<tr><td colspan='7'><center>Data Tidak Ada.</center></td></tr>";
                        }
                        ?>
                        </table>
                    </div>
                </div>
                <div class="panel-footer">
                    Inventory
                </div>
            </div>
        </div>
    </div>

    </div>
</section>

<?php require '_footer.php'; ?>