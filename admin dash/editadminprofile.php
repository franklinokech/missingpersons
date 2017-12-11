<?php 
require_once('../config/dbconfig.php');
require_once('../config/security.php');

//retrieve the current admin details
  $sql="SELECT `First_Name`,`Middle_Name`,`Last_Name`,`Email_address`,`Mobile_No`,`Postal_Address` FROM system_admin";
  $query_run=mysqli_query($conn,$sql);
  while ($row=mysqli_fetch_assoc($query_run)) {
    //store the values from database
    $fname=$row['First_Name'];
    $mname=$row['Middle_Name'];
    $lname=$row['Last_Name'];
    $email=$row['Email_address'];
    $mobile=$row['Mobile_No'];
    $postaladd=$row['Postal_Address'];
  }//end of while their is a row that matched query
  
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../bootstrap/css/style.css">
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

<div class="well">
    <ul class="nav nav-tabs">
      <li class="active"><a href="#home" data-toggle="tab">Update Profile</a></li>
      <li><a href="#profile" data-toggle="tab">Change Password</a></li>
    </ul>
    <div id="myTabContent" class="tab-content">
      <div class="tab-pane active in" id="home">
        <form class="form-horizontal" action="../app/process-editadmin.php" method="post">
<fieldset>

<!-- Form Name -->

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="fname">First Name</label>  
  <div class="col-md-4">
  <input id="fname" name="fname" type="text" placeholder="First Name" class="form-control input-md" required="required" value="<?php echo $fname;?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="mname">Middle Name</label>  
  <div class="col-md-4">
  <input id="mname" name="mname" type="text" placeholder="Middle Name" class="form-control input-md" required="required" value="<?php echo $mname;?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="lname">Last Name</label>  
  <div class="col-md-4">
  <input id="lname" name="lname" type="text" placeholder="Middle Name" class="form-control input-md" required="required" value="<?php echo $lname;?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="mobileno">Mobile Number</label>  
  <div class="col-md-4">
  <input id="mobileno" name="mobileno" type="text" placeholder="Mobile Number" class="form-control input-md" required="required" value="<?php echo $mobile;?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="emailadd">Email Address</label>  
  <div class="col-md-4">
  <input id="emailadd" name="emailadd" type="email" placeholder="Email Address" class="form-control input-md" required="required" value="<?php echo $email;?>">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="address">Address</label>  
  <div class="col-md-4">
  <textarea id="address" name="address" class="form-control input-md" required="required"><?php echo $postaladd?>
  </textarea>
    
  </div>
</div>

<!-- Button (Double) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="button1id"></label>
  <div class="col-md-8">
   <!-- <button id="CREATE" name="CREATE" class="btn btn-success" type="submit">CREATE</button>-->
   <input type="submit" name="btnupdate"  id="btnupdate" class="btn btn-success" value="Update Profile">
    <input type="button" class="btn btn-danger" value="Cancel" onClick="window.location='admin_dashboard.php';">
  </div>
</div>

</fieldset>
</form>


      </div>
      <div class="tab-pane fade" id="profile">
      <form id="tab2" action="../app/process-changeadminpassword.php" method="post">
          <label>Old Password</label><br>
          <input type="password" class="input-xlarge" name="pwdOldpass" id="pwdOldpass" autocomplete="off">
          <div>
          <label>New Password</label><br>
          <input type="password" class="input-xlarge" name="pwdNewpass" id="pwdNewpass">
          <div>
          <label>Retype Password</label><br>
          <input type="password" class="input-xlarge" name="pwdCNewpass" id="pwdCNewpass"><br>
          <div>
              <input type="submit" name="btnChangePass" id="btnChangePass" class="btn btn-primary" value="Change Password">
          </div>
      </form>
      </div>
  </div>
  <script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</div>
</body>
</html>
