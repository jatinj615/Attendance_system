<?php
	session_start();
	if (isset($_SESSION['att-id']) && $_SESSION['att-id'] != null) {
		$name = $_SESSION['att-name'];
	}else{
		header('Location: index.php');
	}
 ?>

 <?php include 'header.php' ?>
 <div class="main-content container-fluid">
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
    <a class="nav-link" id="book-studio" data-toggle="tab" href="#bookStudio" role="tab" aria-controls="contact" aria-selected="false">Book Studio</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
	  <div class="tab-pane fade" id="markAttendance" role="tabpanel" aria-labelledby="contact-tab">
	  			   <table class="table table-hover">
	  		    <thead>
	  		      <tr>
	  		        <th scope="col">id</th>
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
	  		        <th scope="col">id</th>
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
	  </div>
</div>
<!-- modals -->
<!-- modal1 -->
	<div id="mark-attendance" tabindex="-1" role="dialog" class="modal fade">
	<div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title hidden" id="exampleModalLabel"></h5>
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
        <h2 class="modal-title" id="exampleModalLabel1">Attendance Record</h2>
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
          	
			<button type="button" class="btn btn-default" id="absent" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<!-- /modal2 -->
<div class="modal-overlay"></div>
<!-- /modals -->
</div>
</div>
</div>
</div>
</div>
<?php include 'footer.php' ?>