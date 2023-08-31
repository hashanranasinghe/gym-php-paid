<?php 

include ("includes/db.php");

?>
<html>
<head>
	<title>MyGym | Assign Trainer</title>
</head>
<body bgcolor="#999999">
	<form method="post" action="assign_trainer.php" enctype="multipart/form-data">
		<table width="794px" align="center" border="1" bgcolor="#f1533e">
			<tr>
				<td colspan="2" align="center"><h1>Assign Trainer</h1></td>
			</tr>
			<tr>
				<td align="right"><b>Select User</b></td>
				<td>
					<select name="user">
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
				</td>
			</tr>
			<tr>
				<td align="right"><b>Trainer</b></td>
				<td>
					<select name="trainer">
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
				</td>
			</tr>
			<tr>
				<td colspan="2" align="center"><input type="submit" name="assign_trainer" value="Assign the Trainer"></td>
			</tr>
		</table>
	</form>
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