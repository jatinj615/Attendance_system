<?php
  include 'dbconnect.php';
  session_start();
  $connect = new DatabaseConnect();
  $db = $connect->connect();
  if($db){
    $category =$_REQUEST['category'];
    $email = $_REQUEST['email'];
    $pass = md5($_REQUEST['password']);
    if($category == 'student'){
      $query = 'Select id,email,name,phone_no,address,course,class from students where email="'.$email.'" and password="'.$pass.'"';
    }elseif ($category == 'attendant') {
      $query = 'Select id,name from attendants where email="'.$email.'" and password="'.$pass.'"';
    }elseif ($category == 'admin') {
      $query = 'Select id,name,email from admins where email="'.$email.'" and password="'.$pass.'"';
    }else{
      echo "Something Went wrong...!";
    }
    $result = mysql_query($query);
    if($result && mysql_num_rows($result)>0){
      if($category == 'admin'){
        while($row = mysql_fetch_assoc($result)){
          // $admin = json_encode($row);
          $_SESSION['admin-email'] = $row['email'];
          $_SESSION['admin-id'] = $row['id'];
          $_SESSION['admin-name'] = $row['name'];
          header('Location: ../views/adminDashboard.php');
        }
      }elseif ($category == 'student') {
        while($row = mysql_fetch_assoc($result)){
          // $admin = json_encode($row);
          $_SESSION['stu-id'] = $row['id'];
          $_SESSION['stu-name'] = $row['name'];
          header('Location: ../views/studentDashboard.php');
        }
      }elseif ($category == 'attendant') {
        while($row = mysql_fetch_assoc($result)){
          // $admin = json_encode($row);
          $_SESSION['att-id'] = $row['id'];
          $_SESSION['att-name'] = $row['name'];
          header('Location: ../views/attendantDashboard.php');
        }
      }
    }else{
      header('Location: ../views/index.php');
    }
  }else{
    echo "Something Went wrong";
  }
 ?>
