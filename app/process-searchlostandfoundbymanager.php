
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
          <a href="../views/manager/managerdashboard.php" style="text-decoration: none;color: rgb(51,51,51);"><h1>Kenyan Missing</h1></a>
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

//check if the search button is pressed and process
if (isset($_POST['btnsubmitsearch'])) {
  //declare the post variables
  $fullname=escape($_POST['txtfullname']);

  $sql="SELECT `ID`,`Full_Name`,`Image`,`Age`,`Height`,`Weight`,`Gender`,`SkinColor`,`HairColor`,`EyeColor`,`Description`,`Date_Reported`,`Reporter_ID` FROM lostandfound WHERE `Full_Name` LIKE  '%".$fullname."%'";
  $query_run=mysqli_query($conn,$sql);
  $num_rows=mysqli_num_rows($query_run);
  if($num_rows==0){
    header("refresh:3;url=../views/manager/displaylostandfound.php");
    echo "No results match your search";
  }//end of if no result is found

  elseif ($num_rows>=1) {
    ?>
    <div class="container">
      <i style="font-style: san-serif;"><b><?php echo $num_rows?></b> Result Found</i><br><br>
    </div>
    <?php
    while ($row=mysqli_fetch_assoc($query_run)) {
      //check if image is field is null
      $id=$row['ID'];
      $img=$row['Image'];
      $name=$row['Full_Name'];
      $age=$row['Age'];
      $lastseen=$row['Date_Reported'];
      $reporter_id=$row['Reporter_ID'];

            //GET THE REPORTER DETAILS FROM THE SYSTEM_ADMIN TABLE
      $sqlAdminDetails="SELECT `First_Name`,`Last_Name`,`Mobile_No` from system_admin WHERE `National_ID`='".$reporter_id."'";
      $sql_run=mysqli_query($conn,$sqlAdminDetails);
      $numrows=mysqli_num_rows($sql_run);
      if($numrows==1){
        while ($rowadmin=mysqli_fetch_assoc($sql_run)) {
        $fname=$rowadmin['First_Name'];
        $lname=$rowadmin['Last_Name'];
        $mobo=$rowadmin['Mobile_No'];
      }//end of while

      }//end of if statement
      elseif ($numrows==0) {
        //check if the reporter is in the users table
        $sqlUserDetail="SELECT `First_Name`,`Last_Name`,`Phone_No` FROM user WHERE National_ID='".$reporter_id."'";
        $query_runuser=mysqli_query($conn,$sqlUserDetail);
        $numrowsuser=mysqli_num_rows($query_runuser);
        if ($numrowsuser==1) {
          while ($rowuser=mysqli_fetch_assoc($query_runuser)) {
            $fname=$rowuser['First_Name'];
            $lname=$rowuser['Last_Name'];
            $mobo=$rowuser['Phone_No'];

          }//end if while loop
        }//end of if statement
        elseif ($numrowsuser==0) {
          //check if the reporter is in searcher table
          $sqlSearcherdetail="SELECT `First_Name`,`Last_Name`,`Phone_No` FROM searcher WHERE ID_No='".$reporter_id."'";
          $query_runsearcher=mysqli_query($conn,$sqlSearcherdetail);
          $numrowsearcher=mysqli_num_rows($query_runsearcher);
          if ($numrowsearcher==1) {
            while ($rowsearcher=mysqli_fetch_assoc($query_runsearcher)) {
              $fname=$rowsearcher['First_Name'];
              $lname=$rowsearcher['Last_Name'];
              $mobo=$rowsearcher['Phone_No'];
            }//end of while loop
          }//end of while loop
        }
      }//END OF IF REPORTER IS IN USER TABLE
      if($img==""){
        ?>
<!--start of html to display the missing person with a default image with name,age,last seen and county-->
         <!-- Wrapper for slides -->


  <div class="carousel-inner" role="listbox">
    <div class="item active">
    <div class="container">
      <a href="../views/manager/lostandfounddetail.php?id=<?php echo $id?>"><img src="../storage/img/default.jpg" alt="..." class="img-responsive" data-toggle="tooltip" data-placement="bottom" title="View full profile"></a>
      </div>
      <div class="container">
        <h3><?php echo $name;?></h3>
        <p><strong style="color: green;">AGE:</strong> <?php echo $age;?></p>
        <p><strong style="color: green;">REPORTED BY:</strong> <?php echo $fname." ".$lname;?></p>
        <p><strong style="color: green;">PHONE No.:</strong> <?php echo $mobo;?></p>
        <p><strong style="color: green;">DATE REPORTED: </strong><?php echo $lastseen;?></p>
        <hr><br>
        </div>
    </div>
    </div>
  </div>
  </div>
</div>
</div>
<!--end of html to display the missing person with a default image-->
                <?php
          
        
        }//end of if image is null
      else{
          ?>
<!--start of html to display the missing person with an image image with name,age,last seen and county-->
         <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
    <div class="container">
      <a href="../views/manager/lostandfounddetail.php?id=<?php echo $id?>"><img src="../storage/img/<?php echo $img;?>" alt="..." class="img-responsive" data-toggle="tooltip" data-placement="bottom" title="View full profile"></a>
      </div>
      <div class="container">
        <h3><?php echo $name;?></h3>
        <p><strong style="color: green;">AGE:</strong> <?php echo $age;?></p>
        <p><strong style="color: green;">REPORTED BY:</strong> <?php echo $fname." ".$lname;?></p>
        <p><strong style="color: green;">PHONE No.:</strong> <?php echo $mobo;?></p>
        <p><strong style="color: green;">DATE REPORTED:</strong><?php echo $lastseen;?></p>
        <hr><br>
        </div>
    </div>
    </div>
  </div>
  </div>
</div>
</div>
<!--end of html to display the missing person with a default image-->
                <?php
        
        }//end of if the missing person has an image
      
      }//end of if their are records
      
      
  ?>




  
    
  

<script type="text/javascript" src="../bootstrap/js/jquery.js"></script>
<script type="text/javascript" src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
<?php
    }//end of while their is a row that matched the criteria
    
  }//end of if a result match the search
?>