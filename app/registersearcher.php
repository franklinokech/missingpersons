<?php
require_once('../config/dbconfig.php');
require_once('../config/security.php');
        // start processing registration
		if(isset($_POST['register-submit'])){
			$nationalID=escape($_POST['nationalID']);
			$username= escape($_POST['username']);
			$email=escape($_POST['email']);
			$password=escape($_POST['password']);
			$confirmpass=escape($_POST['confirm-password']);
			
			//process to check if the user exists in the registry
			$sql="SELECT `National_ID` FROM `dummy_registry` WHERE `National_ID`='".$nationalID."'";
			$query_run=  mysqli_query($conn,$sql);
			$query_run=mysqli_num_rows($query_run);
			
			if($query_run==1){
				//check if passwords match
				if($password==$confirmpass){
					//check the lenght of the password
					if(strlen($password)>=6){
						//prepare insert
						$_SESSION['searchername']=$_POST['username'];
						
						
						$encyptpass=md5($password);
						$sqlAddSearcher="INSERT INTO `missingpersons`.`searcher` (`Username`, `Password`,`ID_No`,`Email`) VALUES (?,?,?,?)";
						
						//prepare sql
						$sql_prepare=mysqli_prepare($conn,$sqlAddSearcher);
						//bind the parameters to field elements
	                     mysqli_stmt_bind_param($sql_prepare,'ssis',$uname,$passwd,$id,$emailAddress);
						 //assign parameters values
						$uname=$username;
						$passwd=$encyptpass;
						$id=$nationalID;
						$emailAddress=$email;
						
						//execute the statement
						if(mysqli_execute($sql_prepare)){
							header( "refresh:5;url=../index.php" ); 
							echo "Account created successfully....Redirecting";
							?>
							<?php
							}else{
								echo mysqli_error();
								}
						
						
						
						}//end of pass long
						else{
							?>
                	<script>window.alert("Password Too short");</script>
                    <script>window.location="../index.php";</script>
                    <?php
							}
					
					
					
					}//end of if password match
					else{
						?>
                	<script>window.alert("Password Do Not Match");</script>
                    <script>window.location="../index.php";</script>
                    <?php
						}
				
				}//end of check if the user exist
				else if($query_run==0){
					?>
                	<script>window.alert("National ID does not exist");</script>
                    <script>window.location="../index.php";</script>
                    <?php
					
					}// end of if the user does not exist
			
			
			//end of check if the user exists in the registry
			
			
			
			
			}//end of if the register button is clicked
		
		//end process registration
		?>