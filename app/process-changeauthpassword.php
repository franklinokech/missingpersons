<?php 
require_once('../config/dbconfig.php');
require_once('../config/security.php');


if (isset($_POST['btnChangePass'])) {
	$oldpass=escape(md5($_POST['pwdOldpass']));
	$newpass=escape($_POST['pwdNewpass']);
	$cnewpass=escape($_POST['pwdCNewpass']);

	//check if old password is correct
	$sql="SELECT `Password` FROM user WHERE `Username`='".$_SESSION['Authorised']."'";
	$sql_query=mysqli_query($conn,$sql);
	while ($row=mysqli_fetch_assoc($sql_query)) {
		$oldpassword=$row['Password'];
	}//end of while loop
	if (strcmp($oldpassword, $oldpass)==0) {
		//check if new and confirmed password match
		if (strcmp($newpass, $cnewpass)==0) {
			//check the length
	if (strlen($newpass)<8) {
		?>
		<script type="text/javascript">
			alert('Password must be atleast 6 characters');
			window.location.assign('../views/authorised/editadminprofile.php');
		</script>
		<?php
	}//end of if password is too short
	else{
		//encypt the password
		$encyptedpass=md5($newpass);
		//prepare an update sql
		$sqlUpdate="UPDATE `missingpersons`.`user` SET `Password` = '".$encyptedpass."' WHERE `user`.`Username` = '".$_SESSION['Authorised']."' ";
		//run query
		$query_run=mysqli_query($conn,$sqlUpdate);
		if ($query_run) {
			?>
			<script type="text/javascript">
				alert('Password is changed successfully');
				window.location.assign('../views/authorised/authoriseddashboard.php');
			</script>
			<?php
		}//end of if query has runned successfully
		else{
			echo "Error has occurred".mysqli_error($conn);
		}
	}//end of id password is atleast 6 chars
			
		}//end of if new and confirmed pass match
		else{
			echo "the password do not match";
		}
	}//end of if old password doe not matche
	else{
		echo "incorrect old password";
	}

}//end of if change password button is pressed
?>