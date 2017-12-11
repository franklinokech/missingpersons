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
    <!-- Load jQuery from Google's CDN -->
    <!-- Load jQuery UI CSS  -->
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
    <style type="text/css"><!--start of stylish form css-->
    
    	input {
   	    width: 100%;
		}
		input[type=text] {
    width: 100%;
    padding: 12px 20px;
    margin: 8px 0;
    box-sizing: border-box;
}
	input[type=text] {
    border: 2px solid red;
    border-radius: 4px;
}
	input[type=text] {
    border: none;
    border-bottom: 2px solid red;
}
input[type=text]:focus {
    background-color: lightblue;
}
	textarea {
    width: 100%;
    height: 150px;
    padding: 12px 20px;
    box-sizing: border-box;
    border: 2px solid #ccc;
    border-radius: 4px;
    background-color: #f8f8f8;
    resize: none;
}
select {
    width: 100%;
    padding: 16px 20px;
    border: none;
    border-radius: 4px;
    background-color: #f1f1f1;
}
input[type=button], input[type=submit], input[type=reset] {
    background-color: #4CAF50;
    border: none;
    color: white;
    padding: 16px 32px;
    text-decoration: none;
    margin: 4px 2px;
    cursor: pointer;
}
    </style><!--end of stylish form css-->
    
    <!-- Load jQuery JS -->
    <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <!-- Load jQuery UI Main JS  -->
    <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
    
    <!-- Load SCRIPT.JS which will create datepicker for input field  -->
    <script src="script.js"></script>
    
    <link rel="stylesheet" href="runnable.css" />
    <script>
    	/*  jQuery ready function. Specify a function to execute when the DOM is fully loaded.  */
$(document).ready(
  
  /* This is the function that will get executed after the DOM is fully loaded */
  function () {
    $( "#datepicker" ).datepicker({
      changeMonth: true,//this option for allowing user to select month
      changeYear: true //this option for allowing user to select from year range
    });
  }

);
    </script>
    
    
      
</head>
	<!--start of header bar -->
	<div class="container">
	<div class="row">
		<div class="page-header">
          <a href="authoriseddashboard.php" style="text-decoration: none;color: rgb(51,51,51);"><h1>Kenyan Missing</h1></a>
          <span class="icon-bar">
            <i class="glyphicon glyphicon-tower" aria-hidden="true"></i>
          </span>
          <h2>Help to helpless</h2>
        </div>
	</div>
</div>
<!--end of header bar-->
<!--start of flat ui form-->
<div class="container">
	<div class="row">
    <div class="col-md-4">
		<div class="form_main">
                <h4 class="heading" style="color:red;"><strong>Report </strong> Missing Person <span></span></h4>
                <div class="form">
               <form action="../../app/process-reportmissingpersonbyauth.php" method="post" id="contactFrm" name="contactFrm" enctype="multipart/form-data">
                	<label>Add Picture</label>
                	<input type="file" id="missingpicture" name="missingpicture" class="txt">
                    <input type="text" required="" placeholder="Full Name" value="" name="name" class="txt">
                    <input type="text" required="" placeholder="Age" value="" name="age" class="txt"><br><br>
                     <input type="text" required="" placeholder="Height(in feet)" value="" name="height" class="txt"><br><br>
                     <input type="text" required="" placeholder="Weight(in kg)" value="" name="weight" class="txt"><br><br>
                     <input type="radio" name="sex" value="male">Male
					<input type="radio" name="sex" value="female">Female <br><br>
                    <select name="skincolor" id="skincolor">
                    	<option>--Select Skin Color--</option>
                        <?php 
						$sql="SELECT * FROM `skin_color` ORDER BY `skincolor` ASC";
						$query_run=mysqli_query($conn,$sql);
						while($row=mysqli_fetch_assoc($query_run)){
							?>
                            <option value="<?php echo $row['skincolor'];?>"><?php echo $row['skincolor'];?></option>
                            <?php
							
							}
						?>
                    </select><br><br>
                    <select name="haircolor" id="haircolor">
                    	<option>--Select Hair Color--</option>
 						<?php 
						$sql2="SELECT * FROM `hair_color` ORDER BY `Hair` ASC";
						$query_run2=mysqli_query($conn,$sql2);
						while($row2=mysqli_fetch_assoc($query_run2)){
							?>
                            <option value="<?php echo $row2['Hair']?>"><?php echo $row2['Hair']?></option>
                            <?php
							}
						?>
                    </select><br><br>
                    <select name="eyecolor" id="eyecolor">
                    	<option>--Select Eye Color--</option>
                        
                         						<?php 
						$sql3="SELECT * FROM `eye_color` ORDER BY `EyeColor` ASC";
						$query_run3=mysqli_query($conn,$sql3);
						while($row3=mysqli_fetch_assoc($query_run3)){
							?>
                            <option value="<?php echo $row3['EyeColor']?>"><?php echo $row3['EyeColor']?></option>
                            <?php
							}
						?>

                        
                    </select><br><br>
                    <input type="text" required="" placeholder="Missing Since?(mm/dd/yyyy)" id="datepicker" value="" name="datepicker" class="txt">
                    
                	 <textarea placeholder="Notes and Identifying Characters" name="desc" type="text" class="txt_3"></textarea>
                     <input type="text" required="" placeholder="Reporter National Id" value="" name="natinal_id" id="natinal_id" class="txt"><br><br>
                     <input type="submit" value="submit" name="submit" class="txt2">
                </form>
            </div>
            </div>
            </div
	></div>
</div>

<!--end of flat ui form-->
    
	</body>
</html>


