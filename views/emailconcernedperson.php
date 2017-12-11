<?php 
require_once('../config/dbconfig.php');
require_once('../config/security.php');
$subject="Regarding Missing Person";
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
<!--start of header bar -->
	<div class="container">
	<div class="row">
		<div class="page-header">
         <a href="admin_dashboard.php" style="text-decoration: none;color: rgb(51,51,51);"> <h1>Kenyan Missing</h1></a>
          <span class="icon-bar">
            <i class="glyphicon glyphicon-tower" aria-hidden="true"></i>
          </span>
          <h2>Help to helpless</h2>
        </div>
	</div>

<!--end of header bar-->
<div class="container">
    <div class="row">
      <div class="col-md-6 col-md-offset-3">
        <div class="well well-sm">
          <form class="form-horizontal" action="mailto:<?php echo $_SESSION['reporteremail'];?>?subject=<?php echo $subject;?>" method="post" enctype="text/plain" onsubmit="location.href='samplethankyou.php';">
          <fieldset>
            <legend class="text-center">Email Concerned Person</legend>
    
            <!-- Name input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="name">Name</label>
              <div class="col-md-9">
                <input id="name" name="name" type="text" placeholder="Your name" class="form-control">
              </div>
            </div>
    
            <!-- subject input-->
            <div class="form-group">
              <label class="col-md-3 control-label" for="subject">Subject</label>
              <div class="col-md-9">
                <input id="subject" name="subjects" type="text" placeholder="Subject" class="form-control">
              </div>
            </div>
    
            <!-- Message body -->
            <div class="form-group">
              <label class="col-md-3 control-label" for="message">Your message</label>
              <div class="col-md-9">
                <textarea class="form-control" id="message" name="message" placeholder="Please enter your message here..." rows="5"></textarea>
              </div>
            </div>
    
            <!-- Form actions -->
            <div class="form-group">
              <div class="col-md-12 text-right">
                <input type="submit" class="btn btn-primary btn-lg" value="Send Email">
              </div>
            </div>
          </fieldset>
          </form>
        </div>
      </div>
    </div>
</div>











<script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>