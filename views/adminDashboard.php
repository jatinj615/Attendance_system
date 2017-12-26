<?php
	session_start();
	if (isset($_SESSION['id']) && $_SESSION['id'] != null) {
		$name = $_SESSION['name'];
		echo "welocme".$name;
	}else{
		header('Location: index.php');
	}
 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Graskaa</title>
   </head>
   <body>
		  
   </body>
 </html>
