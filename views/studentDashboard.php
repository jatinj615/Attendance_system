<?php
	session_start();
	if (isset($_SESSION['id']) && $_SESSION['id'] != null) {
		$name = $_SESSION['name'];
	}else{
		header('Location: index.php');
	}
 ?>

 <?php include 'header.php' ?>
<ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
  <li class="nav-item">
    <a class="nav-link active" id="profile" data-toggle="tab" href="#viewProfile" role="tab" aria-controls="home" aria-selected="true">Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="add-stu" data-toggle="tab" href="#viewAttendance" role="tab" aria-controls="profile" aria-selected="false">View Attendance</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="manage-att" data-toggle="tab" href="#bookStudio" role="tab" aria-controls="contact" aria-selected="false">Book Studio</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
	  <div class="tab-pane fade" id="viewProfile" role="tabpanel" aria-labelledby="contact-tab">
	  	
	  </div>
	  <div class="tab-pane fade" id="viewAttendance" role="tabpanel" aria-labelledby="contact-tab">
	  	
	  </div>
	  <div class="tab-pane fade" id="bookStudio" role="tabpanel" aria-labelledby="contact-tab">
	  	
	  </div>
</div>
<?php include 'footer.php' ?>