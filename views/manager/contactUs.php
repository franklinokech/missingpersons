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
         <a href="managerdashboard.php" style="text-decoration: none;color: rgb(51,51,51);"> <h1>Kenyan Missing</h1></a>
          <span class="icon-bar">
            <i class="glyphicon glyphicon-tower" aria-hidden="true"></i>
          </span>
          <h2>Help to helpless</h2>
        </div>
    </div>

<!--end of header bar-->
<div class="container">
	<div class="row-fluid">
        <div class="span8">
        	<iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://www.google.com/maps/embed/v1/place?q=nation%20center%20nairobi&key=AIzaSyCICJSbLPR_AZDT0dHe6VgeMx1duNXbQrQ" allowfullscreen></iframe>  
    	</div>
    	
      	<div class="span4">
    		<h2>Kenyan Missing</h2>
    		<address>
    			<strong>Head Office Address</strong><br>
    			NATION CENTER<br>
                2nd FLOOR<br>
    			KIMATHI STREET<br>
    			P.O. BOX 652-010012<br>
    			NAIROBI KENYA<br>
    			<abbr title="Phone">P:</abbr> +254 700520718<br>
                info@missingperson.org
    		</address>
    	</div>
    </div>
</div>
<script type="text/javascript" src="../../bootstrap/js/jquery.js"></script>
<script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
