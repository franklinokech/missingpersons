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
<body>
	<div class="container">
		<div class="col-sm-9">
			<div class="mycarousel" class="carousel slid" data-ride="carousel">
				<ol class="carousel-indicators">
					<?php 
						$a=0;
						$query="SELECT * FROM `missing` ORDER BY `Date_Reported` DESC ";
						$sql=mysqli_query($conn,$query);
						while ($row=mysqli_fetch_array($sql)) {
							?>
							<li data-target="#mycarousel" data-slide-to="<?php echo $a++;?>"></li>
							<?php
						}
					?>
				</ol>
				<div class="carousel-inner" role="listbox">
					<?php 
						$queryy="SELECT * FROM `missing` ORDER BY `Date_Reported` DESC ";
						$sqli=mysqli_query($conn,$queryy);
						while ($img=mysqli_fetch_array($sqli)) {

							?>
							<div class="item">
								<img src="../storage/<?php echo $img['Image'];?>" class="img img-responsive" alt="<?php $img['Image'];?>">

							</div>
							<?php
						}
					?>
				</div>
				<a href="left carousel-control" href="#mycarousel" role="button" data-slide="prev"></a>
				<a href="right carousel-control" href="#mycarousel" role="button" data-slide="next"></a>
			</div>
		</div>
	</div>
	<script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
<script type="text/javascript">
	$(document).ready(function(e)	{
		$('.carousel-indicators li:nth-child(1)').addClass('active');
		$('.item:nth-child(1)').addClass('active');
	});

</script>

</body>