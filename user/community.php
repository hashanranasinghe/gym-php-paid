<?php
ob_start();
include "components/navbar.php";
include "form_handler.php";
include "components/modal.php";
?>

<?php

if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] === 0 || $_SESSION['user_id'] === null){
    echo 
    '<a href="login/login.php" class="btn btn-primary btnClass">Log In</a>';
}else{
    echo '
    <button class="btnClass" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo"  type="submit"><i class="fa fa-plus-square" aria-hidden="true"></i>
    
    <div class="addBtnClass">Upload a Post</div>
    </button>';
}

?>
<div class="alertClass">

<?php
if (isset($_SESSION['addPost']))
{
    echo $_SESSION['addPost'];
    unset($_SESSION['addPost']);
}
?>
</div>
<?php
$sql = "SELECT * FROM community";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $postId = $row['id'];
        $user_id = $row['user_id'];
        $author = $row['author'];
        $thoughts = $row['thoughts'];
       

        echo '
        <form class="mx-1 mx-md-4" action="" method="GET">
            <div class="post">
                <div class="card">
                    <div class="card-header">' . ucfirst($author);
        
                    if (isset($_SESSION['user_id']) && $user_id == $_SESSION['user_id']) {
            echo '
                        <button name="delete" value="' . $postId . '" class="btn btn-danger btn-sm float-right">Delete</button>';
        }
        
        echo '
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>' . ucfirst($thoughts) . '</p>
                        </blockquote>
                    </div>
                </div>
            </div>
        </form>';
        
        
    }

    if (isset($_GET['delete'])) {
        $postIdToDelete = $_GET['delete'];
        // Perform the deletion operation using the $postIdToDelete
        $sql = "DELETE FROM community WHERE id = $postIdToDelete";
        $result = mysqli_query($conn, $sql);
    
        if ($result) {
            // Deletion successful
            $_SESSION['addPost'] = '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Post deleted successfully!!
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>';
            header('location: http://localhost/gym/user/community.php');
            exit();
        } else {
            // Deletion failed
            $_SESSION['failInfo'] = 'Failed to delete post.';
            header('location: http://localhost/gym/user/community.php');
            exit();
        }
    }
    
}
 else {
    echo '<div class="post">No posts available.</div>';
}
ob_flush();
?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>

</html>



