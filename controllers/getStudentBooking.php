<?php  
	include 'dbconnect.php';
  // session_start();
  $connect = new DatabaseConnect();
  $db = $connect->connect();
  if($db){
  	$id = $_REQUEST['id'];
  	$query = 'SELECT booking_date,status from bookings where stu_id='.$id;
  	$result = mysql_query($query);
  	if($result && mysql_num_rows($result) > 0){
  		$i = 0;
  		while($row = mysql_fetch_assoc($result)){
  			$data['bookings'][$i] = $row;
  			$i++;
  		}
  		print_r(json_encode($data));
  	}else{
  		echo "No Result found..";
  	}
  }else{
  	echo "Something went wrong..";
  }
?>