<?php 
		include 'dbconnect.php';
	  // session_start();
	  $connect = new DatabaseConnect();
	  $db = $connect->connect();
	  if($db){
	  	// echo "works";
	  	$id = $_REQUEST['id'];
	  	$attendance = $_REQUEST['attendance'];
	  	$query = "INSERT into attendance (stu_id,attendance,date) values(".$id.",".$attendance.",now())";
	  	$result = mysql_query($query);
	  	if ($result) {
	  		echo "Success";
	  	}else{
	  		echo "Already Marked";
	  	}
	  }else{
	  	echo "Something went wrong..!";
	  }
?>