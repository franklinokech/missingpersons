<?php
require_once('../config/dbconfig.php');
require_once('../config/security.php');

session_destroy();
header("refresh:3;url=../index.php");
echo "Logging out...Please Wait...";

/*require_once('../config/dbconfig.php');
require_once('../config/security.php');
if (isset($_SESSION['Username'])) {
	echo "you are still logged";
}else{
	header("refresh:5;url=../../index.php");
	echo "you are logged out...Redirecting to login";
}*/
?>