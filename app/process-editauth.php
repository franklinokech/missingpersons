<?php 
require_once('../config/dbconfig.php');
require_once('../config/security.php');
//$_SESSION['Authorised'];

if (isset($_POST['btnupdate'])) {
	//decalare post variables
	$fname=escape($_POST['fname']);
	$mname=escape($_POST['mname']);
	$lname=escape($_POST['lname']);
	$email=escape($_POST['emailadd']);
	$mobile=escape($_POST['mobileno']);
	

	//prepare an update
	$sql_update="UPDATE `missingpersons`.`user` SET `First_Name` = '".$fname."', `Middle_Name` = '".$mname."', `Last_Name` = '".$lname."', `Email` = '".$email."', `Phone_No` = '".$mobile."' WHERE `user`.`Username` = '".$_SESSION['Authorised']."' ";
	$query_run=mysqli_query($conn,$sql_update);
	if ($query_run) {
		?>
		<script type="text/javascript">
			alert('Update is successful...');
			window.location.assign('../views/authorised/authoriseddashboard.php');
		</script>
		<?php
		
	}else{
		header("refrsh:2;url=../views/authorised/editadminprofile.php");
		echo "error has occurred while updating...check your internet connection";
		
	}
		
	}//END OF IF UPDate button is clicked	
	
?>