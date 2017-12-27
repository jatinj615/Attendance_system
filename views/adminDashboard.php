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
    <a class="nav-link active" id="manage-stu" data-toggle="tab" href="#manageStudents" role="tab" aria-controls="home" aria-selected="true">Manage Students</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="add-stu" data-toggle="tab" href="#addStudent" role="tab" aria-controls="profile" aria-selected="false">Add Students</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="manage-att" data-toggle="tab" href="#manageAttendants" role="tab" aria-controls="contact" aria-selected="false">Manage Attendants</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="manage-booking" data-toggle="tab" href="#manageBookings" role="tab" aria-controls="contact" aria-selected="false">Manage Bookings</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="manageStudents" role="tabpanel" aria-labelledby="home-tab">
  	   <table class="table table-hover">
      <thead>
        <tr>
          <th scope="col">id</th>
          <th scope="col">Name</th>
          <th scope="col">Email</th>
          <th scope="col">Phone Number</th>
          <th></th>
        </tr>
      </thead>
      <tbody id="tstubody">
      </tbody>
    </table>
  </div>
  <div class="tab-pane fade" id="addStudent" role="tabpanel" aria-labelledby="profile-tab">
	<div class="main-content container col-md-4">
		<div class="form-group">
		  <label for="name">Name</label>
		  <input type="text" class="form-control" id="stu-name" aria-describedby="emailHelp" placeholder="Enter name" required>
		</div>
		<div class="form-group">
		  <label for="address">Address</label>
		  <input type="text" class="form-control" id="stu-address" aria-describedby="emailHelp" placeholder="Enter name" required>
		</div>
		<div class="form-group">
		  <label for="exampleInputEmail1">Email address</label>
		  <input type="email" class="form-control" id="stu-exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" required>
		</div>
		<div class="form-group">
		  <label for="phonenumber">Phone Number</label>
		  <input type="tel" class="form-control" id="stu-phonenumber" aria-describedby="emailHelp" placeholder="Enter phone number" required>
		</div>
		<div class="form-group">
		  <label for="exampleInputPassword1">Password</label>
		  <input type="password" class="form-control" id="stu-exampleInputPassword1" placeholder="Password" name="password" required>
		</div>
		<div class="form-group">
		  <label for="exampleInputPassword2">Confirm Password</label>
		  <input type="password" class="form-control" id="stu-exampleInputPassword2" placeholder="Confirm Password" name="password" required>
		</div>
		<button type="submit" class="btn btn-primary" id="addStu" data-toggle="modal" data-target="#addStudentCourse">Add Now</button>
	</div>
  </div>
  <div class="tab-pane fade" id="manageAttendants" role="tabpanel" aria-labelledby="contact-tab">
  	<div class="main-content container col-md-6">
		<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Phone Number</th>
      <th></th>
    </tr>
  </thead>
  <tbody id="tbody">
  </tbody>
</table>
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addAttendant">
        Add New
    </button><br><br>
	</div>
  </div>
  <div class="tab-pane fade" id="manageBookings" role="tabpanel" aria-labelledby="contact-tab">
  	
  </div>
</div>

<!-- modals -->
	<!-- modal1 -->
	<div class="modal fade" id="addAttendant" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Attendant</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="att-name" aria-describedby="emailHelp" placeholder="Enter name" required="true">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" required="true">
          </div>
          <div class="form-group">
            <label for="phonenumber">Phone Number</label>
            <input type="tel" class="form-control" id="phonenumber" aria-describedby="emailHelp" placeholder="Enter phone number" required="true">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="password" required="true">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword2">Confirm Password</label>
            <input type="password" class="form-control" id="exampleInputPassword2" placeholder="Confirm Password" name="password" required="true">
          </div>
          <button type="submit" class="btn btn-primary" id="addAtt">Add Now</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
<!-- /modal1 -->
<!-- modal2 -->
<div class="modal fade" id="editAttendant" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Attendant</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="edit-att-name" aria-describedby="emailHelp" placeholder="Enter name" required="true">
          </div>
          <div class="form-group">
            <label for="exampleInputEmail1">Email address</label>
            <input type="email" class="form-control" id="edit-exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" name="email" required="true">
          </div>
          <div class="form-group">
            <label for="phonenumber">Phone Number</label>
            <input type="tel" class="form-control" id="edit-phonenumber" aria-describedby="emailHelp" placeholder="Enter phone number" required="true">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" id="edit-exampleInputPassword1" placeholder="Password" name="password" required="true">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword2">Confirm Password</label>
            <input type="password" class="form-control" id="edit-exampleInputPassword2" placeholder="Confirm Password" name="password" required="true">
          </div>
          <button type="submit" class="btn btn-primary" id="editAtt">Update</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
<!-- /modal2 -->
<!-- modal3 -->
<div class="modal fade" id="addStudentCourse" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Student's Course Details</h5>
      </div>
      <div class="modal-body">
          <div class="form-group">
            <label for="name">Course Name</label>
            <input type="text" class="form-control" id="course-name" aria-describedby="emailHelp" placeholder="Enter name" required="true">
          </div>
          <div class="form-group">
            <label for="name">Class</label>
            <input type="text" class="form-control" id="class" aria-describedby="emailHelp" placeholder="Enter name" required="true">
          </div>
          <button type="submit" class="btn btn-primary" id="assignCourse">Assign</button>

      </div>
    </div>
  </div>
</div>
<!-- /modal3 -->
<!-- /modals -->

 <div class="modal-overlay"></div>
   <?php include 'footer.php' ?>
