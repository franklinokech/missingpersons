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
    <script type="text/javascript">
        $(document).ready(function(){
$("#mytable #checkall").click(function () {
        if ($("#mytable #checkall").is(':checked')) {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", true);
            });

        } else {
            $("#mytable input[type=checkbox]").each(function () {
                $(this).prop("checked", false);
            });
        }
    });
    
    $("[data-toggle=tooltip]").tooltip();
});


    </script>
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
                            <li><a href="../views/editadminprofile.php"><i class="icon-cog"></i> Preferences</a></li>
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
          <a href="../views/admin_dashboard.php" style="text-decoration: none;color: rgb(51,51,51);"><h1>Kenyan Missing</h1></a>
          <span class="icon-bar">
            <i class="glyphicon glyphicon-tower" aria-hidden="true"></i>
          </span>
          <h2>Help to helpless</h2>
        </div>
	</div>

<!--end of header bar-->
<?php 
require_once('../config/dbconfig.php');
require_once('../config/security.php');

//check if search button is pressed
if (isset($_POST['btnsubmitsearch'])) {
	$username=escape($_POST['txtusername']);
	$sqlgetuser="SELECT `Username`,`First_Name`,`Last_Name`,`Email`,`Phone_No` FROM user WHERE `Status`='1' AND `Username`='".$username."' ORDER BY `First_Name` ";
	$sqlrunusers=mysqli_query($conn,$sqlgetuser);
$count=1;
$numrow=mysqli_num_rows($sqlrunusers);
if($numrow!=1){
	
	echo "no results found";
}else{
	?>
	<div class="table-responsive">

                
              <table id="mytable" class="table table-bordred table-striped">
                   
                   <thead>
                   
                   <th>S/No</th>
                   <th>First Name</th>
                    <th>Last Name</th>
                     <th>Email</th>
                     <th>Contact</th>
                     <th>Username</th>
                       <th>Deactivate</th>
                   </thead>
    <tbody>
	<?php

while ($rowuser=mysqli_fetch_assoc($sqlrunusers)) {


    $username=$rowuser['Username'];
    $fname=$rowuser['First_Name'];
    $lname=$rowuser['Last_Name'];
    $email=$rowuser['Email'];
    $mobo=$rowuser['Phone_No'];

    ?>
    <tr>
    <td><?php echo $count;?></td>
    <td><?php echo $fname?></td>
    <td><?php echo $lname?></td>
    <td><?php echo $email?></td>
    <td><?php echo $mobo?></td>
    <td><?php echo $username;?></td>
    
    <td><a href="../app/process-deactivateuser.php?user=<?php echo $username;?>" onclick="return confirm('Do you really want to Deactivate?')"><p data-placement="top" data-toggle="tooltip" title="Deactivate"><button class="btn btn-danger btn-xs" data-title="Deactivate" data-toggle="modal" data-target="#delete" ><span class="glyphicon glyphicon-off"></span></button></p></td></a>
    </tr>
    <?php
    $count++;
    }
}
    
}
?>
</tbody>
        
</table>

<script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>

