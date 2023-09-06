<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGym | View All Exercises</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>

<div class="container">
  <h1>View All Exercises</h1>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Exercise No</th>
        <th>Exercise Name</th>
        <th>Exercise Image</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $i=0;
      if(isset($_GET['view_exercises'])) { 
      $sel_exer="SELECT * FROM exercises";
      $run_exer=mysqli_query($con, $sel_exer);
      while ($row_exer=mysqli_fetch_array($run_exer)) {
        $exer_id=$row_exer['exer_id'];
        $exer_name=$row_exer['exer_name'];
        $exer_img=$row_exer['exer_img'];

        $i++;
      
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $exer_name; ?></td>
        <td><img src="exercise_images/<?php echo $exer_img; ?>" width="60" height="44"></td>
        <td><a href="index.php?edit_exercise=<?php echo $exer_id; ?>" class="btn btn-primary">Edit</a></td>
        <td><a href="index.php?delete_exercise=<?php echo $exer_id; ?>" class="btn btn-danger">Delete</a></td>
      </tr>
      <?php } } ?>
    </tbody>
  </table>
</div>

</body>
</html>
