<?php 

$host = 'localhost';
$user = 'root';
$pass = "";

mysql_connect($host, $user, $pass);

mysql_select_db('missingpersons');
?>


<html>
<body>
<?php 
if(isset($_POST['submit_image'])){
	
	$imagename=$_FILES["myimage"]["name"]; 

//Get the content of the image and then add slashes to it 
$imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));

//Insert the image name and image content in image_table
$insert_image="INSERT INTO sample_imageupload VALUES('$imagetmp','$imagename')";

if(mysql_query($insert_image)){
	echo "success";
	}else{
		echo "error";
		}

	}

?>
		
<form method="POST" action="" enctype="multipart/form-data">
 <input type="file" name="myimage">
 <input type="submit" name="submit_image" value="Upload">
</form>

</body>
</html>