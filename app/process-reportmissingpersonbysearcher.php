<?php
require_once('../config/dbconfig.php');
require_once('../config/security.php');

//check if the submit button is pressed and process
if(isset($_POST['submit'])){
	
	//get the data entered in the forms
	$national_id=escape($_POST['natinal_id']);
	$fullname=escape($_POST['name']);
	$age=escape($_POST['age']);
	$height=escape($_POST['height']);
	$weight=escape($_POST['weight']);
	$gender=escape($_POST['sex']);
	$skincolor=escape($_POST['skincolor']);
	$haircolor=escape($_POST['haircolor']);
	$eyecolor=escape($_POST['eyecolor']);
	$datemissing=escape($_POST['datepicker']);
	$desc=escape($_POST['desc']);
	$tmpimage=$_FILES['missingpicture']['tmp_name'];
	$image=$_FILES['missingpicture']['name'];
	$target="../storage/img/".$image;
	
	//verify if the id exist in registry
	$sql_verifyid="SELECT * FROM `dummy_registry` WHERE `National_ID`='".$national_id."'";
	$sql_run=mysqli_query($conn,$sql_verifyid);
	$sql_num=mysqli_num_rows($sql_run);
	if($sql_num!=1){
		header("refresh:3;url=../views/searcher/reportmissingperson.php");
		echo "the national id does not exist in the database";
	}else if($sql_num==1){
		//move the selected file to the storage/img folder
	move_uploaded_file($tmpimage,$target);
	
	//prepare query to insert the objects
	$sql="INSERT INTO `missingpersons`.`missing` (`ID`, `Full_Name`, `Image`, `Age`, `Height`, `Weight`, `Gender`, `SkinColor`, `HairColor`, `EyeColor`, `Date_Missing`, `Description`, `Date_Reported`,`Reporter_ID`) VALUES (NULL, '".$fullname."', '".$image."', '".$age."', '".$height."', '".$weight."', '".$gender."', '".$skincolor."', '".$haircolor."', '".$eyecolor."', '".$datemissing."', '".$desc."', CURRENT_TIMESTAMP,'".$national_id."')";
	
	//execute the query
	$query_run=mysqli_query($conn,$sql);
	//dispaly feedback
	if($query_run){
		
	?>
    <script type="text/javascript">
   window.alert("Person added successfully");
   window.location="../views/searcher/searcherdashboard.php"
    </script>
    <?php
		}else{
			echo "failed".mysqli_error($conn);
			}

	}//end of if national id exist in registry
	
	
	}//end of if the submit is selected
?>