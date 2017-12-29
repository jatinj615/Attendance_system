<?php  
	include 'dbconnect.php';
  // session_start();
  $connect = new DatabaseConnect();
  $db = $connect->connect();
  if($db){
  	$id = $_REQUEST['id'];
  	$date = $_REQUEST['date'];
  	$query = 'INSERT into bookings (stu_id,booking_date) values('.$id.',"'.$date.'")';
  	$result = mysql_query($query);
  	if($result){
  		echo "Successfully Booked";
  	}else{
  		echo "Failed";
  	}
  }else{
  	echo "Something Went Wrong";
  }
?>