<?php 
include "fpdf.php";
include "../koneksi.php";

$pdf = new FPDF();
$pdf->AddPage();

$pdf->SetFont('Arial','B',16);
$pdf->Cell(0,5,'Ivantory Corporation','0','1','C',false);
$pdf->SetFont('Arial','i',8);
$pdf->Ln(1);
$pdf->Cell(0,5,'Alamat : Jl. Wonosari Wetan 1/22 A Surabaya Jawa Timur','0','1','C',false);
$pdf->Cell(0,5,'Kontak : shandiarivan03@gmail.com','0','1','C',false);
$pdf->Ln(3);
$pdf->Cell(190,0.6,'','0','1','C',true);
$pdf->Ln(5);

$pdf->SetFont('Arial','B',9);
$pdf->Cell(50,5,'Laporan Data Masuk','0','1','L',false);
$pdf->Ln(3);

$pdf->SetFont('Arial','B',8.5);
$pdf->Cell(8,6,'No.',1,0,'C');
$pdf->Cell(28,6,'Kode Barang',1,0,'C');
$pdf->Cell(39,6,'Nama Barang',1,0,'C');
$pdf->Cell(30,6,'Tgl Masuk',1,0,'C');
$pdf->Cell(34,6,'Nama Supplier',1,0,'C');
$pdf->Cell(20,6,'Jml Masuk',1,0,'C');
$pdf->Cell(30,6,'Keterangan',1,0,'C');
$pdf->Ln(2);

$no = 0;
$sql= mysqli_query($conn,"SELECT * FROM tbl_datamasuk ORDER BY id_datamasuk DESC");
while ($data = mysqli_fetch_array($sql)) {
    $no++;
    $pdf->Ln(4);
    $pdf->SetFont('Arial','',8.5);
    $pdf->Cell(8,4,$no.".",1,0,'C');
    $pdf->Cell(28,4,$data['kode_barang'],1,0,'L');
    $pdf->Cell(39,4,$data['nama_barang'],1,0,'L');
    $pdf->Cell(30,4,$data['tgl_masuk'],1,0,'L');
    $pdf->Cell(34,4,$data['supplier'],1,0,'L');
    $pdf->Cell(20,4,$data['jml_masuk'],1,0,'C');
    $pdf->Cell(30,4,$data['keterangan'],1,0,'L');

}

$pdf->Output();

?>