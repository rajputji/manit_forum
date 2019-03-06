<?php
include('connection.php');
session_start();
if (isset($_POST['close'])){
	// receive all input values from the form
	$lost_found_id = mysqli_real_escape_string($db, $_POST['lf_id']);
	//$review_description = mysqli_real_escape_string($db, $_POST['description']);
	//date_default_timezone_set('Asia/Kolkata');
	//$d=date('Y-m-d H:i:s');
  	$query = "UPDATE lost_found SET Status=1 WHERE Lost_Found_ID='$lost_found_id'";
  	if(!mysqli_query($db, $query)){
				echo "<script type=\"text/javascript\">
     	alert('Sorry, Something is going wrong!!!');
      </script>";
	}
  	//header('location: ../studentDashboard.php');
}
?>
