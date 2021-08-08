<?php
include '../config/koneksi.php';
require('assets/pdf/fpdf.php');

$pdf = new FPDF("L","cm","A4");

$pdf->SetMargins(2,1,1);
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times','B',11);
$pdf->Image('../img/logo.png',1,1,2,2);
$pdf->SetX(4);            
$pdf->MultiCell(19.5,0.5,'PABRIK BERAS ORYZA',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'Telpon : 085920681351',0,'L');    
$pdf->SetFont('Arial','B',10);
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'	Desa. Naluk ',0,'L');
$pdf->SetX(4);
$pdf->MultiCell(19.5,0.5,'website : www.pabrikberasoryza.rf.gd email : pabrikberasoryza@gmail.com',0,'L');
$pdf->Line(1,3.1,28.5,3.1);
$pdf->SetLineWidth(0.1);      
$pdf->Line(1,3.2,28.5,3.2);   
$pdf->SetLineWidth(0);
$pdf->ln(1);
$pdf->SetFont('Arial','B',14);
$pdf->Cell(25.5,0.7,"Laporan Data Total Penjualan",0,10,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(5,0.7,"Di cetak pada : ".date("D-d/m/Y"),0,0,'C');
$pdf->ln(1);
$pdf->SetFont('Arial','B',10);
//26
$pdf->Cell(1, 1, 'No', 1, 0, 'C');
$pdf->Cell(2, 1, 'Id Pesanan', 1, 0, 'C');
$pdf->Cell(2, 1, 'Id Barang', 1, 0, 'C');
$pdf->Cell(5, 1, 'Nama', 1, 0, 'C');
$pdf->Cell(4, 1, 'Tanggal Beli', 1, 0, 'C');
$pdf->Cell(3, 1, 'Jumlah', 1, 0, 'C');
$pdf->Cell(3, 1, 'Harga', 1, 0, 'C');
$pdf->Cell(3, 1, 'Total Bayar', 1, 1, 'C');
$pdf->SetFont('Arial','',10);
$no=1;
$query=mysqli_query($koneksi, "select * from penjualan");
while($lihat=mysqli_fetch_array($query)){
	//26
	$pdf->Cell(1, 1, $no , 1, 0, 'C');
	$pdf->Cell(2, 1, $lihat['id_pesanan'],1, 0, 'C');
	$pdf->Cell(2, 1, $lihat['id_barang'],1, 0, 'C');
	$pdf->Cell(5, 1, $lihat['nama_konsumen'], 1, 0,'C');
	$pdf->Cell(4, 1, $lihat['tanggal_beli'],1, 0, 'C');
	$pdf->Cell(3, 1, $lihat['jumlah_beli'], 1, 0,'C');
	$pdf->Cell(3, 1, $lihat['harga'], 1, 0,'C');
	$pdf->Cell(3, 1, $lihat['total_bayar'], 1, 1,'C');

	// $pdf->Cell(10, 0.8, $lihat['deskripsi'],1, 0, 'C');
	// $pdf->Cell(2, 0.8, $lihat['gambar'], 1, 1,'C');
	$no++;
}

$pdf->Output("laporan_barang.pdf","I");

?>

