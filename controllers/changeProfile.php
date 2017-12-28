<?php  
include 'dbconnect.php';
  session_start();
  $connect = new DatabaseConnect();
  $db = $connect->connect();
  if($db){
  	$id = $_REQUEST['id'];
  	$new = $_REQUEST['new'];
  	$field = $_REQUEST['field'];
  	$query = "UPDATE students set ".$field."='".$new."' where id=".$id;
  	$result = mysql_query($query);
  	if($result){
  		echo "Success";
  	}else{
  		echo "Failed";
  	}
  }else{
  	echo "Something went wrong";
  }
?>