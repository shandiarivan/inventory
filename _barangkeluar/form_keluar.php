<?php 
include "functions.php";
date_default_timezone_set("Asia/Jakarta");

$id = $_GET["id_brgkeluar"];

$brk = query("SELECT * FROM tbl_barangkeluar WHERE id_brgkeluar = $id")[0];

if( isset($_POST["submit"]) ) {

    if( tambah($_POST) > 0){
        echo "
                <script>
                    alert('Data Telah Di Simpan. Lakukan Proses Selanjutnya Di Menu Barang Transit');
                    document.location.href = 'barang_keluar.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data Telah Di Simpan. Lakukan Proses Selanjutnya Di Menu Barang Transit ');
                    document.location.href = 'barang_keluar.php';
                </script>
            ";
    }
}

// Kode otomatis
$len = 8;
    $last = + 2;
    for($i = 0; $i < $len; $i++){
        do{
            $next_digit = mt_rand(0,9);
        }
        while($next_digit == $last);
        $last=$next_digit;
        $kode=$next_digit;
        $kode_barang="BK".date('d').$kode.date('yHis');
    }

?>

<?php require "_header.php"; ?>

        <section class="content">
            <div class="inner">
            <br> <br>

                 <!-- Form Isi Barang Masuk -->
                 <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Form Barang Keluar
                            </div>
                            <div class="panel-body">
                                <form action="" method="post">
                                <input type="hidden" class="form-control" name="id_barangkeluar" id="id_barangkeluar" value="<?= $brk["id_brgkeluar"]; ?>">
                                <input type="hidden" class="form-control" name="id_barangmasuk" id="id_barangmasuk" value="<?= $brk["id_brgmasuk"]; ?>">
                                <input type="hidden" class="form-control" name="kode_barang" id="kode_barang" readonly="true" value="<?= $brk["kode_barang"]; ?>" >
                                    <div class="form-group">
                                        <label>Kode Barang Keluar</label>
                                        <input type="text" class="form-control" name="kode_barangkeluar" id="kode_barangkeluar" readonly="true" value="<?= $kode_barang; ?>" >
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <input type="text" class="form-control" name="nama_barang" id="nama_barang" value="<?= $brk["nama_barang"]; ?>" required readonly>
                                    </div>

                                    <input type="hidden" class="form-control" name="satuan" id="satuan" value="<?= $brk["id_satuan"]; ?>" required readonly>

                                    <input type="hidden" class="form-control" name="kategori" id="kategori" value="<?= $brk["id_kategori"]; ?>" required readonly>

                                    <div class="form-group">
                                        <label>Stok Awal</label>
                                        <input type="number" class="form-control" name="stok_awal" id="stok_awal" value="<?= $brk["stok"]; ?>" required readonly>
                                    </div>

                                    <input type="hidden" class="form-control" name="keterangan" id="keterangan" value="Barang Keluar" readonly="true">
                            </div>
                        </div>    
                    </div>

                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Transaksi
                            </div>
                            <div class="panel-body">
                                    <div class="form-group">
                                    <label>Jumlah Keluar</label>
                                        <input type="number" onkeypress="return angka(event)" class="form-control" name="stok_keluar" id="stok_keluar" title="Jangan Melebihi Stok Awal" max="<?= $brk["stok"]; ?>" min="1" onkeyup="javascript: if(parseInt(this.value) < 1){this.value='1'}" required autofocus>
                                    </div>
                                    <div class="form-group">
                                        <label>Tanggal Keluar</label>
                                        <input type="date" class="form-control" name="tgl_keluar" id="tgl_keluar" required>
                                    </div>
                                <div class="form-group">
                                    <label>Pilih Customer</label>
                                    <select class="form-control" name="customer" id="customer" required>
                                        <option value="">- Pilih Customer -</option>
                                        <?php 
                                            $abc = mysqli_query($conn, "SELECT id_customer, nama_customer FROM customer");
                                            while($data = mysqli_fetch_assoc($abc)){
                                                echo " <option value='$data[id_customer]'>$data[nama_customer]</option> ";
                                            }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <button class="btn btn-info" name="submit" id="submit"><i class="fa fa-plus"></i> Tambah</button>
                                <a href="barang_keluar.php" class="btn btn-danger"><i class="fas fa-arrow-left"> Kembali</i></a>
                            </div>
                            </form>
                        </div>
                    </div>
                    <!-- Batas Form Isi Barang Masuk -->

                    
            </div>
        </section>

<?php require "_footer.php"; ?>