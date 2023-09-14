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
    <div id="products_box" class="row">
        <?php
        $sql = "SELECT * FROM assigntrainer WHERE user_id = '$user_id'";
        $result_outer = mysqli_query($con, $sql);

        if (mysqli_num_rows($result_outer) > 0) {
            while ($row = mysqli_fetch_assoc($result_outer)) {
                $id = $row['id'];
                $trainer_id = $row['trainer_id'];
                $user_id = $row['user_id'];

                $trainerSql = "SELECT * FROM trainer WHERE tran_id = '$trainer_id'";
                $result_inner = mysqli_query($con, $trainerSql);
                if (mysqli_num_rows($result_inner) > 0) {
                    while ($innerRow = mysqli_fetch_assoc($result_inner)) {
                        $tran_id = $innerRow['tran_id'];
                        $tran_name = $innerRow['tran_name'];
                        $tran_class = $innerRow['tran_class'];
                        $tran_contact = $innerRow['tran_contact'];

                        echo '
                        <div class="col-sm-6">
                            <div class="card">
                                <div class="card-header">
                                    <h5 class="card-title">' . $tran_name . '</h5>
                                </div>
                                <div class="card-body">
                                    <p class="card-text"><strong>Trainer class:  </strong>' . $tran_class . '</p>
                                    <p class="card-text"><strong>Trainer contact Number:  </strong>' . $tran_contact . '</p>
                                </div>
                            </div>
                        </div>';
                    }
                }
            }
        } else {
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
		<div class="list-group">
						<?php  
							getDays();
						?>
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
		
	<br/>
	<br/>
</body>
</html>
