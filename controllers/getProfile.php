<?php  
	include 'dbconnect.php';
  // session_start();
  $connect = new DatabaseConnect();
  $db = $connect->connect();
  if($db){
  	$id = $_REQUEST['id'];
  	$query = "Select * from students where id=".$id;
  	$result = mysql_query($query);
  	if($result && mysql_num_rows($result) > 0){
  		$row = mysql_fetch_assoc($result);
  		$data['profile'][0] = $row;
  		print_r(json_encode($data));
  	}else{
  		echo "Not Found";
  	}
  }else{
  	echo "Something Went Wrong ...";
  }
?>