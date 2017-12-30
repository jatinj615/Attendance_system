<?php  
	$to = $_SESSION['to'];
	$from = $_SESSION['from'];
	$body = $_SESSION['body'];
	$subject = $_SESSION['subject'];
	$header = 'From: '.$from;
	if(mail($to,$subject,$body,$header)){
		echo "Success";
	}else{
		echo "Failed. Please Try Later..";
	}

?>