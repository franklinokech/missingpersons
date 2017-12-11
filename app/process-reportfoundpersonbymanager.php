<?php 
require_once('../config/dbconfig.php');
require_once('../config/security.php');


//check if the button report a found person isclicked
if (isset($_POST['btnreportfound'])) {
	$foundid=$_POST['txtid'];
	$_SESSION['missingid']=$foundid;


	$slq="SELECT `ID`,`Full_Name`,`Image`,`Age`,`Height`,`Weight`,`Gender`,`SkinColor`,`HairColor`,`EyeColor`,`Description`,`Reporter_ID` FROM missing WHERE missing.ID='".$foundid."'";
	$sql_run=mysqli_query($conn,$slq);
	$sql_num_rows=mysqli_num_rows($sql_run);
	if($sql_num_rows==1){
		while ($row=mysqli_fetch_assoc($sql_run)) {
			$_SESSION['fullname']=$row['Full_Name'];
			$_SESSION['img']=$row['Image'];
			$_SESSION['age']=$row['Age'];
			$_SESSION['height']=$row['Height'];
			$_SESSION['weight']=$row['Weight'];
			$_SESSION['gender']=$row['Gender'];
			$_SESSION['skincolor']=$row['SkinColor'];
			$_SESSION['haircolor']=$row['HairColor'];
			$_SESSION['eyecolor']=$row['EyeColor'];
			$_SESSION['desc']=$row['Description'];
            $_SESSION['reporter_id']=$row['Reporter_ID'];


			

		}//end of while loop to fetch data

		?>
		<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/style.css">
    <!-- Load jQuery from Google's CDN -->
    <!-- Load jQuery UI CSS  -->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <style type="text/css"><!--start of stylish form css-->
    
    	input {
   	    width: 100%;
		}
		input[type=text] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
}
	input[type=text] {
    border: 2px solid red;
    border-radius: 4px;
}
	input[type=text] {
    border: none;
    border-bottom: 2px solid red;
}
input[type=text]:focus {
    background-color: lightblue;
}
	textarea {
    width: 100%;
    height: 150px;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #f8f8f8;
    resize: none;
}
select {
    width: 100%;
    padding: 16px 20px;
    border: none;
    border-radius: 4px;
    background-color: #f1f1f1;
}
input[type=button], input[type=submit], input[type=reset] {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
}
    </style><!--end of stylish form css-->
    
    <!-- Load jQuery JS -->
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <!-- Load jQuery UI Main JS  -->
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    
    <!-- Load SCRIPT.JS which will create datepicker for input field  -->
    <script src="script.js"></script>
    
    <link rel="stylesheet" href="runnable.css" />
    <script>
    	/*  jQuery ready function. Specify a function to execute when the DOM is fully loaded.  */
$(document).ready(
  
  /* This is the function that will get executed after the DOM is fully loaded */
  function () {
    $( "#datepicker" ).datepicker({
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    });
  }

);
    </script>
    
    
      
</head>
	<!--start of header bar -->
	<div class="container">
	<div class="row">
		<div class="page-header">
         <a href="../views/manager/managerdashboard.php" style="text-decoration: none;color: rgb(51,51,51);"> <h1>Kenyan Missing</h1></a>
          <span class="icon-bar">
            <i class="glyphicon glyphicon-tower" aria-hidden="true"></i>
          </span>
          <h2>Help to helpless</h2>
        </div>
	</div>
</div>
<!--end of header bar-->
			<!--start of flat ui form-->
<div class="container">
	<div class="row">
    <div class="col-md-4">
		<div class="form_main">
                <h4 class="heading" style="color:red;"><strong>Report </strong> Lost and Found<span></span></h4>
                <div class="form">
               <form action="" method="post" id="contactFrm" name="contactFrm">
                	<fieldset><legend>Reporter's Details</legend>
                    <input type="text" required="" placeholder="National ID Number" value="" name="txtid" class="txt">
                    
                    <select name="county" id="county">
                    	<option>--Current County of Residence--</option>
                        <?php 
						$sql2="SELECT * FROM `kenya_counties` ORDER BY `Name` ASC";
						$query_run2=mysqli_query($conn,$sql2);
						while($row2=mysqli_fetch_assoc($query_run2)){
							?>
                            <option value="<?php echo $row2['Name'];?>"><?php echo $row2['Name'];?></option>
                            <?php
							
							}
						?>
                    </select>
                    <input type="text" required="" placeholder="Subcounty" value="" name="txtsubcounty" class="txt">
                    <input type="text" required="" placeholder="Location" value="" name="txtlocation" class="txt">
                    
                    <input type="text" required="" placeholder="Village/Estate" value="" name="txtvillage" class="txt">
                    
                     <input type="submit" value="Report" name="submit" class="txt2">
                     </fieldset>
                </form><!-- end of reporter details form-->
            </div>
            </div>
            </div
	></div>
</div>

<!--end of flat ui form-->
	<?php	
	}//end of if one row is found

}//end of if the btnreportfound is clicked 
if (isset($_POST['submit'])) {
	//declare post variables
	$idno=escape($_POST['txtid']);
	$countyname=escape($_POST['county']);
	$subcountyname=escape($_POST['txtsubcounty']);
	$locationname=escape($_POST['txtlocation']);
	$villagename=escape($_POST['txtvillage']);

	//check if the id exist in the database
	$sql3="SELECT `National_ID` FROM dummy_registry WHERE `National_ID`='".$idno."'";
	$query_run3=mysqli_query($conn,$sql3);
	$sql_num_rows3=mysqli_num_rows($query_run3);
	if($sql_num_rows3==1){

        //obtain email address of the missing person reporter from admin table.
        $sqlgetemail="SELECT `Email_address` FROM system_admin WHERE `National_ID`='".$_SESSION['reporter_id']."' ";
        $sqlrungetemail=mysqli_query($conn,$sqlgetemail);
        $sql_num_rowemail=mysqli_num_rows($sqlrungetemail);
        if ($sql_num_rowemail==1) {
            while ($rowemail=mysqli_fetch_assoc($sqlrungetemail)) {
                $reporteremail=$rowemail['Email_address'];
            }//end of while
        }//end of if
        elseif ($sql_num_rowemail==0) {
            //get the email from the user tbl
            $sqlgetuseremail="SELECT `Email` FROM user WHERE `National_ID`='".$_SESSION['reporter_id']."'";
            $sqlrunusermail=mysqli_query($conn,$sqlgetuseremail);
            $sqlnumusermail=mysqli_num_rows($sqlrunusermail);
            if ($sqlnumusermail==1) {
                while ($rowusermail=mysqli_fetch_assoc($sqlrunusermail)) {
                    $reporteremail=$rowusermail['Email'];
                }//end of while
            }//end of if
            elseif ($sqlnumusermail==0) {
                //check email in searcher table
                $sqlsearchermail="SELECT `Email` FROM searcher WHERE `ID_No`='".$_SESSION['reporter_id']."' ";
                $sqlrunsearchermail=mysqli_query($conn,$sqlsearchermail);
                $sqlnumsearchermail=mysqli_num_rows($sqlrunsearchermail);
                if ($sqlnumsearchermail==1) {
                    while ($rowsearchermail=mysqli_fetch_assoc($sqlrunsearchermail)) {
                        $reporteremail=$rowsearchermail['Email'];
                    }
                }//end of if
            }
        }

		//prepare sql to insert the details into lost and found table
        //echo $reporteremail;
        $_SESSION['reporteremail']=$reporteremail;
		$sql4="INSERT INTO `missingpersons`.`lostandfound` (`ID`, `Full_Name`, `Image`, `Age`, `Height`, `Weight`, `Gender`, `SkinColor`, `HairColor`, `EyeColor`, `Description`, `Date_Reported`, `County`, `SubCounty`, `Location`, `Village`, `Reporter_ID`) VALUES (NULL, '".$_SESSION['fullname']."', '".$_SESSION['img']."', '".$_SESSION['age']."', '".$_SESSION['height']."', '".$_SESSION['weight']."', '".$_SESSION['gender']."', '".$_SESSION['skincolor']."', '".$_SESSION['haircolor']."', '".$_SESSION['eyecolor']."', '".$_SESSION['desc']."', CURRENT_TIMESTAMP, '".$countyname."', '".$subcountyname."', '".$locationname."', '".$villagename."', '".$idno."')";
		if($sql_run4=mysqli_query($conn,$sql4)){
			//echo $_SESSION['missingid'];
			//prepare sql to delete the person from the missing persons list
			$sql5="DELETE FROM `missing` WHERE ID='".$_SESSION['missingid']."'";
			$sql_run5=mysqli_query($conn,$sql5);
			?>
    <script type="text/javascript">
   window.alert("thank you reporting the lost and found");
   window.location="../views/manager/emailconcernedperson.php"
    </script>
    <?php

		}//end of query runs succesffully	

	}//end of if id is available in the database
	else{
		header("Refresh: 5; url=../views/manager/displaymissingpersons.php");
		echo "national id number does not exist in our database";
	}

}//end of if the reporter final submit his details

?>
