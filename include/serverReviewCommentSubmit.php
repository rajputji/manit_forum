<?php
include('connection.php');
session_start();

if (isset($_POST['comment_submit'])){
	// receive all input values from the form
	$review_id = mysqli_real_escape_string($db, $_POST['review_id']);
	$comment = mysqli_real_escape_string($db, $_POST['comment']);
	date_default_timezone_set('Asia/Kolkata');
	$d=date('Y-m-d H:i:s');
  	$query = "INSERT INTO placement_review_comment(Placement_Review_ID, Email, Comment, Date) VALUES ('$review_id','$_SESSION[email]','$comment','$d')";
  	if(mysqli_query($db, $query)){
				echo "<script type=\"text/javascript\">
     	alert('You commented on this placement review!!!');
      </script>";

		}
	else{
				echo "<script type=\"text/javascript\">
     	alert('Sorry, Unable to comment on this placement review!!!');
      </script>";
	}
  	//header('location: ../studentDashboard.php');
}
?>