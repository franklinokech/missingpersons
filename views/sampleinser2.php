
<?php
require_once('../config/dbconfig.php');
if(isset($_POST['btnsubmit'])){
	
	$target="../storage/img/".basename($_FILES['image']['name']);//pathe to store the image
	//get all submitted data
	$image=$_FILES['image']['name'];
	$desc=$_POST['txtDesc'];
	
	$sql="INSERT INTO `missingpersons`.`images` (`id`, `image`, `text`) VALUES (NULL,'".$image."','".$desc."')";
	$result=mysqli_query($conn,$sql);//store the submitted data
	
	//now lets move the uploaded image to images folder
	if(move_uploaded_file($_FILES['image']['tmp_name'], $target)){
		echo "file uploaded successfully";

	}else{
		echo "upload failed";
		}
	
	}
?>
<html>
<head></head>
<body>
<form method="post" action="" enctype="multipart/form-data">
<input type="file" name="image" required />
<input type="text" name="txtDesc" required />
<input type="submit" name="btnsubmit" value="upload" />
</form>
</body>
</html>