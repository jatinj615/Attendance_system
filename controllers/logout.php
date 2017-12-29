<?php  
session_start();
$panel = $_REQUEST['panel'];
if($panel == 'student'){
	unset($_SESSION['stu-id']);
	unset($_SESSION['stu-name']);
}elseif ($panel == 'admin') {
	unset($_SESSION['admin-id']);
	unset($_SESSION['admin-name']);
}elseif ($panel == 'attendant') {
	unset($_SESSION['att-id']);
	unset($_SESSION['att-name']);
}

	header('Location: ../views/index.php');
?>