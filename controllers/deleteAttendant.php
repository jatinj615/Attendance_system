<?php 
include 'dbconnect.php';
  // session_start();
  $connect = new DatabaseConnect();
  $db = $connect->connect();
  if($db){
  	$id = $_REQUEST['id'];
  	$query = 'Delete from attendants where id='.$id;
  	$result = mysql_query($query);
  	if($result){
  		echo "Successfully Deleted";
  	}else{
  		echo "Something went wrong...!";
  	}
  }else{
  	echo "Somethin went wrong...!";
  }
 ?>