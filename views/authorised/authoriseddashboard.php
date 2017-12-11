<?php 
require_once('../../config/dbconfig.php');
require_once('../../config/security.php');

//echo "Welcome Searcher".$_SESSION['Authorised'];

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../bootstrap/css/style.css">
</head>
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
          <h1>Kenyan Missing</h1>
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
                    <small><b>HOME</b></small>
                </h5>
                <ul class="nav nav-pills nav-stacked">
                    <li class="active"><a href="#">MISSING PERSONS</a></li>
                    <li><a href="reportmissingperson.php">Add Missing Person</a></li>
                    <li><a href="displaymissingpersons.php">Search Missing Person</a></li>
                    <li><a href="reportlostandfoundbypolice.php">Add Lost and Found</a></li>
                    <li><a href="displaylostandfound.php">Search Lost and Found</a></li>
                </ul>
                
                
            </div>
        </div>
        <div class="col-md-8">
            <!-- Content Here -->
        </div>
    </div>
</div>

<script type="text/javascript" src="../../bootstrap/js/jquery.js"></script>
<script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>