<?php 
include 'dbconnect.php';
session_start();
$connect = new DatabaseConnect();
$db = $connect->connect();
if($db){
	$id = $_REQUEST['id'];
	$name = $_REQUEST['name'];
	$email = $_REQUEST['email'];
	$phone_no = $_REQUEST['phone_no'];
	$password = md5($_REQUEST['password']);
	$query = 'Update attendants set name="'.$name.'",email="'.$email.'",phone_no='.$phone_no.',password="'.$password.'" where id='.$id;
	$result = mysql_query($query);
	if($result){
		echo "Success";
	}else{
		echo "Something went wrong..!";
	}
}else{
	echo "Somethin went wrong..!";
}
?>