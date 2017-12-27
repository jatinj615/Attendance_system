<?php 
include 'dbconnect.php';
  session_start();
  $connect = new DatabaseConnect();
  $db = $connect->connect();
  if($db){
  	$name = $_REQUEST['name'];
  	$email = $_REQUEST['email'];
  	$phone_no = $_REQUEST['phone_no'];
  	$password = md5($_REQUEST['password']);
  	$course = $_REQUEST['course'];
  	$class = $_REQUEST['class'];
  	$address = $_REQUEST['address'];
  	$query = 'Insert into students (name,email,password,phone_no,course,class,address) values("'.$name.'","'.$email.'","'.$password.'",'.$phone_no.',"'.$course.'",'.$class.',"'.$address.'")';
  	$result = mysql_query($query);
  	if($result){
  		echo "Success";
  	}else{
  		echo "Something Went wrong ...!";
  	}
  }else{
  	echo "Something went wrong ...!";
  }
?>