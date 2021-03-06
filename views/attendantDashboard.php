<?php
	session_start();
	if (isset($_SESSION['att-id']) && $_SESSION['att-id'] != null) {
		$name = $_SESSION['att-name'];
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
                <li class="dropdown"><a href="#" data-toggle="dropdown" role="button" aria-expanded="false" class="dropdown-toggle"><img src="../src/images/default.png" alt="Avatar"><span class="user-name"><?php echo $_SESSION['att-name']; ?></span></a>
                  <ul role="menu" class="dropdown-menu">
                    <li>
                      <div class="user-info">
                        <div class="user-name"><?php echo $_SESSION['att-name']; ?></div>
                        <div class="user-position online">Available</div>
                      </div>
                    </li>
                    <li><a href="../controllers/logout.php?panel=attendant"><span class="icon mdi mdi-power"></span> Logout</a></li>
                  </ul>
                </li>
              </ul>
              <div class="page-title"><span>Attendant Panel</span></div>
              <ul class="nav navbar-nav navbar-right be-icons-nav">
              </ul>
            </div>
          </div>
        </nav>
 <div class="main-content container-fluid" onclick="getBookedDates('manage')">
      <div class="row">
        <div class="col-md-12">
          <div class="panel panel-default">
            <div class="panel-body">
<ul class="nav nav-tabs col-md-offset-4" id="myTab" role="tablist" style="margin-left: 44rem;margin-right: 43rem">
  <li class="nav-item">
    <a class="nav-link active" id="mark-att" data-toggle="tab" href="#markAttendance" role="tab" aria-controls="home" aria-selected="true">Mark Attendance</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="view-attendance" data-toggle="tab" href="#viewAttendance" role="tab" aria-controls="profile" aria-selected="false">View Attendance</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" id="attendant-book-studio" data-toggle="tab" href="#bookStudio" role="tab" aria-controls="contact" aria-selected="false">Book Studio</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
	  <div class="tab-pane fade" id="markAttendance" role="tabpanel" aria-labelledby="contact-tab">
	  			   <table class="table table-hover">
	  		    <thead>
	  		      <tr>
	  		        <th scope="col">Id</th>
	  		        <th scope="col">Name</th>
	  		        <th scope="col">Course</th>
	  		        <th scope="col">Class</th>
	  		       	<th scope="col">Mark Attendance</th>
	  		      </tr>
	  		    </thead>
	  		    <tbody id="tattendancebody">
	  		    </tbody>
	  		  </table>
	  		</div>
	  <div class="tab-pane fade" id="viewAttendance" role="tabpanel" aria-labelledby="contact-tab">
	  		<table class="table table-hover">
	  		    <thead>
	  		      <tr>
	  		        <th scope="col">Id</th>
	  		        <th scope="col">Name</th>
	  		        <th scope="col">Course</th>
	  		        <th scope="col">Class</th>
	  		       	<th scope="col">View Attendance</th>
	  		      </tr>
	  		    </thead>
	  		    <tbody id="tviewattendancebody">
	  		    </tbody>
	  		  </table>
	  </div>
	  <div class="tab-pane fade" id="bookStudio" role="tabpanel" aria-labelledby="contact-tab">
	  		   <table class="table table-hover">
	  	    <thead>
	  	      <tr>
	  	        <th scope="col">Id</th>
	  	        <th scope="col">Name</th>
	  	        <th scope="col">Course</th>
	  	        <th scope="col">Class</th>
	  	       	<th scope="col">Book Studio</th>
	  	      </tr>
	  	    </thead>
	  	    <tbody id="tstudiobody">
	  	    </tbody>
	  	  </table>
	  </div>
</div>
<!-- modals -->
<!-- modal1 -->
	<div id="mark-attendance" tabindex="-1" role="dialog" class="modal fade">
	<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title hidden" id="exampleModalLabel"></h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <button type="submit" class="btn btn-primary" id="present" data-dismiss="modal">Present</button>
        <button type="button" class="btn btn-danger" id="absent" data-dismiss="modal">Absent</button>

      </div>
    </div>
  </div>
</div>
<!-- /modal1 -->
<!-- modal2 -->
	<div id="view-detail-attendance" tabindex="-1" role="dialog" class="modal fade">
	<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title" id="exampleModalLabel1">Attendance Record</h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
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
          	
			<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- /modal2 -->
<!-- modal3 -->
<div id="book-student-studio" tabindex="-1" role="dialog" class="modal fade">
	<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title hidden" id="exampleModalLabel"></h1>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
			<div class="row" style="opacity: 0">
	  	          <div id="main-chart" style="width: 1px; height: 20px;"></div>
	  	          </div>
	  	                
	  	        <div class="row">
	  	          <div class="col-xs-12 col-md-3" style="opacity: 0">
	  	            <div class="widget be-loading">
	  	              <div class="widget-chart-container">
	  	                <div id="top-sales" style="width:1px; height: 178px;"></div>
	  	                </div>
	  	              </div>
	  	          </div>
	  	          <div class="col-xs-6 col-md-6">
	  	            <div class="widget widget-calendar be-loading">
	  	              <div id="calendar-widget"></div>
	  	            </div>
	  	          </div>
	  	        </div>
	  	        <div class="col-md-offset-4 hidden" id="booking-form">
	  	        	<p id="stu-id" class="hidden"></p>
	  	        	<p id="studio-availability"><strong>Available : </strong></p>
	  	        	<a href="#" id="studio-book-now" class="btn btn-primary">Book Now</a>
	  	        	<a href="#" id="stuio-book-cancel" class="btn btn-danger">Cancel</a>
	  	        </div>
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

      </div>
    </div>
  </div>
</div>
<!-- /modal3 -->
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