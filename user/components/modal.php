<?php

session_start();

include('form_handler.php');

?>


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload a Post</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="POST">
          <div class="form-group">
            <label for="name" class="col-form-label">Name</label>
            <input type="text" class="form-control" id="name" name="name" value="<?php echo $_SESSION['user_name']; ?>" readonly > 
          </div>
          <div class="form-group">
            <label for="thoughts" class="col-form-label">Your Thoughts</label> <!-- Changed 'text' to 'thoughts' for consistency -->
            <textarea class="form-control" id="thoughts" name="thoughts"></textarea> <!-- Added 'name' attribute -->
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" id="uploadButton">Upload Post</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $name = $_SESSION['user_name'];
  $thoughts = $_POST['thoughts'];
  $userId = $_SESSION['user_id']; 

  $sql = "INSERT INTO community (user_id, author,thoughts) VALUES ('$userId', '$name','$thoughts')";
  $result = mysqli_query($conn, $sql);
  if ($result == true) {
      $_SESSION['addPost'] = '
      <div class="alert alert-success alert-dismissible fade show" role="alert">
      Post uploaded successfully!!
      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>';
      header('location: http://localhost/gym/community.php');
      exit();
  } else {
      $_SESSION['failInfo'] = '<div class="alert alert-danger" role="alert">
    Failed!  </div>';
      header('location: http://localhost/gym/community.php');
      exit();
  }
}

?>
