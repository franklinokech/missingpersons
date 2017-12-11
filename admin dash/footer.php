<?php
$current_year=date('Y');
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../bootstrap/css/style.css">
</head>
<!--start of footer  -->
<footer class="site-footer">
<div class="container">
<div class="row">
<div class="col-md-5">
<div class="top-footer-address">
<h4>Contact Address</h4>
<address>
  P.O. BOX 855-403001,<br>
  Nairobi<br>
     <abbr title="Phone">Tel:</abbr> +254700520718
</address>
</div>
</div>
</div>
<div class="bottom-footer">
	<div class="col-md-5">&copy; Copyright <?php echo $current_year;?></div>
	<div class="col-md-7">
		<ul class="footer-nav">
			<li><a href="#">Home</a></li>
			<li><a href="membership_login.php">Sign In</a></li>
			<li><a href="#">Contacts</a></li>
			<li><a href="#">Print Page</a></li>

		</ul>

	</div>

</div>
</div>
	

</footer>


<!--end of footer  -->