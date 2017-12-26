<?php 
include 'dbconnect.php';
  // session_start();
  $connect = new DatabaseConnect();
  $db = $connect->connect();
  if($db){
  	$name = $_REQUEST['name'];
  	$email = $_REQUEST['email'];
  	$phone = $_REQUEST['phone'];
  	$password = md5($_REQUEST['password']);
  	$query = 'Insert into attendants (name,email,password,phone_no) values("'.$name.'","'.$email.'","'.$password.'",'.$phone.')';
  	$result =mysql_query($query);
  	if($result){
  		echo "Successfully Added";
  	}else{
  		echo "Credentials are not unique";
  	}
  }else{
  	echo "Something Went Wrong...!";
  }
 ?>