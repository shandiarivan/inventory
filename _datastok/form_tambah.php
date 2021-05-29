<?php 
include "functions.php";

$id = $_GET["id_datastok"];

$ds = query("SELECT * FROM tbl_datastok WHERE id_datastok = $id")[0];

if( isset($_POST["submit"]) ) {

    if( tambah($_POST) > 0){
        echo "
                <script>
                    alert('Data Telah Di Simpan. Lakukan Proses Selanjutnya Di Menu Stok Transit');
                    document.location.href = 'data_stok.php';
                </script>
            ";
    } else {
        echo "
                <script>
                    alert('Data Gagal Di Simpan');
                    document.location.href = 'form_tambah.php';
                </script>
            ";
    }
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
                                Form Tambah Stok
                            </div>
                            <div class="panel-body">
                                <form action="" method="post">
                                <input type="hidden" class="form-control" name="id_datastok" id="id_datastok" value="<?= $ds["id_datastok"]; ?>">
                                <input type="hidden" class="form-control" name="id_barangmasuk" id="id_barangmasuk" value="<?= $ds["id_brgmasuk"]; ?>">
                                    <div class="form-group">
                                        <label for="kode">Kode Barang</label>
                                        <input type="text" class="form-control" name="kode_barang" id="kode_barang" readonly="true" value="<?= $ds["kode_barang"]; ?>" >
                                    </div>
                                    <div class="form-group">
                                        <label>Nama Barang</label>
                                        <input type="text" class="form-control" name="nama_barang" id="nama_barang" value="<?= $ds["nama_barang"]; ?>" required readonly>
                                    </div>
                                    <div class="form-group">
                                        <label>Stok Awal</label>
                                        <input type="number" class="form-control" name="stok_awal" id="stok_awal" max="10000" min="0" value="<?= $ds["stok"]; ?>" required readonly>
                                    </div>
                                <input type="hidden" class="form-control" name="keterangan" id="keterangan" value="Stok Masuk" readonly="true">
                            </div>
                        </div>    
                    </div>

                    <div class="col-md-6">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                Transaksi
                            </div>
                            <div class="panel-body">
                                <div>
                                    <label>Jumlah Item</label>
                                    <input type="number" onkeyup="javascript: if(parseInt(this.value) < 1){this.value='1'}" onkeypress="return angka(event)" class="form-control" name="jml_item" id="jml_item" max="10000" min="1" required autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Transaksi</label>
                                    <input type="date" class="form-control" name="tgl_transaksi" id="tgl_transaksi" required>
                                </div>
                                <div class="form-group">
                                    <label>Pilih Supplier</label>
                                    <select class="form-control" name="supplier" id="supplier" required>
                                        <option value="">- Pilih Supplier -</option>
                                        <?php 
                                            $abc = mysqli_query($conn, "SELECT id_supplier, nama FROM supplier");
                                            while($data = mysqli_fetch_assoc($abc)){
                                                echo " <option value='$data[id_supplier]'>$data[nama]</option> ";
                                            }
                                        ?>
                                    </select>
                                </div>
                                <div class="panel-footer">
                                    <button class="btn btn-info" name="submit" id="submit"><i class="fa fa-plus"></i> Tambah</button>
                                    <a href="data_stok.php" class="btn btn-danger"><i class="fas fa-arrow-left"> Kembali</i></a>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- Batas Form Isi Barang Masuk -->
            </div>
        </section>

<?php require "_footer.php"; ?>