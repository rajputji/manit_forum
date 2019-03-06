<?php
	include('include/serverStudentSignUp.php');
	include('include/header.php');
?>
<!DOCTYPE html>
<html lang="en-US">
<head>
	<title>Student Registration</title>

	<link rel="stylesheet" type="text/css" href="css/style.css">
	<!-- <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css"> new1.css is used-->
	<!-- <link rel="stylesheet" href="/resources/demos/style.css">  No Use-->
	<!-- <script src="https://code.jquery.com/jquery-1.12.4.js"></script> new2.js is used -->
	<!-- <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script> new3.js is used -->
	<link rel="stylesheet" href="css/new1.css">
	<script src="include/new2.js"></script>
	<script src="include/new3.js"></script>
	<script>
	   $( function() {
	   $( "#datepicker" ).datepicker();
		   } );
	</script>
	<script>
		function includeBranch(str) {
			var xmlhttp = new XMLHttpRequest();
			xmlhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					document.getElementById("txtHint").innerHTML = this.responseText;
				}
			};
			xmlhttp.open("GET", "include/branchFetch.php?q=" + str, true);
			xmlhttp.send();
		}
	</script>
	<style>
		select{
			height: 30px;
			width: 93%;
			padding: 5px 10px;
			font-size: 16px;
			border-radius: 5px;
			border: 1px solid gray;
		}
	</style>
</head>

<body>
	<div class="header">
       <h2>Student Registration</h2>
	</div>

	<form method="POST">
		<div class="input-group">
			<label>Scholar ID</label>
			<input type="text" name="scholarid" required pattern="^[1-9][0-9]{8}$" title="Nine digit scholar id is required and can't start with 0." >
		</div>
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" required pattern="^[a-zA-Z\s]+$" title="Only alphabetic characters are allowed." >
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password" required pattern=".{5,}" title="Five or more characters required." >
		</div>
		<div class="input-group">
			<label>Email ID</label>
			<input type="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Invalid Email." >
		</div>
		<div class="input-group">
			<label>Date of Birth(mm/dd/yyyy)</label>
			<input type="text" name="dob" id="datepicker" required >
		</div>


		<div class='input-group'>
		<label>Department</label>
		<select name='department' onchange='includeBranch(this.value)' required >
		<?php
			$dept_query= "SELECT Dept_ID, Dept_Name from department";
			$result = $db->query($dept_query);
			if($result->num_rows>0){
				echo "<option value=''>Select Department</option>";
				while($row=$result->fetch_assoc()){
					//echo "<option value=''>Record</option>";
					echo "<option value=".$row[Dept_ID].">".$row[Dept_Name]."</option>";
				}
			}
			else{
				echo "<option value=''>No Record Found</option>";
			}
		?>
		</select>
		</div>
		<div >
			<p id=txtHint></p>
		</div>

		<div class='input-group'>
		<label>Semester</label>
		<select name='semester' required >
		<?php
			echo "<option value=''>Select Semester</option>";
			for($val=1; $val<=10; ++$val){
				echo "<option value=".$val.">".$val."</option>";
			}
		?>
		</select>
		</div>

		<div class="input-group">
			<label>Mobile Number</label>
			<input type="text" name="mobile" required pattern="^[1-9][0-9]{9}$" title="Ten digit mobile number is required and can't start with 0." >
		</div>
		<div class="input-group">
			<button type="submit" class="btn" name="stsignup">SignUp
			<button style="margin-left:20px;" type="reset" class="btn"> Reset
		</div>
		<p>Already registered? <a href="index.php">Click here for login</p>
	</form>
</body>
</html>
