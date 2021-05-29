<?php 
session_start();
include "koneksi.php";

if(!isset($_SESSION['id_admin'])){
    echo"<script>location='index.php';</script>";
    exit();
}

$sql = "SELECT * FROM tbl_databarang";
$query = mysqli_query($conn, $sql);
$databarang = mysqli_num_rows($query);

$sql2 = "SELECT * FROM tbl_datamasuk";
$query2 = mysqli_query($conn, $sql2);
$datamasuk = mysqli_num_rows($query2);

$sql3 = "SELECT * FROM tbl_datakeluar";
$query3 = mysqli_query($conn, $sql3);
$datakeluar = mysqli_num_rows($query3);

?>

<?php require "_header.php"; ?>

        <section class="content">
            <div class="inner">
                <?php 
                    if(@$_SESSION['id_admin']){
                        $nama_user= @$_SESSION['id_admin'];
                    }
                ?>
                <h3 class="alert alert-success">Selamat Datang, <?php echo $nama_user['nama']; ?> </h3>

                <div class="table-content">
                    <div class="box">
                        <img src="dist/img/signing.jpg" alt="boxed" width="130" style="border-radius: 10px;">
                        <p>Data Masuk</p>
                        <p><?= $datamasuk; ?> Data</p>
                        <a href="_datamasuk/data_masuk.php" class="btn btn-primary"><i class="fas fa-sign-in-alt"></i> Lihat</a > 
                    </div>
                </div>

                <div class="table-content1">
                    <div class="box1">
                        <img src="dist/img/holding.jpg" alt="boxed" width="130" style="border-radius: 10px;">
                        <p>Data Barang</p>
                        <p><?= $databarang; ?> Data</p>
                        <a href="_barang/barang.php" class="btn btn-primary"><i class="fas fa-box"></i> Lihat</a> 
                    </div>
                </div>

                <div class="table-content2">
                    <div class="box2">
                        <img src="dist/img/shipping.jpg" alt="boxed" width="130" style="border-radius: 10px;">
                        <p>Data Keluar</p>
                        <p><?= $datakeluar; ?> Data</p>
                        <a href="_datakeluar/data_keluar.php" class="btn btn-primary"><i class="fas fa-sign-out-alt"></i> Lihat</a> 
                    </div>
                </div>
        
                
                
            </div>
        </section>

<?php require "_footer.php"; ?>    

