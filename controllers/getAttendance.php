<?php 
	include 'dbconnect.php';
  // session_start();
  $connect = new DatabaseConnect();
  $db = $connect->connect();
  if($db){
  	// echo "string";
  	$id = $_REQUEST['id'];
  	$query = "Select attendance,date from attendance where stu_id=".$id;
  	$result = mysql_query($query);
  	if($result && mysql_num_rows($result) > 0){
  		$i=0;
  		while($row = mysql_fetch_assoc($result)){
  			$data['Attendance'][$i] = $row;
  			$i++;
  		}
  		print_r(json_encode($data));
  	}else{
  		echo "No result found";
  	}
  }else{
  	echo "Something went wrong...";
  }
?>