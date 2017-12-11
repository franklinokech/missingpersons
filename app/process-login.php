
<?php
require_once('../config/dbconfig.php');
require_once('../config/security.php');
        // start processing login
        if(isset($_POST['login-submit'])){
            $userid=  escape($_POST['username']);
            $password=  escape(md5($_POST['password']));   
        
       //select login details from signup table
	   $sql="SELECT * FROM `system_admin` WHERE `UserID`='".$userid."' AND `Password`='".$password."' ";
        
        
        //execute the query
        $query_run=  mysqli_query($conn,$sql);
        //check if the num of rows is equal to one
        $num_rows=mysqli_num_rows($query_run);
    
        if($num_rows==1){
			while($row=mysqli_fetch_assoc($query_run)){
				$username=$row['UserID'];
				$nationalid=$row['National_ID'];
				$_SESSION['Username']=$username;
				
				

						header('Location: ../views/admin_dashboard.php');
				
				}
				
      
        }//end of if num rows equal to one
		else if($num_rows==0){
			//check in the users table
			$sql2="SELECT * FROM `user` WHERE Binary Username=Binary '".$userid."' AND Binary Password=Binary '".$password."' ";
			$query_run2=mysqli_query($conn,$sql2);
			 $num_rows_user2=mysqli_num_rows($query_run2);
			if($num_rows_user2==1){
				while($row2=mysqli_fetch_assoc($query_run2)){
				$userid=$row2['Username'];
				 $role=$row2['Role'];
				$_SESSION['Authorised']=$userid;
				$status=$row2['Status'];
				if($role=="Authorised_Party"){
						if($status=="1"){
							header('Location: ../views/authorised/authoriseddashboard.php');
							}//end if account is active
							else if($status=="0"){
								echo "Dear ".$_SESSION['Authorised']." Your account is blocked, contact system administrator for more details";//redirect todeactivated authorised party dashboard
								}//end of if account is deactivated
						
					}//end of if a user is a authorised user
					else if($role=="Manager"){
						if($status=="1"){
							header('location:../views/manager/managerdashboard.php');
							//redirect to authorised manager dashboard
							}//end of i account is activated
							else if($status=="0"){
								echo "Dear ".$_SESSION['Authorised']." Your account is blocked, contact system administrator for more details";//redirect to authorised party dashboard
								}//end of if account is deactivated
						
						}//end of if a manager
				
				}//end of while loop
				
				}//end of if  a user is found
				
				else if($num_rows_user2==0){
					//check searcher table
					$sql3="SELECT `Username`,`Password`,`Phone_No`,`Email`,`First_Name`,`Middle_Name`,`Last_Name`,`Status` FROM `searcher` WHERE  Binary `Username`=Binary '".$userid."' AND Binary `Password`=Binary '".$password."' ";
					
					//execute the query
				$query_run3=  mysqli_query($conn,$sql3);
				//check if the num of rows is equal to one
				$num_rows3=mysqli_num_rows($query_run3);
					
					if($num_rows3==1){
				while($row3=mysqli_fetch_assoc($query_run3)){
				$userid3=$row3['Username'];
				$status=$row3['Status'];
				$phoneno=$row3['Phone_No'];
				$Fname=$row3['First_Name'];
				$Lname=$row3['Last_Name'];
				$_SESSION['Searcher']=$userid3;
					
					if($status=="1"){
							header('Location: ../views/searcher/searcherdashboard.php');
						}//end of if status is active
						else if($status=="0"){
							echo "Dear ".$_SESSION['Searcher']." Your account is blocked, contact system administrator for more details";//redirect to active searcher dashboard
							}//end of if searcher is deactivated
				
				
				}
					}
					else if($num_rows3==0){
				echo '<p><h1>Invalid Credentials</h1></p>';
				}//end of if no result is found
					}//end of if a searcher is found
			
			}
			
	}//end of if login is set
	
?>