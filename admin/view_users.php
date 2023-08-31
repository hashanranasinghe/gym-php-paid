<html>
<head>

</head>
<body>
	
	<table align="center" width="100%" >
		<tr align="center">
			<td colspan="6"><h4>View All User</h4><br></td>
		</tr>
		<tr>
			<th>User No</th>
			<th>User Name</th>
			<th>User Email</th>
			<th>User Contact</th>
			<th>Delete</th>
		</tr>
		<?php 
		$i=0;
			$sel_user="SELECT * FROM user";
			$run_user=mysqli_query($con, $sel_user);
			while ($row_user=mysqli_fetch_array($run_user)) {
				$user_id=$row_user['id'];
				$user_name=$row_user['username'];
				$user_email=$row_user['email'];
				$user_contact=$row_user['phone_number'];

				$i++;
			
		?>
		<tr align="center">
			<td><?php echo $i; ?></td>
			<td><?php echo $user_name; ?></td>
			<td><?php echo $user_email; ?></td>
			<td><?php echo $user_contact; ?></td>
			<td><a href="index.php?delete_user=<?php echo $user_id; ?>">Delete</a></td>
		</tr>
		<?php } ?>
	</table>
</body>
</html>