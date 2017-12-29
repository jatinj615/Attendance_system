<?php
	session_start();
	if (isset($_SESSION['stu-id']) && $_SESSION['stu-id'] != null) {
		$name = $_SESSION['stu-name'];
	}else{
		header('Location: index.php');
	}
 ?>

 <?php include 'header.php' ?>
 <div class="be-wrapper be-color-header">
  <nav class="navbar navbar-default navbar-fixed-top be-top-header">
          <div class="container-fluid">
            <div class="navbar-header">
            </div>
            <div class="be-right-navbar">
              <ul class="nav navbar-nav navbar-right be-user-nav">
                <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><img src="../src/images/default.png" alt="Avatar"><span class="user-name"><?php echo $_SESSION['stu-name']; ?></span></a>
                  <ul role="menu" class="dropdown-menu">
                    <li>
                      <div class="user-info">
                        <div class="user-name"><?php echo $_SESSION['stu-name']; ?></div>
                        <div class="user-position online">Available</div>
                      </div>
                    </li>
                    <li><a href="../controllers/logout.php?panel=student"><span class="icon mdi mdi-power"></span> Logout</a></li>
                  </ul>
                </li>
              </ul>
              <div class="page-title"><span>Student Panel</span></div>
              <ul class="nav navbar-nav navbar-right be-icons-nav">
              </ul>
            </div>
          </div>
        </nav>
 <div class="main-content container-fluid"  onclick="getBookedDates('manage',<?php echo $_SESSION['stu-id'];?>)">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-body">
<ul class="nav nav-tabs col-md-offset-4" id="myTab" role="tablist" style="margin-left:45rem ;margin-right: 45rem">
  <li class="nav-item">
    <a class="nav-link active" onclick="getProfile(<?php echo $_SESSION['stu-id'];?>)" id="profile" data-toggle="tab" href="#viewProfile" role="tab" aria-controls="home" aria-selected="true">View Profile</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" onclick="viewAttendance(<?php echo $_SESSION['stu-id']?>)" id="view-stu-attendance" data-toggle="tab" href="#viewAttendance" role="tab" aria-controls="profile" aria-selected="false">View Attendance</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="manage-att" data-toggle="tab" href="#bookStudio" role="tab" aria-controls="contact" aria-selected="false">Book Studio</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
	  <div class="tab-pane fade col-md-offset-3 col-md-6" id="viewProfile" role="tabpanel" aria-labelledby="contact-tab">
	  	<table class="table table-hover" style="margin-right: 45rem">
	  	      
	  	    <tbody id="tprofilebody">
	  	    	
	  	    </tbody>
	  	  </table>
	  	  <button class="btn btn-primary pull-right" data-toggle="modal" data-target="#change-password">Change Password</button>
	  </div>
	  <div class="tab-pane fade col-md-offset-4 col-md-4" id="viewAttendance" role="tabpanel" aria-labelledby="contact-tab">
	  	<table class="table table-hover">
	  	    <thead>
	  	      <tr>
	  	        <th scope="col">Date</th>
	  	        <th scope="col">Status</th>
	  	      </tr>
	  	    </thead>
	  	    <tbody id="tviewstuattendancebody">
	  	    </tbody>
	  	  </table>
	  </div>
	  <div class="tab-pane fade" id="bookStudio" role="tabpanel" aria-labelledby="contact-tab">
	  		
	  		<div class="row" style="opacity: 0">
	  	          <div id="main-chart" style="width: 1px; height: 20px;"></div>
	  	          </div>
	  	                
	  	        <div class="row">
	  	          <div class="col-xs-12 col-md-4" style="opacity: 0">
	  	            <div class="widget be-loading">
	  	              <div class="widget-chart-container">
	  	                <div id="top-sales" style="width:1px; height: 178px;"></div>
	  	              </div>
	  	              </div>
	  	          </div>
	  	          <div class="col-xs-12 col-md-4">
	  	            <div class="widget widget-calendar be-loading">
	  	              <div id="calendar-widget"></div>
	  	            </div>
	  	          </div>
	  	        </div>
			<div class="col-md-offset-5 hidden" id="booking-form">
				<p id="stu-id" class="hidden"><?php echo $_SESSION['stu-id'] ?></p>
				<p id="studio-availability"><strong>Available : </strong></p>
				<a href="#" id="studio-book-now" class="btn btn-primary">Book Now</a>
				<a href="#" id="stuio-book-cancel" class="btn btn-danger">Cancel</a>
			</div>
	  </div>
</div>

<!-- modals -->
<!-- modal1 -->
<div id="editEmail" tabindex="-1" role="dialog" class="modal fade">
	<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title hidden" id="exampleModalLabel"></h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      	<div class="form-group">
      	  <label for="exampleInputEmail1">Current Email address</label>
      	  <input type="email" class="form-control" readonly="readonly" id="current-email" aria-describedby="emailHelp" placeholder="Enter email" name="email" required="">
      	</div>
      	<div class="form-group">
            <label for="exampleInputEmail1">New Email address</label>
            <input type="email" class="form-control" id="new-stu-email" aria-describedby="emailHelp" placeholder="Enter email" name="email" required="">
          </div>
          <button type="submit" class="btn btn-primary" id="email-change" onclick="changeStudentProfile(<?php echo $_SESSION['stu-id']?>,'email')">Change</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- /modal1 -->
<!-- modal2 -->
<div id="editPhone" tabindex="-1" role="dialog" class="modal fade">
	<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title hidden" id="exampleModalLabel"></h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<div class="form-group">
		  <label for="phonenumber">Current Phone Number</label>
		  <input type="tel" class="form-control" readonly="readonly" id="current-phonenumber" aria-describedby="emailHelp" placeholder="Enter phone number" required="">
		</div>
		<div class="form-group">
		  <label for="phonenumber">New Phone Number</label>
		  <input type="tel" class="form-control" id="new-stu-phone_no" aria-describedby="emailHelp" placeholder="Enter phone number" required="">
		</div>
          <button type="submit" class="btn btn-primary" id="phone-change" onclick="changeStudentProfile(<?php echo $_SESSION['stu-id']?>,'phone_no')" data-dismiss="modal">Change</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
<!-- /modal2 -->
<!-- modal3 -->
<div id="change-password" tabindex="-1" role="dialog" class="modal fade">
	<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title hidden" id="exampleModalLabel"></h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		<div class="form-group">
		  <label for="exampleInputPassword1">Current Password</label>
		  <input type="password" class="form-control" id="current-pass" placeholder="Current Password" name="password" required="">
		</div>
		<div class="form-group">
		  <label for="exampleInputPassword1">New Password</label>
		  <input type="password" class="form-control" id="new-pass" placeholder="New Password" name="password" required="">
		</div>
		<div class="form-group">
		  <label for="exampleInputPassword1">Confirm New Password</label>
		  <input type="password" class="form-control" id="conf-new-pass" placeholder="Confirm Password" name="password" required="">
		</div>
          <button type="submit" class="btn btn-primary" id="pass-change" onclick="changeStudentPassword(<?php echo $_SESSION['stu-id']?>)">Change</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
<!-- /modal3 -->
<!-- modal4 -->
<div id="studio-booking" tabindex="-1" role="dialog" class="modal fade">
	<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title hidden" id="exampleModalLabel">Availablility</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<span id="studio-availability"></span>
          <button type="submit" class="btn btn-primary" id="phone-change" onclick="changeStudentProfile(<?php echo $_SESSION['stu-id']?>,'phone_no')" data-dismiss="modal">Book</button>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
<!-- /modal4 -->
<div class="modal-overlay"></div>
<!-- /modals -->
</div>
</div>
</div>
</div>
</div>
</div>
<?php include 'footer.php' ?>
</body>
</html>