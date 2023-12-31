<?php 

	$db=mysqli_connect("localhost","root","","gym");
	
	//getdays function start
	function getDays() {
		global $db;
		$get_days = "SELECT * FROM days";
		$run_days = mysqli_query($db, $get_days);
		
		// Check if 'day' key is set in $_GET
		if(isset($_GET['day'])) {
			$day = $_GET['day'];
		} else {
			$day = ''; // Set a default value if 'day' is not set
		}
		
		while($row_days = mysqli_fetch_array($run_days)) {
			$day_id = $row_days['day_id'];
			$day_name = $row_days['day_name'];
			
			if($day_id == $day) {
				echo "<a href='exercise.php?day=$day_id' class='list-group-item list-group-item-action btn-primary' style='background-color: blue !important; color: white'>$day_name</a>";
			} else {
				echo "<a href='exercise.php?day=$day_id' class='list-group-item list-group-item-action'>$day_name</a>";
			}
		}
	}//getdays function end


	//getExercises function start
	function getExercises(){
		global $db;
		$get_exer="SELECT * FROM exercises";
		$run_exer=mysqli_query($db, $get_exer);
		while($row_exer=mysqli_fetch_array($run_exer)){
			$exer_id=$row_exer['exer_id'];
			$exer_name=$row_exer['exer_name'];
			echo "<li><a href='exercise.php?exer=$exer_id'>$exer_name</a></li>";
		}
	}  //getExercises function end


	// get_Day_Exercises function start (Pick Workout according to specific Day)
	function get_Day_Exercises() {
		global $db;
	
		if (isset($_GET['day'])) {
			$user_id = $_SESSION['user_id'];
			$day_id = $_GET['day'];
	
			$get_exer = "SELECT * FROM exercises WHERE day_id = '$day_id' AND user_id ='$user_id' ";
			$run_exer = mysqli_query($db, $get_exer);
			$count = mysqli_num_rows($run_exer);
	
			if ($count == 0) {
				echo "<h3>No Exercises Available</h3>";
			} else {
				while ($row_exer = mysqli_fetch_array($run_exer)) {
					$exer_id = $row_exer['user_id'];
					$exer_name = $row_exer['exer_name'];
					$sets = $row_exer['sets'];
					$exer_img = $row_exer['exer_img'];
	
	
						echo "
							<div id='single_product'>
							<h3 style='font-size: 18px;'>$exer_name</h3>
							<img src='../admin/exercise_images/$exer_img' width='300' height='221' /><br>
							<p style='font-size: 18px;'>$sets Sets</p>
							</div>
						";
					
				}
			}
		}
	}
	
	 // get_Exer_day function end.....



	// get_Day_Exercises function start (Pick Workout according to specific Day)
	function get_Exer_Exercises(){
		global $db;
		if(isset($_GET['exer'])){

				$exer_id=$_GET['exer'];

				$get_exer_exer="SELECT * FROM exercises WHERE exer_id='$exer_id'";
				$run_exer_exer=mysqli_query($db, $get_exer_exer);
				$count= mysqli_num_rows($run_exer_exer);
				while($row_exer_exer=mysqli_fetch_array($run_exer_exer)){
					$exer_id= $row_exer_exer['exer_id'];
					$exer_name= $row_exer_exer['exer_name'];
					$exer_img= $row_exer_exer['exer_img'];

					echo "
						<div id='single_product'>
						<h3 style='font-size: 18px;'>$exer_name</h3>
						<img src='../admin/exercise_images/$exer_img' width='300' height='221' /><br>
						</div>
					";
				}
		}	
	}  // get_Exer_Exercises function end.....


	// getPro function start
	function get_All_Exercises(){
		global $db;
		if(!isset($_GET['day'])){
			if(!isset($_GET['exer'])){

				$get_all_exer="SELECT * FROM exercises ORDER By rand() LIMIT 0,5";
				$run_all_exer=mysqli_query($db, $get_all_exer);
				while($row_all_exer=mysqli_fetch_array($run_all_exer)){
					$exer_id= $row_all_exer['exer_id'];
					$exer_name= $row_all_exer['exer_name'];
					$sets= $row_all_exer['sets'];
					$exer_img= $row_all_exer['exer_img'];
					
					echo "
						<div id='single_product'>
						<img src='../admin/exercise_images/$exer_img' width='200' height='147' /><br>
						<h3 style='font-size: 18px;'>$exer_name</h3>
						</div>
						
						
					";
				}
			}
		}	
	}
	// getPro function end.....





 ?>