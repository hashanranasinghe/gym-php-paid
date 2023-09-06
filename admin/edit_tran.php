<?php 

include ("includes/db.php");

if (isset($_GET['edit_tran'])) {
	$edit_tran_id=$_GET['edit_tran'];

	$sel_tran="SELECT * FROM trainer WHERE tran_id='$edit_tran_id'";
	$run_tran=mysqli_query($con, $sel_tran);
	$row_tran=mysqli_fetch_array($run_tran);
	$tran_up_id=$row_tran['tran_id'];
	$tran_name=$row_tran['tran_name'];
	$tran_class=$row_tran['tran_class'];
	$tran_contact=$row_tran['tran_contact'];
}

?>
<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGym | Update Trainers</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>

<div class="container">
  <h1>Update Trainers</h1>

  <form method="post" action="" enctype="multipart/form-data">
    <div class="row">
      <div class="col-md-6">
        <div class="form-group">
          <label for="trainer_name">Name Of Trainer</label>
          <input type="text" name="trainer_name" class="form-control" value="<?php echo $tran_name; ?>">
        </div>
      </div>
      <div class="col-md-6">
        <div class="form-group">
          <label for="trainer_class">Class</label>
          <select name="trainer_class" class="form-control">
            <option><?php echo $tran_class; ?></option>
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
      </div>
    </div>
    <div class="form-group">
      <label for="trainer_contact">Trainer Contact</label>
      <input type="text" name="trainer_contact" class="form-control" value="<?php echo $tran_contact; ?>">
    </div>
    <input type="submit" name="update_trainer" value="Update Trainer" class="btn btn-primary">
  </form>
</div>

</body>
</html>




<?php 

	if (isset($_POST['update_trainer']))
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
			$update_tran = "UPDATE trainer SET tran_name='$tran_name',tran_class='$tran_class',tran_contact='$tran_contact' WHERE tran_id='$tran_up_id'";
			$run_update = mysqli_query($con, $update_tran);
			if ($run_update) {
				echo "<script>alert('Data Updated Successfully')</script>";
				echo "<script>window.open('index.php?view_trainers','_self')</script>";
			}
			else{
				echo "<script>alert('Error')</script>";
			}
			
		}
	}
?>