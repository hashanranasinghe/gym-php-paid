<html>
<head>

</head>
<body>
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

$sql = "SELECT * FROM workout";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $user_id = $row['user_id'];
        $advice = $row['description'];
       
		$userSql = "SELECT * FROM user WHERE id = '$user_id'";
		$result = mysqli_query($con, $userSql);
        if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				$id = $row['id'];
				$username = $row['username'];
				$email = $row['email'];
				$phone_number = $row['phone_number'];




        echo '
        <form class="mx-1 mx-md-4" action="" method="GET">
            <div class="post">
                <div class="card">
                    <div class="card-header">'.$username.'
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0">
                            <p>' . ucfirst($advice) . '</p>
                        </blockquote>
                    </div>
                </div>
            </div>
        </form>';
            }}else{
                echo '<div class="post">No one asking advices.</div>';
            }
        
    }
    
}
 else {
    echo '<div class="post">No one asking advices.</div>';
}

?>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>
</html>