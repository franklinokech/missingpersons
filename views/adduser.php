<?php 
require_once('../config/dbconfig.php');
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/style.css">
</head>
<!--start of preference bar-->
	<div class="navbar navbar-inverse nav">
    <div class="navbar-inner">
        <div class="container">
              <div class="pull-right">
                <ul class="nav pull-right">
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, Admin <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="editadminprofile.php"><i class="icon-cog"></i> Preferences</a></li>
                            <li><a href="contactUs.php"><i class="icon-envelope"></i> Contact Support</a></li>
                            <li class="divider"></li>
                            <li><a href="../app/process-logout.php"><i class="icon-off"></i> Logout</a></li>
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
          <a href="admin_dashboard.php" style="text-decoration: none;color: rgb(51,51,51);"><h1>Kenyan Missing</h1></a>
          <span class="icon-bar">
            <i class="glyphicon glyphicon-tower" aria-hidden="true"></i>
          </span>
          <h2>Help to helpless</h2>
        </div>
	</div>
</div>
<!--end of header bar-->

<body>
<!--start adduser body-->
<div class="container">
<form class="form-horizontal" action="../app/process-adduser.php" method="post">
<fieldset>

<!-- Form Name -->
<legend>ADD NEW USER</legend>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="national_id">National ID</label>  
  <div class="col-md-4">
  <input id="national_id" name="national_id" type="text" placeholder="National ID" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="USERNAME">Username</label>  
  <div class="col-md-4">
  <input id="USERNAME" name="USERNAME" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="ADDPASSWORD">Password</label>  
  <div class="col-md-4">
  <input id="ADDPASSWORD" name="ADDPASSWORD" type="password" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>
<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="ADDPASSWORD">Confirm Password</label>  
  <div class="col-md-4">
  <input id="confirmpass" name="confirmpass" type="password" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="MAILID">Email Address</label>  
  <div class="col-md-4">
  <input id="MAILID" name="MAILID" type="email" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="ORGANISATION">Organisation</label>  
  <div class="col-md-4">
  <input id="ORGANISATION" name="ORGANISATION" type="text" placeholder="" class="form-control input-md" required="">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="LOCATION">Location</label>  
  <div class="col-md-4">
  <select name="LOCATION" id="LOCATION">
  	<option class="form-control input-md">Select</option>
    <?php 
	$sql_getLocation="SELECT * FROM `kenya_counties` ";
	$query_run=mysqli_query($conn,$sql_getLocation);

	
	while($row=mysqli_fetch_assoc($query_run)){
		echo $county=$row['Name'];
		
		?>
        <option class="form-control input-md" value="<?php echo $county;?>" required><?php echo $county;?></option>
        <?php
		}
	?>
    
    
  </select>
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="ROLE">Role</label>  
  <div class="col-md-4">
  <select name="ROLE" id="ROLE">
  	<option class="form-control input-md">Select</option>
    <?php 
	$sql_getLocation="SELECT * FROM `user_role` ";
	$query_run=mysqli_query($conn,$sql_getLocation);

	
	while($row=mysqli_fetch_assoc($query_run)){
		echo $role=$row['Role_Name'];
		
		?>
        <option class="form-control input-md" value="<?php echo $role;?>" required><?php echo $role;?></option>
        <?php
		}
	?>
    
    
  </select>
    
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
  <div class="col-md-8">
   <!-- <button id="CREATE" name="CREATE" class="btn btn-success" type="submit">CREATE</button>-->
   <input type="submit" name="CREATE"  id="CREATE" class="btn btn-success" value="ADD USER">
    <input type="button" class="btn btn-danger" value="CANCEL" onClick="window.location='admin_dashboard.php';">
  </div>
</div>

</fieldset>
</form>
</div>

<!--end adduser account body-->
<script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
