<?php 

include ("includes/db.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGym | Assign Trainer</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>

<div class="container">
  <h1>Assign Trainer</h1>

  <form method="post" action="assign_trainer.php" enctype="multipart/form-data">
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
      <label for="trainer">Trainer</label>
      <select class="form-control" name="trainer">
        <option>Select a Trainer</option>
        <?php
          $get_trainer="SELECT * FROM trainer";
          $run_trainer=mysqli_query($con, $get_trainer);
          while($row_trainers=mysqli_fetch_array($run_trainer)){
            $tran_id=$row_trainers['tran_id'];
            $tran_name=$row_trainers['tran_name'];
            echo "<option value='$tran_id'>$tran_name</option>";
          }
        ?>
      </select>
    </div>
    <button type="submit" class="btn btn-primary">Assign the Trainer</button>
  </form>
</div>

</body>
</html>



<?php 

	if (isset($_POST['assign_trainer']))
	{

		//Text Data Variables
		$user_id= $_POST['user'];
		$trainer_id= $_POST['trainer'];

		//Validations
		if($user_id==''){
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}
		elseif ($trainer_id=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}

		else{

		
			$insert_exer = "insert into assigntrainer(user_id,trainer_id) values('$user_id','$trainer_id')";
			$run_exer = mysqli_query($con, $insert_exer);
			if ($run_exer) {
				echo "<script>alert('Assign the Trainer successfully')</script>";
				echo "<script>window.open('index.php?assign_trainer','_self')</script>";
			}
			else{
				echo "<script>alert('Error')</script>";
			}
			
		}
	}
?>