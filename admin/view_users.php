<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGym | View All Users</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>

<div class="container">
  <h1>View All Users</h1>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>User No</th>
        <th>User Name</th>
        <th>User Email</th>
        <th>User Contact</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
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
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $user_name; ?></td>
        <td><?php echo $user_email; ?></td>
        <td><?php echo $user_contact; ?></td>
        <td><a href="index.php?delete_user=<?php echo $user_id; ?>" class="btn btn-danger">Delete</a></td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</div>

</body>
</html>
