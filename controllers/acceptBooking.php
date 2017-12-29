<?php  
	include 'dbconnect.php';
  // session_start();
  $connect = new DatabaseConnect();
  $db = $connect->connect();
  if($db){
  	$id = $_REQUEST['id'];
  	$status = $_REQUEST['status'];
  	echo $query = 'UPDATE bookings set status='.$status.' where id='.$id;
  	$result = mysql_query($query);
  	if($result && mysql_affected_rows($result) >= 0){
  		echo "Success";
  	}else{
  		echo "Failed";
  	}
  }else{
  	echo "Something went wrong..";
  }
?>