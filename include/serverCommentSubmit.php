<?php
include('connection.php');
session_start();

if (isset($_POST['comment_submit'])){
	// receive all input values from the form
	$thread_id = mysqli_real_escape_string($db, $_POST['thread_id']);
	$comment = mysqli_real_escape_string($db, $_POST['comment']);
	date_default_timezone_set('Asia/Kolkata');
	$d=date('Y-m-d H:i:s');

/*Checking for spam*/
	system('python spam_check.py '.$comment.' 2>&1 > ret.txt');
	$myfile = fopen("ret.txt", "r") or die("Unable to perform Spam Check!");
	$ret = fgets($myfile);
	if(strlen($ret)==6)
	{
		echo "<script type=\"text/javascript\">
     	alert('Spam Detected!!!');
      </script>";
		fclose($myfile);
		return;
	}
	fclose($myfile);
/*Checking for spam*/

  	$query = "INSERT INTO thread_comments(Thread_ID, Email, Comment, Date) VALUES ('$thread_id','$_SESSION[email]','$comment','$d')";
		if(!mysqli_query($db,$query)){
				echo "<script type=\"text/javascript\">
     	alert('Sorry, Unable to comment on this thread!!!');
      </script>";
	}
  	//header('location: ../studentDashboard.php');
}
?>
