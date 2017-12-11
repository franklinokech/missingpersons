<?php 
require_once('../config/dbconfig.php');
require_once('../config/security.php');
require_once('../fpdf/fpdf.php');

//generate report
if (isset($_POST['generate'])) {
    //declare post var
    $startdate=escape($_POST['datepicker']);
    $enddate=escape($_POST['datepicker1']);
    
    $pdf=new FPDF();

$pdf->AddPage();
$pdf->SetFont('Arial',"",10);
$pdf->Image('../storage/img/logo.jpg',10,8,20,13,'JPG');
$pdf->cell(20,18,"",0);
$pdf->cell(150,10,'MissingPersons App',0);
$pdf->SetFont('Arial','',9);
$pdf->cell(50,10,'Date: '.date('d-m-Y').'',0);
$pdf->Ln(15);
$pdf->SetFont('Arial','B',11);
$pdf->cell(70,8,'',0);
$pdf->cell(100,8,'FOUND PERSONS REPORT',0);
$pdf->Ln(15);
$pdf->SetFont('Arial','B',8);
$pdf->cell(15,8,'S/No',0);
$pdf->cell(80,8,'Full Names',0);
$pdf->cell(40,8,'Age',0);
$pdf->cell(25,8,'Gender',0);
$pdf->cell(25,8,'Date Found',0);
$pdf->Ln(8);
$pdf->SetFont('Arial','',8);

$missing=mysqli_query($conn,"SELECT * FROM found WHERE (`Date_Reported` BETWEEN '".$startdate."' AND '".$enddate."') ORDER BY Full_Name");
$sno=0;
while ($row=mysqli_fetch_array($missing)) {
    $sno=$sno+1;
    $pdf->cell(15,8,$sno,0);
    $pdf->cell(80,8,$row['Full_Name'],0);
    $pdf->cell(40,8,$row['Age'],0);
    $pdf->cell(25,8,$row['Gender'],0);
    $pdf->cell(25,8,$row['Date_Reported'],0);
    $pdf->Ln(8);
}
$pdf->Output();



}
    
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../bootstrap/css/style.css">
    <!-- Load jQuery from Google's CDN -->
    <!-- Load jQuery UI CSS  -->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <style type="text/css"><!--start of stylish form css-->
    
    	input {
   	    width: 100%;
		}
		input[type=text] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
}
	input[type=text] {
    border: 2px solid red;
    border-radius: 4px;
}
	input[type=text] {
    border: none;
    border-bottom: 2px solid red;
}
input[type=text]:focus {
    background-color: lightblue;
}
	textarea {
    width: 100%;
    height: 150px;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #f8f8f8;
    resize: none;
}
select {
    width: 100%;
    padding: 16px 20px;
    border: none;
    border-radius: 4px;
    background-color: #f1f1f1;
}
input[type=button], input[type=submit], input[type=reset] {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
}
    </style><!--end of stylish form css-->
    
    <!-- Load jQuery JS -->
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <!-- Load jQuery UI Main JS  -->
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    
    <!-- Load SCRIPT.JS which will create datepicker for input field  -->
    <script src="script.js"></script>
    
    <link rel="stylesheet" href="runnable.css" />
    <script>
    	/*  jQuery ready function. Specify a function to execute when the DOM is fully loaded.  */
$(document).ready(
  
  /* This is the function that will get executed after the DOM is fully loaded */
  function () {
    $( "#datepicker" ).datepicker({dateFormat: 'yy-mm-dd',
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    }).val();

    $( "#datepicker1" ).datepicker({dateFormat: 'yy-mm-dd',
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    }).val();
  }

);
    </script>
    
    
      
</head>
	<!--start of header bar -->
	<div class="container">
	<div class="row">
		<div class="page-header">
          <a href="admin_dashboard.php" style="text-decoration: none;color: rgb(51,51,51);"><h1>Kenyan Missing</h1></a>
          <span class="icon-bar">
            <i class="glyphicon glyphicon-tower" aria-hidden="true"></i>
          </span>
          <h2>Help to helpless</h2>
        </div>
	</div>
</div>
<!--end of header bar-->
<!--start of flat ui form-->
<div class="container">
	<div class="row">
    <div class="col-md-4">
		<div class="form_main">
                <h4 class="heading" style="color:red;"><strong>Generate </strong> Found Persons Report <span></span></h4>
                <form method="POST" action="">
                <input type="text" required="" placeholder="Start Date(mm/dd/yyyy)" id="datepicker" value="" name="datepicker" class="txt">

                <input type="text" required="" placeholder="End Date(mm/dd/yyyy)" id="datepicker1" value="" name="datepicker1" class="txt">


                <div class="col-md-8">
                   <!-- <button id="CREATE" name="CREATE" class="btn btn-success" type="submit">CREATE</button>-->
                   <input type="submit" name="generate"  id="generate" class="btn btn-success" value="GENERATE">

                    <input type="button" class="btn btn-danger" value="CANCEL" onClick="window.location='admin_dashboard.php';">
                </div>
                </form>