<?php
require_once('../config/dbconfig.php');
require_once('../config/security.php');

//check if the submit button is pressed and process
//check if the submit button is pressed and process
if(isset($_POST['submit'])){
	
	//get the data entered in the forms
	$fullname=escape($_POST['name']);
	$age=escape($_POST['age']);
	$height=escape($_POST['height']);
	$weight=escape($_POST['weight']);
	$gender=escape($_POST['sex']);
	$skincolor=escape($_POST['skincolor']);
	$haircolor=escape($_POST['haircolor']);
	$eyecolor=escape($_POST['eyecolor']);
	$datefound=escape($_POST['datepicker']);
	$desc=escape($_POST['desc']);
	$tmpimage=$_FILES['missingpicture']['tmp_name'];
	$image=$_FILES['missingpicture']['name'];
	$target="../storage/img/".$image;
	$nationalid=escape($_POST['txtid']);
	$county=escape($_POST['county']);
	$subcounty=escape($_POST['txtsubcounty']);
	$location=escape($_POST['txtlocation']);
	
	$village=escape($_POST['txtvillage']);

	
	//move the selected file to the storage/img folder
	move_uploaded_file($tmpimage,$target);
	
	//prepare query to insert the objects
	$sql="INSERT INTO `missingpersons`.`lostandfound` (`ID`, `Full_Name`, `Image`, `Age`, `Height`, `Weight`, `Gender`, `SkinColor`, `HairColor`, `EyeColor`, `Description`, `Date_Reported`, `County`, `SubCounty`, `Location`, `Village`, `Reporter_ID`) VALUES (NULL, '".$fullname."', '".$image."', '".$age."', '".$height."', '".$weight."', '".$gender."', '".$skincolor."', '".$haircolor."', '".$eyecolor."', '".$desc."', CURRENT_TIMESTAMP, '".$county."', '".$subcounty."', '".$location."', '".$village."', '".$nationalid."')";
	
	//execute the query
	$query_run=mysqli_query($conn,$sql);
	//dispaly feedback
	if($query_run){
	?>
    <script type="text/javascript">
   window.alert("Thank you for submitting the lost and found");
   window.location="../views/manager/managerdashboard.php"
    </script>
    <?php
		}else{
			echo "upload failed";
			}
	
	}//end of if the submit is selected
?>


