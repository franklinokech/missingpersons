<?php 
require_once('../config/dbconfig.php');
require_once('../config/security.php');
//start of user signup control
if(isset($_POST['btnCreateAcc'])){
            $fname=  escape(strtoupper($_POST['txtFirstName']));
            $lname=  escape(strtoupper($_POST['txtLastName']));
            $email=  escape(strtolower($_POST['txtEmail']));
            $creatpasswd=  escape($_POST['pwdPass']);
            $confirm_passwd=  escape($_POST['confirmPass']);
            
            //check if the two password match
                if (!(($creatpasswd)==($confirm_passwd))){
                    echo 'Password do match';
                }  else if(!(strlen($creatpasswd)>=6)){
                    echo 'Password must be atleast six characters';
                } 
                
                //insert into tblsignup
                else {
        $query="INSERT INTO `tblmembership_signup` (`First_Name`, `Last_Name`, `Email`, `Password`) VALUES (?,?,?,?)";
        $sql= mysqli_prepare($conn,$query);
        mysqli_stmt_bind_param($sql,'ssss', $fn,$ln,$email_add,$pass);
        $fn=$fname;
        $ln=$lname;
        $email_add=$email;
        $pass=  md5($creatpasswd);
        
        if(mysqli_stmt_execute($sql)){
        echo 'thank you for registering with us...';
        //route to welcome page
                }else{
                    echo 'erro'.  mysqli_error($conn);
                }
        }
        
                }
//end of user signup control

?>