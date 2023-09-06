<?php 

include ("includes/db.php");

if (isset($_GET['edit_exercise'])) {
	$edit_exer_id=$_GET['edit_exercise'];

	$sel_exer="SELECT * FROM exercises WHERE exer_id='$edit_exer_id'";
	$run_exer=mysqli_query($con, $sel_exer);
	$row_exer=mysqli_fetch_array($run_exer);
	$exer_up_id=$row_exer['exer_id'];
	$exer_name=$row_exer['exer_name'];
	$sets=$row_exer['sets'];
	$day_id=$row_exer['day_id'];
	$exer_img=$row_exer['exer_img'];
	$user_id=$row_exer['user_id'];
}

$sel_day="SELECT * FROM Days WHERE day_id='$day_id'";
$run_day=mysqli_query($con, $sel_day);
$row_days=mysqli_fetch_array($run_day);

$day_edit_name=$row_days['day_name'];


$sel_user="SELECT * FROM user WHERE id='$user_id'";
$run_user=mysqli_query($con, $sel_user);
$row_users=mysqli_fetch_array($run_user);

$user_edit_name=$row_users['username'];

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGym | Edit Exercises</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>

<div class="container">
  <h1>Edit Exercises</h1>

  <form method="post" action="" enctype="multipart/form-data">
    <div class="row">

	<div class="col-md-6">
    <div class="form-group">
        <label for="user">User Name</label>
        <select name="user" class="form-control">
            <option value="<?php echo $user_id; ?>"><?php echo $user_edit_name; ?></option>
            <?php
            $get_users = "SELECT * FROM user";
            $run_users = mysqli_query($con, $get_users);
            while ($row_user = mysqli_fetch_array($run_users)) {
                $loop_user_id = $row_user['id'];
                $loop_user_name = $row_user['username'];
                if ($loop_user_id != $user_id) {
                    echo "<option value='$loop_user_id'>$loop_user_name</option>";
                }
            }
            ?>
        </select>
    </div>
</div>
<div class="col-md-6">
    <div class="form-group">
        <label for="day">Days</label>
        <select name="day" class="form-control">
            <option value="<?php echo $day_id; ?>"><?php echo $day_edit_name; ?></option>
            <?php
            $get_days = "SELECT * FROM days";
            $run_days = mysqli_query($con, $get_days);
            while ($row_day = mysqli_fetch_array($run_days)) {
                $loop_day_id = $row_day['day_id'];
                $loop_day_name = $row_day['day_name'];
                if ($loop_day_id != $day_id) {
                    echo "<option value='$loop_day_id'>$loop_day_name</option>";
                }
            }
            ?>
        </select>
    </div>
</div>

    </div>
    <div class="form-group">
      <label for="exercise">Name Of Exercise</label>
      <input type="text" name="exercise" class="form-control" value="<?php echo $exer_name; ?>">
    </div>
    <div class="form-group">
      <label for="sets">Number of Sets</label>
      <input type="text" name="sets" class="form-control" value="<?php echo $sets; ?>">
    </div>
    <div class="form-group">
      <label for="exer_img">Exercise Image</label>
      <input type="file" name="exer_img">
      <br>
      <img src="exercise_images/<?php echo $exer_img; ?>" height="200px">
    </div>
    <input type="submit" name="update_workout" value="Update Workout" class="btn btn-primary">
  </form>
</div>

</body>
</html>




<?php 

	if (isset($_POST['update_workout']))
	{

		//Text Data Variables
		$user_id= $_POST['user'];
		$exer_name= $_POST['exercise'];
		$day_id= $_POST['day'];
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
			$update_exer = "UPDATE exercises SET exer_name='$exer_name', sets='$sets', day_id='$day_id', exer_img='$exercise_img', user_id='$user_id' WHERE exer_id='$exer_up_id'";
			$run_update = mysqli_query($con, $update_exer);
			if ($run_update) {
				echo "<script>alert('Exercise Updated')</script>";
				echo "<script>window.open('index.php?view_exercises','_self')</script>";
			}
			else{
				echo "<script>alert('Error')</script>";
			}
			
		}
	}
?>