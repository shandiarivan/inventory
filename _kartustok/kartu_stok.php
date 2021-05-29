<?php 
session_start();
include "../koneksi.php";

?>

<?php require '_header.php'; ?>

        <section class="content">
            <div class="inner">
                <h3>Kartu Stok</h3>
                <hr>

                <form method="get" action="">

                    <div class="col-md-4">
                        <select name="filter" id="filter" class="form-control">
                            <option value="">- Pilih Berdasarkan -</option>
                            <option value="1">Tanggal</option>
                            <option value="2">Nama</option>
                            <option value="3">Keterangan</option>
                        </select>
                    </div>
                    <br /><br />

                    <div id="form-tanggal" class="col-md-4">
                            <input type="date" name="tanggal" class="form-control" />
                        <br /><br />
                    </div>

                    <div id="form-barang" class="col-md-4">
                        <select name="barang" class="form-control">
                            <option value="">- Pilih Nama Barang -</option>
                            <?php
                            $query = "SELECT nama_barang AS barang FROM tbl_kartustok GROUP BY nama_barang"; 
                            $sql = mysqli_query($conn, $query);

                            while($data = mysqli_fetch_array($sql)){
                                echo '<option value="'.$data['barang'].'">'.$data['barang'].'</option>';
                            }
                            ?>
                        </select>
                        <br /><br />
                    </div>

                    <div id="form-ket" class="col-md-4">
                        <select name="ket" class="form-control">
                            <option value="">- Pilih Keterangan -</option>
                            <?php
                            $query = "SELECT keterangan AS ket FROM tbl_kartustok GROUP BY keterangan"; 
                            $sql = mysqli_query($conn, $query); 

                            while($data = mysqli_fetch_array($sql)){ 
                                echo '<option value="'.$data['ket'].'">'.$data['ket'].'</option>';
                            }
                            ?>
                        </select>
                        <br /><br /><br />
                    </div>

                    <div>
                    <button type="submit" class="btn btn-success" style="margin-left: 15px;"><i class="fas fa-eye"></i> Tampilkan</button>
                    <a href="kartu_stok.php" class="btn btn-primary"><i class="fas fa-sync-alt"></i> Reset Filter</a>
                    </div>

                </form>
                <hr />

                <?php
                if(isset($_GET['filter']) && ! empty($_GET['filter'])){ 
                    $filter = $_GET['filter']; 

                    if($filter == '1'){ 
                        $tgl = date('d-m-y', strtotime($_GET['tanggal']));

                        echo '<h5 class="alert alert-info"><b>Data Berdasarkan Tanggal &nbsp " '.$tgl.' " </b></h5>';
                        echo '<a href="../cetak_laporan/cetak_kartustok.php?filter=1&tanggal='.$_GET['tanggal'].'" class="btn btn-warning" style="margin-left: 15px;"><span class="fas fa-print"></span> <b>Cetak PDF</b></a><br /><br />';

                        $query = "SELECT * FROM tbl_kartustok WHERE DATE(tgl_transaksi)='".$_GET['tanggal']."' "; 
                    }else if($filter == '2'){
                        echo '<h5 class="alert alert-info"><b>Data Berdasarkan Nama Barang &nbsp " '.$_GET['barang'].' " </b></h5>';
                        echo '<a href="../cetak_laporan/cetak_kartustok.php?filter=2&barang='.$_GET['barang'].'" class="btn btn-warning" style="margin-left: 15px;"><span class="fas fa-print"></span> <b>Cetak PDF</b></a><br /><br />';

                        $query = "SELECT * FROM tbl_kartustok WHERE nama_barang ='".$_GET['barang']."' "; 
                    }else{ 
                        echo '<h5 class="alert alert-info"><b>Data Berdasarkan Keterangan &nbsp " '.$_GET['ket'].' " </b></h5>';
                        echo '<a href="../cetak_laporan/cetak_kartustok.php?filter=3&ket='.$_GET['ket'].'" class="btn btn-warning" style="margin-left: 15px;"><span class="fas fa-print"></span> <b>Cetak PDF</b></a><br /><br />';

                        $query = "SELECT * FROM tbl_kartustok WHERE keterangan ='".$_GET['ket']."' ";
                    }
                }else{ 
                    echo '<h5 class="alert alert-info"><b>Semua Data Kartu Stok</b></h5>';
                    echo '<a href="../cetak_laporan/cetak_kartustok.php" class="btn btn-warning" style="margin-left: 15px;"><span class="fas fa-print"></span> <b>Cetak PDF</b></a><br /><br />';

                    $query = "SELECT * FROM tbl_kartustok ORDER BY id_kartustok DESC  "; 
                }
                ?>

                <div class="table-content">
                    <div class="col-md-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Kartu Stok
                            </div>
                            <div class="panel-body">
                                <div class="table">
                                    <table class="table table-striped table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th><center>No</center></th>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Tgl Transaksi</th>
                                                <th>Keterangan</th>
                                                <th><center>Masuk</center></th>
                                                <th><center>Keluar</center></th>
                                                <th><center>Stok</center></th>
                                            </tr>
                                        </thead>

                                        <?php

                                    
                                            $sql = mysqli_query($conn, $query); 
                                            $row = mysqli_num_rows($sql); 

                                            $no = 1;
                                            if($row > 0){
                                                while($data = mysqli_fetch_array($sql)){ 
                                                   // $tgl = date('d-m-Y', strtotime($data['tgl_transaksi'])); 

                                                    echo "<tr>";
                                                    echo "<td><center>".$no."</center></td>";
                                                    echo "<td>".$data['kode_barang']."</td>";
                                                    echo "<td>".$data['nama_barang']."</td>";
                                                    echo "<td>".$data['tgl_transaksi']."</td>";
                                                    echo "<td>".$data['keterangan']."</td>";
                                                    echo "<td><center>".$data['jml_masuk']."</center></td>";
                                                    echo "<td><center>".$data['jml_keluar']."</center></td>";
                                                    echo "<td><center>".$data['sisa']."</center></td>";
                                                    echo "</tr>";

                                                    $no++;
                                                }                                               
                                            }else{ 
                                                echo "<tr><td colspan='8'><center><b>Data Tidak Ditemukan</b></center></td></tr>";
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