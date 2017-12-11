<?php 
require_once('fpdf/fpdf.php');
require_once('config/dbconfig.php');
$pdf=new FPDF();

$pdf->AddPage();
$pdf->SetFont('Arial',"",10);
$pdf->Image('storage/img/logo.jpg',10,8,20,13,'JPG');
$pdf->cell(20,18,"",0);
$pdf->cell(150,10,'MissingPersons App',0);
$pdf->SetFont('Arial','',9);
$pdf->cell(50,10,'Date: '.date('d-m-Y').'',0);
$pdf->Ln(15);
$pdf->SetFont('Arial','B',11);
$pdf->cell(70,8,'',0);
$pdf->cell(100,8,'MISSING PERSONS REPORT',0);
$pdf->Ln(15);
$pdf->SetFont('Arial','B',8);
$pdf->cell(15,8,'S/No',0);
$pdf->cell(80,8,'Full Names',0);
$pdf->cell(40,8,'Age',0);
$pdf->cell(25,8,'Gender',0);
$pdf->cell(25,8,'Date Missing',0);
$pdf->Ln(8);
$pdf->SetFont('Arial','',8);

$missing=mysqli_query($conn,"SELECT * FROM missing ORDER BY Full_Name");
$sno=0;
while ($row=mysqli_fetch_array($missing)) {
	$sno=$sno+1;
	$pdf->cell(15,8,$sno,0);
	$pdf->cell(80,8,$row['Full_Name'],0);
	$pdf->cell(40,8,$row['Age'],0);
	$pdf->cell(25,8,$row['Gender'],0);
	$pdf->cell(25,8,$row['Date_Missing'],0);
	$pdf->Ln(8);
}
$pdf->Output();
?>