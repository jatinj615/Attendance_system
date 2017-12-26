<?php 
	include 'dbconnect.php';
  // session_start();
  $connect = new DatabaseConnect();
  $db = $connect->connect();
  if($db){
  	$query = 'Select * from attendants';
  	$result = mysql_query($query);
  	if($result && mysql_num_rows($result) > 0){
  		$i = 0;
  		while ($row = mysql_fetch_assoc($result)) {
  			$data['Attendant'][$i] = $row;
  			$i++;
  		}
  		print_r(json_encode($data));
  	}else{
  		echo "No Attendants Found";
  	}
  }else{
  	echo "Something Went Wrong";
  }
 ?>