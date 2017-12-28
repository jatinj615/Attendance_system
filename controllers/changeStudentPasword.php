<?php  
include 'dbconnect.php';
  session_start();
  $connect = new DatabaseConnect();
  $db = $connect->connect();
  if($db){
  	$current_pass = md5($_REQUEST['current_pass']);
  	$new_pass = md5($_REQUEST['new_pass']);
  	$id = $_REQUEST['id'];
  	$query = "Update students set password='".$new_pass."' where id=".$id." and password='".$current_pass."'";
  	$result = mysql_query($query);
  	if ($result && mysql_affected_rows($result) > 0) {
  		echo "Success";
  	}else{
  		echo "Password Entered is Incorrect";
  	}
  }else{
  	echo "Something Went Wrong ... ";
  }
?>