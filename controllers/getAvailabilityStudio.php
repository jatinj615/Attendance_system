<?php  
	include 'dbconnect.php';
  // session_start();
  $connect = new DatabaseConnect();
  $db = $connect->connect();
  if($db){
  	$date = $_REQUEST['date'];
  	$query = 'SELECT id from bookings where booking_date="'.$date.'"';
  	$result = mysql_query($query);
  	$availability = 2;
  	if($result && mysql_num_rows($result) > 0){
  		$availability = $availability - mysql_num_rows($result);
  	}
  	print_r($availability);
  }else{
  	echo "Something Went Wrong ...";
  }
?>