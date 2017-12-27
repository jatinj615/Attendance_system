<?php
	session_start();
	if (isset($_SESSION['id']) && $_SESSION['id'] != null) {
		$name = $_SESSION['name'];
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
<ul class="nav nav-tabs col-md-offset-4" id="myTab" role="tablist" style="margin-left:45rem ;margin-right: 46rem">
  <li class="nav-item">
    <a class="nav-link active" id="profile" data-toggle="tab" href="#viewProfile" role="tab" aria-controls="home" aria-selected="true">View Profile</a>
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
</div>
</div>
</div>
</div>
</div>
<?php include 'footer.php' ?>