<?php
require_once('../config/dbconfig.php');
require_once('../config/security.php');

if(isset($_POST['CREATE'])){
	$nationalid=escape($_POST['national_id']);
	$username=escape($_POST['USERNAME']);
	$password=md5($_POST['ADDPASSWORD']);
	$confirmpass=md5($_POST['confirmpass']);
	$email=escape($_POST['MAILID']);
	$organisation=escape($_POST['ORGANISATION']);
	$location=escape($_POST['LOCATION']);
	$role=escape($_POST['ROLE']);

	//check if the national id exist in the registry
	$sql_checkid="SELECT * FROM `dummy_registry` WHERE `National_ID`='".$nationalid."'";
	$sql_run=mysqli_query($conn,$sql_checkid);
	$sql_rows=mysqli_num_rows($sql_run);
	if ($sql_rows!=1) {
		header("refresh:3;url=../views/adduser.php");
		echo "The national id does not exist in our database";
	}//end of if national id does not exist in database
	else if($sql_rows==1){
	
	//check if the two passwords match
	if (!($password==$confirmpass)) {
		header("refresh:3;url=../views/adduser.php");
		echo "Password do not match";
	}else{
	
	$sql="INSERT INTO `missingpersons`.`user` (`Username`, `Password`,`National_ID`, `Role`, `Email`, `Status`, `Organisation`, `Location`) VALUES (?, ?, ?, ?, ?, '1',?,?)";
	//prepare statement
	$sql_prepare=mysqli_prepare($conn,$sql);
	mysqli_stmt_bind_param($sql_prepare,'sssssss',$usernme,$pass,$natid, $role,$mail,$organ,$locale);
	
	$usernme=$username;
	$pass=$password;
	$natid=$nationalid;
	$roles=$role;
	$mail=$email;
	$organ=$organisation;
	$locale=$location;
	
	if(mysqli_execute($sql_prepare)){
		?>
                	<script>window.alert("User added successfully");</script>
                    <script>window.location="../views/adduser.php";</script>
                    <?php
		
		}
	
	 }//end of if password match
   }//end of if national id exists in the database
}//ed of action when the form is submitted
	
	
	

?>