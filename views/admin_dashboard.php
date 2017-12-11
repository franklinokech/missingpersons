<?php
session_start();

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
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <!-- It can be fixed with bootstrap affix http://getbootstrap.com/javascript/#affix-->
            <div id="sidebar" class="well sidebar-nav">
                <h5><i class="glyphicon glyphicon-home"></i>
                    <a href="admin_dashboard.php" style="text-decoration: none;"><small><b>HOME</b></small></a>
                </h5>
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="#">User Management</a></li>
                    <li><a href="adduser.php">Add User</a></li>
                    <li><a href="viewuser.php">Search User</a></li>
                    <li><a href="viewsearcher.php">Searcher Management</a></li>
                </ul>
                
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="#">Missing Persons</a></li>
                    <li><a href="reportmissingperson.php">Add Missing Person</a></li>
                    <li><a href="reportlostandfoundbypolice.php">Add Lost and Found</a></li>
                    <li><a href="displaymissingpersons.php">Search Missing Person</a></li>
                    <li><a href="displaylostandfound.php">Search Lost and Found</a></li>
                </ul>
                
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="#">Reports</a></li>
                    <li><a href="generateMissingReport.php">Missing Reports</a></li>
                    <li><a href="generateLFReport.php">Lost and Found Reports</a></li>
                    <li><a href="generateFoundReport.php">Found Reports</a></li>
                </ul>
            </div>
            
        </div>
        <div class="col-md-8">
            <!-- Content Here -->
        </div>
    </div>
</div>

<script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
