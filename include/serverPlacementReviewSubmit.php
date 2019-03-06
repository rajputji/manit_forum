<?php
include('connection.php');
session_start();
if (isset($_POST['submit_placement_review'])){
	// receive all input values from the form
	$review_title = mysqli_real_escape_string($db, $_POST['topic']);
	$review_description = mysqli_real_escape_string($db, $_POST['description']);
	date_default_timezone_set('Asia/Kolkata');
	$d=date('Y-m-d H:i:s');
  	$query = "INSERT INTO placement_review(Email, Review_Title, Description, Date) VALUES ('$_SESSION[email]','$review_title','$review_description','$d')";
  	if(mysqli_query($db, $query)){
				echo "<script type=\"text/javascript\">
     	alert('You have posted a new placement review!!!');
      </script>";
		header('location: placementReview.php');
		}
	else{
				echo "<script type=\"text/javascript\">
     	alert('Sorry, Your placement review was not posted!!!');
      </script>";
	}
  	//header('location: ../studentDashboard.php');
}
?>
