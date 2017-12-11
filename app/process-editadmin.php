<?php 
require_once('../config/dbconfig.php');
require_once('../config/security.php');

if (isset($_POST['btnupdate'])) {
	//decalare post variables
	$fname=escape($_POST['fname']);
	$mname=escape($_POST['mname']);
	$lname=escape($_POST['lname']);
	$email=escape($_POST['emailadd']);
	$mobile=escape($_POST['mobileno']);
	$postaladd=escape($_POST['address']);

	//prepare an update
	$sql_update="UPDATE `missingpersons`.`system_admin` SET `First_Name` = '".$fname."', `Middle_Name` = '".$mname."', `Last_Name` = '".$lname."', `Email_address` = '".$email."', `Mobile_No` = '".$mobile."', `Postal_Address` = '".$postaladd."' WHERE `system_admin`.`UserID` = 'franklinokech@gmail.com' ";
	$query_run=mysqli_query($conn,$sql_update);
	if ($query_run) {
		?>
		<script type="text/javascript">
			alert('Update is successful...');
			window.location.assign('../views/admin_dashboard.php');
		</script>
		<?php
		
	}else{
		header("refrsh:2;url=../views/editadminprofile.php");
		echo "error has occurred while updating...check your internet connection";
	}
		
	}//END OF IF UPDate button is clicked	
	
?>