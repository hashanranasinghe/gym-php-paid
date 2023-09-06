<?php 

include ("includes/db.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGym | Add Exercises</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>

<div class="container">
  <h1>Add Exercises</h1>

  <form method="post" action="add_exercises.php" enctype="multipart/form-data">
    <div class="form-group">
      <label for="user">Select User</label>
      <select class="form-control" name="user">
        <option>Select a User</option>
        <?php
          $get_user="SELECT * FROM user";
          $run_user=mysqli_query($con, $get_user);
          while($row_days=mysqli_fetch_array($run_user)){
            $user_id=$row_days['id'];
            $user_name=$row_days['username'];
            echo "<option value='$user_id'>$user_name</option>";
          }
        ?>
      </select>
    </div>
    <div class="form-group">
      <label for="day">Days</label>
      <select class="form-control" name="day">
        <option>Select a day</option>
        <?php
          $get_day="SELECT * FROM days";
          $run_day=mysqli_query($con, $get_day);
          while($row_days=mysqli_fetch_array($run_day)){
            $day_id=$row_days['day_id'];
            $day_name=$row_days['day_name'];
            echo "<option value='$day_id'>$day_name</option>";
          }
        ?>
      </select>
    </div>
    <div class="form-group">
      <label for="exercise">Name Of Exercise</label>
      <input type="text" class="form-control" id="exercise" name="exercise">
    </div>
    <div class="form-group">
      <label for="sets">Number of Sets</label>
      <input type="text" class="form-control" id="sets" name="sets">
    </div>
    <div class="form-group">
      <label for="exer_img">Exercise Image</label>
      <input type="file" class="form-control-file" id="exer_img" name="exer_img">
    </div>
    <button type="submit" class="btn btn-primary">Assign Workout</button>
  </form>
</div>

</body>
</html>


<?php 

	if (isset($_POST['insert_workout']))
	{

		//Text Data Variables
		$user_name= $_POST['user'];
		$exer_name= $_POST['exercise'];
		$day_name= $_POST['day'];
		$sets= $_POST['sets'];

		//  Image Name
		$exercise_img= $_FILES['exer_img']['name'];

		//Images Temp Name
		$temp_name= $_FILES['exer_img']['tmp_name'];

		//Validations
		if($user_name==''){
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}
		elseif ($exer_name=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}
		elseif ($day_name=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}
		elseif ($sets=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}
		elseif ($exercise_img=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}

		else{

			move_uploaded_file($temp_name, "exercise_images/$exercise_img");

			//Query For Inserting Workout Into Database.....
			$insert_exer = "insert into exercises(exer_name, sets, day_id, exer_img, user_id) values('$exer_name','$sets','$day_name','$exercise_img','$user_name')";
			$run_exer = mysqli_query($con, $insert_exer);
			if ($run_exer) {
				echo "<script>alert('Exercise Inserted')</script>";
				echo "<script>window.open('index.php?add_exercises','_self')</script>";
			}
			else{
				echo "<script>alert('Error')</script>";
			}
			
		}
	}
?>