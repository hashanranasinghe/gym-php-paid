<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>MyGym | View All Trainers</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>
<body>

<div class="container">
  <h1>View All Trainers</h1>

  <table class="table table-bordered">
    <thead>
      <tr>
        <th>Trainer No</th>
        <th>Trainer Name</th>
        <th>Trainer Class</th>
        <th>Trainer Contact</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $i=0;
      if(isset($_GET['view_trainers'])) { 
      $sel_trainer="SELECT * FROM trainer";
      $run_trainer=mysqli_query($con, $sel_trainer);
      while ($row_trainer=mysqli_fetch_array($run_trainer)) {
        $tran_id=$row_trainer['tran_id'];
        $tran_name=$row_trainer['tran_name'];
        $tran_class=$row_trainer['tran_class'];
        $tran_contact=$row_trainer['tran_contact'];

        $i++;
      
      ?>
      <tr>
        <td><?php echo $i; ?></td>
        <td><?php echo $tran_name; ?></td>
        <td><?php echo $tran_class; ?></td>
        <td><?php echo $tran_contact; ?></td>
        <td><a href="index.php?edit_tran=<?php echo $tran_id; ?>" class="btn btn-primary">Edit</a></td>
        <td><a href="index.php?delete_tran=<?php echo $tran_id; ?>" class="btn btn-danger">Delete</a></td>
      </tr>
      <?php } } ?>
    </tbody>
  </table>
</div>

</body>
</html>
