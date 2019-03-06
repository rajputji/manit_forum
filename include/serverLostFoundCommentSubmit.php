<?php
include('connection.php');
session_start();

if (isset($_POST['comment_submit'])){
	// receive all input values from the form
	$lf_id = mysqli_real_escape_string($db, $_POST['lf_id']);
	$comment = mysqli_real_escape_string($db, $_POST['comment']);
	date_default_timezone_set('Asia/Kolkata');
	$d=date('Y-m-d H:i:s');
  	$query = "INSERT INTO lost_found_comment(Lost_Found_ID, Comment, Email, Date) VALUES ('$lf_id','$comment','$_SESSION[email]','$d')";
  	if(!mysqli_query($db, $query)){
				echo "<script type=\"text/javascript\">
     	alert('Sorry, Unable to comment!!!');
      </script>";
	}
  	//header('location: ../studentDashboard.php');
}
?>
