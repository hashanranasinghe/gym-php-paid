<?php 

session_start();

if($_SESSION['admin_email']==true){
	}
	else{
		header('location: login.php');
	}

include ("includes/db.php");
?>
<html>
<head>
	<title>My Gym</title>
	<link rel="stylesheet" type="text/css" href="styles/style.css" media="all" />
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style>
  .list-group-item.active {
    color: white; 
  }
</style>

</head>
<body>
<!--Main Navigation-->
<header>
  <!-- Sidebar -->
  <nav id="sidebarMenu" class="collapse d-lg-block sidebar collapse bg-white">
    <div class="position-sticky">
      <div class="list-group list-group-flush mx-3 mt-4">
	  <a href="index.php?view_users" class="list-group-item list-group-item-action py-2 ripple<?php if(isset($_GET['view_users'])) echo ' active'; ?>">
  <i class="fas fa-tachometer-alt fa-fw me-3"></i><span>View Users</span>
</a>
        <a href="index.php?view_trainers" class="list-group-item list-group-item-action py-2 ripple <?php if(isset($_GET['view_trainers'])) echo ' active'; ?>">
          <i class="fas fa-chart-area fa-fw me-3"></i><span>View Trainers</span>
        </a>
		<a href="index.php?view_exercises" class="list-group-item list-group-item-action py-2 ripple <?php if(isset($_GET['view_exercises'])) echo ' active'; ?>"
		  ><i class="fas fa-chart-line fa-fw me-3"></i><span>View Exercises</span></a
		>
        <a href="index.php?add_trainers" class="list-group-item list-group-item-action py-2 ripple <?php if(isset($_GET['add_trainers'])) echo ' active'; ?>"
          ><i class="fas fa-lock fa-fw me-3"></i><span>Add Trainers</span></a
        >
		<a href="index.php?assign_trainer" class="list-group-item list-group-item-action py-2 ripple <?php if(isset($_GET['assign_trainer'])) echo ' active'; ?>"
          ><i class="fas fa-lock fa-fw me-3"></i><span>Assign Trainer</span></a
        >
        <a href="index.php?add_exercises" class="list-group-item list-group-item-action py-2 ripple <?php if(isset($_GET['add_exercises'])) echo ' active'; ?>">
          <i class="fas fa-chart-pie fa-fw me-3"></i><span>Add Exercises</span>
        </a>
		<a href="index.php?view_community" class="list-group-item list-group-item-action py-2 ripple <?php if(isset($_GET['view_community'])) echo ' active'; ?>">
          <i class="fas fa-chart-pie fa-fw me-3"></i><span>Community</span>
        </a>
		<a href="index.php?view_advice" class="list-group-item list-group-item-action py-2 ripple <?php if(isset($_GET['view_advice'])) echo ' active'; ?>">
          <i class="fas fa-chart-pie fa-fw me-3"></i><span>Asking Advices</span>
        </a>
		<a href="index.php?view_info" class="list-group-item list-group-item-action py-2 ripple <?php if(isset($_GET['view_info'])) echo ' active'; ?>">
          <i class="fas fa-chart-pie fa-fw me-3"></i><span>Asking Information</span>
        </a>
      </div>
    </div>
  </nav>
  <!-- Sidebar -->

  <!-- Navbar -->


  <nav class="navbar navbar-light bg-light justify-content-between fixed-top">
  <a class="navbar-brand"><img src="assets/logo.png" height="50px"></a>
  <a class="btn btn-danger" href="logout.php">LOG OUT</a>
</nav>
  <!-- Navbar -->
</header>
<!--Main Navigation-->

<!--Main layout-->
<main style="margin-top: 58px;">
  <div class="container pt-4"></div>
</main>
<!--Main layout-->

	<!-- Main Container Start -->
	<div class="wrapper">
		
		
		<!-- Content Start -->

			<div class="left">
				<!-- Product Display Box Start -->
					<div id="products_box">
						<?php
							if (isset($_GET['view_users'])) {
								include("view_users.php");
							}
							if (isset($_GET['view_trainers'])) {
								include("view_trainers.php");
							} 
							if (isset($_GET['add_trainers'])) {
								include("add_trainers.php");
							}
							if (isset($_GET['assign_trainer'])) {
								include("assign_trainer.php");
							}
							if (isset($_GET['view_exercises'])) {
								include("view_exercises.php");
							}
							if (isset($_GET['view_advice'])) {
								include("view_advice.php");
							}
							if (isset($_GET['view_info'])) {
								include("view_info.php");
							}
							if (isset($_GET['add_exercises'])) {
								include("add_exercises.php");
							}
							if (isset($_GET['edit_tran'])) {
								include("edit_tran.php");
							}
							if (isset($_GET['edit_exercise'])) {
								include("edit_exercises.php");
							}
							if (isset($_GET['delete_exercise'])) {
								include("delete_exercise.php");
							}
							if (isset($_GET['delete_tran'])) {
								include("delete_trainer.php");
							}
							if (isset($_GET['delete_user'])) {
								include("delete_user.php");
							}

						?>
					</div>
					<?php
							if (isset($_GET['view_community'])) {
								include("view_community.php");
							}
					
					?>
					<!-- Product Display Box End -->
			</div>

		<!-- Content End -->


	</div>
	<!-- Main Container End -->

	<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>