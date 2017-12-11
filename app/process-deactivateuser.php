<?php 
require_once('../config/dbconfig.php');
require_once('../config/security.php');
	
	$username=$_GET['user'];
	//prepare php to deactivate user
	$sql="UPDATE user SET user.Status='0' WHERE user.Username='".$username."' ";
	$sqlrun=mysqli_query($conn,$sql);
	if ($sqlrun) {
		header("refresh:2;url=../views/viewuser.php")
		?>
		<script type="text/javascript">
			alert('Account deactivated successfully');
		</script>
		<?php
	}//end of id sql runned
	else{
		echo "problem loadig page";
	}
?>
