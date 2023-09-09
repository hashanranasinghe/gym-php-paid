<?php 

include ("includes/db.php");

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGym | Add Trainers</title>
  <link rel="stylesheet" type="text/css" href="styles/style.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>

<div class="container">
  <h1>Add New Trainer</h1>

  <form method="post" action="add_trainers.php" enctype="multipart/form-data">
    <div class="form-group">
      <label for="trainer_name">Name of Trainer</label>
      <input type="text" class="form-control" id="trainer_name" name="trainer_name">
    </div>
    <div class="form-group">
      <label for="trainer_class">Class</label>
      <select class="form-control" name="trainer_class">
        <option>Select a Class</option>
        <?php
          $get_exer="SELECT * FROM exercises";
          $run_exer=mysqli_query($con, $get_exer);
          while($row_exer=mysqli_fetch_array($run_exer)){
            $exer_id=$row_exer['exer_id'];
            $exer_name=$row_exer['exer_name'];
            echo "<option value='$exer_name'>$exer_name</option>";
          }
        ?>
      </select>
    </div>
    <div class="form-group">
      <label for="trainer_contact">Trainer Contact</label>
      <input type="text" class="form-control" id="trainer_contact" name="trainer_contact">
    </div>
    <button type="submit" class="btn btn-primary" name="add_trainer">Add Trainer</button>
  </form>
</div>

</body>
</html>



<?php 

	if (isset($_POST['add_trainer']))
	{

		//Text Data Variables
		$tran_name= $_POST['trainer_name'];
		$tran_class= $_POST['trainer_class'];
		$tran_contact= $_POST['trainer_contact'];

		//Validations
		if($tran_name==''){
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}
		elseif ($tran_class=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}
		elseif ($tran_contact=='') {
			echo "<script>alert('Please Fill All The Fields!')</script>";
			exit();
		}

		else{

			//Query For Inserting New Trainer Into Database.....
			$insert_tran = "insert into trainer(tran_name, tran_class,tran_contact) values('$tran_name','$tran_class','$tran_contact')";
			$run_tran = mysqli_query($con, $insert_tran);
			if ($run_tran) {
				echo "<script>alert('1 New Trainer Added Successfully')</script>";
				echo "<script>window.open('index.php?add_trainers','_self')</script>";
			}
			else{
				echo "<script>alert('Error')</script>";
			}
			
		}
	}
?>