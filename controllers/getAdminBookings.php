<?php  
  include 'dbconnect.php';
  session_start();
  $connect = new DatabaseConnect();
  $db = $connect->connect();
  if($db){
  	$query = 'SELECT students.id,students.name,students.email,students.phone_no,students.address,students.course,students.class,bookings.booking_date,bookings.id as bid from students,bookings where bookings.status=2 and bookings.stu_id=students.id';
  	$result = mysql_query($query);
  	if($result && mysql_num_rows($result) > 0){
  		$i = 0;
  		while ($row = mysql_fetch_assoc($result)) {
  			$data['bookings'][$i] = $row;
  			$i++;
  		}
  		print_r(json_encode($data));
  	}else{
  		echo "No Result Found..";
  	}
  }else{
  	echo "Something Went Wrong..";
  }
?>