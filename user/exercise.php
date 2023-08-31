<?php 

session_start();

if($_SESSION['user_id']==true){
	$user_id = $_SESSION['user_id'];
	}
	else{
		header('location: login.php');
	}
include 'components/navbar.php' ;
include ("includes/db.php");
include ("functions/functions.php");
?>


<div class="main_wrapper">

<div id="sidebar_ftitle">My Trainer</div>

<div id="right_content">
		<div id="products_box" >
		<?php
$sql = "SELECT * FROM assigntrainer WHERE user_id = '$user_id'";
$result = mysqli_query($con, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $id = $row['id'];
        $trainer_id = $row['trainer_id'];
        $user_id = $row['user_id'];
   
		$trainerSql = "SELECT * FROM trainer WHERE tran_id = '$trainer_id'";
		$result = mysqli_query($con, $trainerSql);
        if (mysqli_num_rows($result) > 0) {
			while ($row = mysqli_fetch_assoc($result)) {
				$tran_id = $row['tran_id'];
				$tran_name = $row['tran_name'];
				$tran_class = $row['tran_class'];
				$tran_contact = $row['tran_contact'];
			
				echo '
				<div class="card">
  <div class="card-header">
    '.$tran_name .'
  </div>
  <div class="card-body">
    <blockquote class="blockquote mb-0">
      <p><strong>Trainer class:  </strong>'.$tran_class.'</p>
	  <p><strong>Trainer contact Number:  </strong>'.$tran_contact.'</p>
    </blockquote>
  </div>
</div>


				
				';
			}
		}
        
    }
    
}
 else {
    echo '<div class="post">No trainer available.</div>';
}
ob_flush();
?>


		</div>
</div>
</div>
	
		
<div class="line"></div>


<div id="sidebar_title">Days</div>
		
		<div class="main_wrapper">

			<div id="left_sidebar">
				
					<ul id="days">
						<?php  
							getDays();
						?>
					</ul>
			</div>

			<div id="right_content">
					<div id="products_box" >
						<?php
							get_All_Exercises();
							get_Day_Exercises();
							get_Exer_Exercises();
						?>
					</div>
			</div>
		</div>
		
	


	
</body>

</html>
