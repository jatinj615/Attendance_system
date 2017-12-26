<?php
	session_start();
	if (isset($_SESSION['id']) && $_SESSION['id'] != null) {
		$name = $_SESSION['name'];
	}else{
		header('Location: index.php');
	}
 ?>

 <?php include 'header.php' ?>
		 	<nav class="navbar navbar-light" style="background-color: #e3f2fd;">
		 	  <a class="navbar-brand" href="adminDashboard.php">Home</a>
		 	    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
		 	      <span class="navbar-toggler-icon"></span>
		 	    </button>
		 	    <div class="collapse navbar-collapse" id="navbarText">
		 	      <ul class="navbar-nav mr-auto">
		 	        <li class="nav-item active">
		 	          <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
		 	        </li>
		 	        <li class="nav-item">
		 	          <a class="nav-link" href="#">Features</a>
		 	        </li>
		 	        <li class="nav-item">
		 	          <a class="nav-link" href="#">Pricing</a>
		 	        </li>
		 	      </ul>
		 	    </div>
		 	</nav>
		  
   <?php include 'footer.php' ?>
