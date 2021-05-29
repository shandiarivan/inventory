<?php 
ob_start();
include "fpdf.php";
include "../koneksi.php";

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,5,'Ivantory App','0','1','C',false);
$pdf->SetFont('Arial','i',8);
$pdf->Ln(1);
$pdf->Cell(0,5,'Alamat : Jl. Wonosari Wetan 1/22 A Surabaya Jawa Timur','0','1','C',false);
$pdf->Cell(0,5,'Kontak : shandiarivan03@gmail.com','0','1','C',false);
$pdf->Ln(3);
$pdf->Cell(190,0.6,'','0','1','C',true);
$pdf->Ln(5);

$pdf->SetFont('Arial','B',9);
$pdf->Cell(50,5,'Laporan Barang Masuk','0','1','L',false);
$pdf->Ln(3);

$pdf->SetFont('Arial','B',8.5);
$pdf->Cell(8,6,'No.',1,0,'C');
$pdf->Cell(30,6,'Tgl Masuk',1,0,'C');
$pdf->Cell(30,6,'Kode Barang',1,0,'C');
$pdf->Cell(35,6,'Nama Barang',1,0,'C');
$pdf->Cell(25,6,'Jml Masuk',1,0,'C');
$pdf->Cell(30,6,'Supplier',1,0,'C');
$pdf->Cell(32,6,'Keterangan',1,0,'C');
$pdf->Ln(2);

if(isset($_GET['filter']) && ! empty($_GET['filter'])){ 
    $filter = $_GET['filter']; 

    if($filter == '1'){ 
        $tgl = date('d-m-y', strtotime($_GET['tanggal']));

        echo '<b>Data Transaksi Tanggal '.$tgl.'</b><br /><br />';

        $query = "SELECT * FROM tbl_lap_bm WHERE DATE(tgl_masuk)='".$_GET['tanggal']."' "; 
    }else if($filter == '2'){ 
        $nama_bulan = array('', 'Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember');

        echo '<b>Data Transaksi Bulan '.$nama_bulan[$_GET['bulan']].' '.$_GET['tahun'].'</b><br /><br />';

        $query = "SELECT * FROM tbl_lap_bm WHERE MONTH(tgl_masuk)='".$_GET['bulan']."' AND YEAR(tgl_masuk)='".$_GET['tahun']."' "; 
    }else if($filter == '3'){ 
        echo '<b>Data Transaksi Tahun '.$_GET['tahun'].'</b><br /><br />';

        $query = "SELECT * FROM tbl_lap_bm WHERE YEAR(tgl_masuk)='".$_GET['tahun']."' "; 
    }else{

        echo '<b>Data Transaksi Periode '.$_GET['dari'].'  '.$_GET['sampai'].'</b>';

        $query = "SELECT * FROM tbl_lap_bm WHERE DATE(tgl_masuk) BETWEEN '".$_GET['dari']."' AND '".$_GET['sampai']."'  ";
    }
}else{ // Jika user tidak memilih filter
    echo '<b>Semua Data Transaksi</b><br /><br />';

    $query = "SELECT * FROM tbl_lap_bm ORDER BY id_lap DESC "; 
}
	
$no = 0;
$sql = mysqli_query($conn,$query);
$row = mysqli_num_rows($sql);

if($row > 0){
    while ($data = mysqli_fetch_array($sql)) {
        $no++;
        $pdf->Ln(4);
        $pdf->SetFont('Arial','',8.5);
        $pdf->Cell(8,4,$no.".",1,0,'C');
        $pdf->Cell(30,4,$data['tgl_masuk'],1,0,'L');
        $pdf->Cell(30,4,$data['kode_barang'],1,0,'L');
        $pdf->Cell(35,4,$data['nama_barang'],1,0,'L');
        $pdf->Cell(25,4,$data['jml_masuk'],1,0,'C');
        $pdf->Cell(30,4,$data['supplier'],1,0,'L');
        $pdf->Cell(32,4,$data['keterangan'],1,0,'L');

    }
}else{
    // echo "<tr><td colspan='8'>Data tidak ada</td></tr>";
    $pdf->Cell(30,8,'Data Kosong',1,0,'C');
}

ob_end_clean();
$pdf->Output();

?>