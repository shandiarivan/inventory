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
$pdf->Cell(50,5,'Laporan Kartu Stok','0','1','L',false);
$pdf->Ln(3);

$pdf->SetFont('Arial','B',8.5);
$pdf->Cell(8,6,'No.',1,0,'C');
$pdf->Cell(30,6,'Kode Barang',1,0,'C');
$pdf->Cell(38,6,'Nama Barang',1,0,'C');
$pdf->Cell(30,6,'Tgl Transaksi',1,0,'C');
$pdf->Cell(32,6,'Keterangan',1,0,'C');
$pdf->Cell(17,6,'Masuk',1,0,'C');
$pdf->Cell(17,6,'Keluar',1,0,'C');
$pdf->Cell(17,6,'Stok',1,0,'C');
$pdf->Ln(2);


	if(isset($_GET['filter']) && ! empty($_GET['filter'])){ 
		$filter = $_GET['filter']; 

		if($filter == '1'){ 
			$tgl = date('d-m-y', strtotime($_GET['tanggal']));

			echo '<b>Data Transaksi Tanggal '.$tgl.'</b><br /><br />';

			$query = "SELECT * FROM tbl_kartustok WHERE DATE(tgl_transaksi)='".$_GET['tanggal']."'"; 
		}else if($filter == '2'){ 
			echo '<b>Data Berdasarkan Nama Barang'.$_GET['barang'].'</b><br /><br />';

            $query = "SELECT * FROM tbl_kartustok WHERE nama_barang ='".$_GET['barang']."'"; 
		}else{ 
			echo '<b>Data Berdasarkan Keterangan '.$_GET['ket'].'</b><br /><br />';

            $query = "SELECT * FROM tbl_kartustok WHERE keterangan ='".$_GET['ket']."'"; 
		}
	}else{ 
		echo '<b>Semua Data Kartu Stok</b><br /><br />';

		$query = "SELECT * FROM tbl_kartustok ORDER BY id_kartustok DESC"; 
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
        $pdf->Cell(30,4,$data['kode_barang'],1,0,'L');
        $pdf->Cell(38,4,$data['nama_barang'],1,0,'L');
        $pdf->Cell(30,4,$data['tgl_transaksi'],1,0,'L');
        $pdf->Cell(32,4,$data['keterangan'],1,0,'L');
        $pdf->Cell(17,4,$data['jml_masuk'],1,0,'C');
        $pdf->Cell(17,4,$data['jml_keluar'],1,0,'C');
        $pdf->Cell(17,4,$data['sisa'],1,0,'C');

    }
}else{
    // echo "<tr><td colspan='8'>Data tidak ada</td></tr>";
    $pdf->Cell(30,8,'Data Kosong',1,0,'C');
}

ob_end_clean();
$pdf->Output();

?>