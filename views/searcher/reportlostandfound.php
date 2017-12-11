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
                    <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome, <?php echo $_SESSION['Searcher'];?> <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="editadminprofile.php"><i class="icon-cog"></i> Preferences</a></li>
                            <li><a href="contactUs.php"><i class="icon-envelope"></i> Contact Support</a></li>
                            <li class="divider"></li>
                            <li><a href="../../process-logout.php"><i class="icon-off"></i> Logout</a></li>
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
          <a href="searcherdashboard.php" style="text-decoration: none;color: rgb(51,51,51);"><h1>Kenyan Missing</h1></a>
          <span class="icon-bar">
            <i class="glyphicon glyphicon-tower" aria-hidden="true"></i>
          </span>
          <h2>Help to helpless</h2>
        </div>
	</div>

<!--end of header bar-->
<?php
$identity=$_GET['id'];

$sql="SELECT `ID`,`Full_Name`,`Image`,`Age`,`Height`,`Weight`,`Gender`,`SkinColor`,`HairColor`,`EyeColor`,`Date_Missing`,`Description`,`Date_Reported` FROM missing WHERE ID='".$identity."' ";
$query_run=mysqli_query($conn,$sql);
$num_row=mysqli_num_rows($query_run);
if($num_row==1){
    while ($row=mysqli_fetch_assoc($query_run)) {
    $idfound=$row['ID'];   
    $fullname=$row['Full_Name'];
    $img=$row['Image'];
    $age=$row['Age'];
    $height=$row['Height'];
    $weight=$row['Weight'];
    $gender=$row['Gender'];
    $skincolor=$row['SkinColor'];
    $haircolor=$row['HairColor'];
    $eyecolor=$row['EyeColor'];
    $datemissing=$row['Date_Missing'];
    $datereported=$row['Date_Reported'];
    $desc=$row['Description'];
    if($img==""){
        ?>
    <div class="container">
    <img src="../storage/img/default.jpg" alt="..." class="img-responsive">
    </div>
    <div class="container">
    <h3><?php echo $fullname;?></h3>
        <p><strong style="color: green;">AGE :</strong> <?php echo $age;?></p>
        <p><strong style="color: green;">HEIGHT :</strong> <?php echo $height;?></p>
        <p><strong style="color: green;">WEIGHT :</strong> <?php echo $weight;?></p>
        <p><strong style="color: green;">GENDER :</strong> <?php echo $gender;?></p>
        <p><strong style="color: green;">SKIN COLOR :</strong> <?php echo $skincolor;?></p>
        <p><strong style="color: green;">HAIR COLOR :</strong> <?php echo $haircolor;?></p>
        <p><strong style="color: green;">EYE COLOR: </strong> <?php echo $eyecolor;?></p>
        <p><strong style="color: green;">LAST SEEN: </strong><?php echo $datemissing;?></p>
        <p><strong style="color: green;">DATE REPORTED: </strong><?php echo $datereported;?></p>
        <p><strong style="color: green;">NOTES: </strong><?php echo $desc;?></p>

        </div>
        <?php

    }else{
    ?>
    <div class="container">
    <img src="../storage/img/<?php echo $img;?>" alt="..." class="img-responsive">
    </div>
    <div class="container">
    <h3><?php echo $fullname;?></h3>
        <p><strong style="color: green;">AGE :</strong> <?php echo $age;?></p>
        <p><strong style="color: green;">HEIGHT :</strong> <?php echo $height;?></p>
        <p><strong style="color: green;">WEIGHT :</strong> <?php echo $weight;?></p>
        <p><strong style="color: green;">GENDER :</strong> <?php echo $gender;?></p>
        <p><strong style="color: green;">SKIN COLOR :</strong> <?php echo $skincolor;?></p>
        <p><strong style="color: green;">HAIR COLOR :</strong> <?php echo $haircolor;?></p>
        <p><strong style="color: green;">EYE COLOR: </strong> <?php echo $eyecolor;?></p>
        <p><strong style="color: green;">LAST SEEN: </strong><?php echo $datemissing;?></p>
        <p><strong style="color: green;">DATE REPORTED: </strong><?php echo $datereported;?></p>
        <p><strong style="color: green;">NOTES: </strong><?php echo $desc;?></p>

        </div>
        <?php
        }//end of if missing person has an image

}//end of while loop
}//end of if num of rows is equal to one
?>
<form action="../app/process-reportfoundpersonbysearcher.php" method="POST">
    <input type="hidden" name="txtid" id="txtid" value="<?php echo $identity;?>">
    <input type="submit" name="btnreportfound"  id="btnreportfound" class="btn btn-success" value="REPORT FOUND">
    
</form>
</div>
<script type="text/javascript" src="../../bootstrap/js/jquery.js"></script>
<script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
