<?php 
require_once('../../config/dbconfig.php');
require_once('../../config/security.php');

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../../bootstrap/css/style.css">
    <style type="text/css">
    	hr {
    display: block;
    margin-top: 0.5em;
    margin-bottom: 0.5em;
    margin-left: auto;
    margin-right: auto;
    border-style: inset;
    border-width: 3px;
}
    </style>
</head>
<body>
	<!--start of preference bar-->
	<div class="navbar navbar-inverse nav">
    <div class="navbar-inner">
        <div class="container">
              <div class="pull-right">
                <ul class="nav pull-right">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, <?php echo $_SESSION['Authorised'];?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="editadminprofile.php"><i class="icon-cog"></i> Preferences</a></li>
                            <li><a href="contactUs.php"><i class="icon-envelope"></i> Contact Support</a></li>
                            <li class="divider"></li>
                            <li><a href="../../app/process-logout.php"><i class="icon-off"></i> Logout</a></li>
                        </ul>
                    </li>
                </ul>
              </div>
            </div>
        </div>
    </div>
</div>
<!--end of preference bar-->
<!--start of header bar -->
	<div class="container">
	<div class="row">
		<div class="page-header">
          <a href="managerdashboard.php" style="text-decoration: none;color: rgb(51,51,51);"><h1>Kenyan Missing</h1></a>
          <span class="icon-bar">
            <i class="glyphicon glyphicon-tower" aria-hidden="true"></i>
          </span>
          <h2>Help to helpless</h2>
        </div>
	</div>

<!--end of header bar-->
<!--start of stylish search box body-->
      <div class="container">
  <div class="row">
  <form method="POST" action="../../app/process-searchlostandfoundbymanager.php">
  <div class="container">
  <h2 style="color: green;"><b>Lost and Found</b></h2>
    <h2>Search By Name</h2>
           <div id="custom-search-input">
                            <div class="input-group col-md-12">
                                <input type="text" class="  search-query form-control" placeholder="Search" required="required" name="txtfullname" id="txtfullname" />
                                <span class="input-group-btn">
                                    <input type="submit" name="btnsubmitsearch" class="btn btn-danger" value="Go">
                                        <span class=" glyphicon glyphicon-search"></span>
                                    
                                </span>
                            </div>
                        </div>
                        </div>
                        </form>
  </div>
</div>
<br>
<br>
<hr>
    <!--end of stylish search box body-->

	<?php 
		$sql="SELECT * FROM lostandfound ORDER BY Date_Reported DESC";
		$query_run=mysqli_query($conn,$sql);
		$counter=0;
		$counter2=0;
		while($row=mysqli_fetch_assoc($query_run)){
			//check if image is field is null
      $id=$row['ID'];
			$img=$row['Image'];
			$name=$row['Full_Name'];
			$age=$row['Age'];
			$datereported=$row['Date_Reported'];
      $reporter_id=$row['Reporter_ID'];

      //GET THE REPORTER DETAILS FROM THE SYSTEM_ADMIN TABLE
      $sqlAdminDetails="SELECT `First_Name`,`Last_Name`,`Mobile_No` from system_admin WHERE `National_ID`='".$reporter_id."'";
      $sql_run=mysqli_query($conn,$sqlAdminDetails);
      $numrows=mysqli_num_rows($sql_run);
      if($numrows==1){
        while ($rowadmin=mysqli_fetch_assoc($sql_run)) {
        $fname=$rowadmin['First_Name'];
        $lname=$rowadmin['Last_Name'];
        $mobo=$rowadmin['Mobile_No'];
      }//end of while

      }//end of if statement
      elseif ($numrows==0) {
        //check if the reporter is in the users table
        $sqlUserDetail="SELECT `First_Name`,`Last_Name`,`Phone_No` FROM user WHERE National_ID='".$reporter_id."'";
        $query_runuser=mysqli_query($conn,$sqlUserDetail);
        $numrowsuser=mysqli_num_rows($query_runuser);
        if ($numrowsuser==1) {
          while ($rowuser=mysqli_fetch_assoc($query_runuser)) {
            $fname=$rowuser['First_Name'];
            $lname=$rowuser['Last_Name'];
            $mobo=$rowuser['Phone_No'];

          }//end if while loop
        }//end of if statement
        elseif ($numrowsuser==0) {
          //check if the reporter is in searcher table
          $sqlSearcherdetail="SELECT `First_Name`,`Last_Name`,`Phone_No` FROM searcher WHERE ID_No='".$reporter_id."'";
          $query_runsearcher=mysqli_query($conn,$sqlSearcherdetail);
          $numrowsearcher=mysqli_num_rows($query_runsearcher);
          if ($numrowsearcher==1) {
            while ($rowsearcher=mysqli_fetch_assoc($query_runsearcher)) {
              $fname=$rowsearcher['First_Name'];
              $lname=$rowsearcher['Last_Name'];
              $mobo=$rowsearcher['Phone_No'];
            }//end of while loop
          }//end of while loop
        }
      }//END OF IF REPORTER IS IN USER TABLE 
      
			if($img==""){
				?>
<!--start of html to display the missing person with a default image with name,age,last seen and county-->
         <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
    <div class="container">
      <a href="lostandfounddetail.php?id=<?php echo $id?>"><img src="../../storage/img/default.jpg" alt="..." class="img-responsive" data-toggle="tooltip" data-placement="bottom" title="View full profile"></a>
      </div>
      <div class="container">
        <h3><?php echo $name;?></h3>
        <p><strong style="color: green;">AGE:</strong> <?php echo $age;?></p>
        <p><strong style="color: green;">REPORTED BY:</strong> <?php echo $fname." ".$lname;?></p>
        <p><strong style="color: green;">PHONE No.:</strong> <?php echo $mobo;?></p>

        <p><strong style="color: green;">DATE REPORTED: </strong><?php echo $datereported;?></p>
        <hr><br>
        </div>
    </div>
    </div>
  </div>
	</div>
</div>
</div>
<!--end of html to display the missing person with a default image-->
                <?php
					
				
				}//end of if image is null
			else{
					?>
<!--start of html to display the missing person with an image image with name,age,last seen and county-->
         <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
    <div class="container">
      <a href="lostandfounddetail.php?id=<?php echo $id?>"><img src="../../storage/img/<?php echo $img;?>" alt="..." class="img-responsive" data-toggle="tooltip" data-placement="bottom" title="View full profile"></a>
      </div>
      <div class="container">
        <h3><?php echo $name;?></h3>
        <p><strong style="color: green;">AGE:</strong> <?php echo $age;?></p>
        <p><strong style="color: green;">REPORTED BY:</strong> <?php echo $fname." ".$lname;?></p>
        <p><strong style="color: green;">PHONE No.:</strong> <?php echo $mobo;?></p>

        <p><strong style="color: green;">DATE REPORTED: </strong><?php echo $datereported;?></p>
        <hr><br>
        </div>
    </div>
    </div>
  </div>
	</div>
</div>
</div>
<!--end of html to display the missing person with a default image-->
                <?php
				
				}//end of if the missing person has an image
			
			}//end of if their are records
			
			
	?>




  
  	
  

<script type="text/javascript" src="../../bootstrap/js/jquery.js"></script>
<script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
