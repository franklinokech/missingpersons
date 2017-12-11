<?php 
$to = "franklinokech@gmail.com"; 
$subject = "Test mail"; 
$message = "Hello! This is a simple email message."; 
$from = "missingkenyan@gmail.com "; 
$headers = "From: $from"; 
if(mail($to,$subject,$message,$headers)){
	echo "Mail Sent."; 
}else{
	echo "cant be sent";
}

?>