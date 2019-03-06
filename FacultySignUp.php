<?php include('include/serverFacultySignUp.php');
			include('include/header.php');
?>

<!DOCTYPE html>
<html lang="en-US">
<head>
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
	<title>Faculty Registration</title>
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>

<body>
	<div class="header">
       <h2>Faculty Registration</h2>
	</div>

	<form method="POST">
		<div class="input-group">
			<label>Designation</label>
			<select name="desig" required>
				<option value="">Select Designation</option>
				<option value="Professor">Professor</option>
				<option value="Associate Professor">Associate Professor</option>
				<option value="Assistant Professor">Assistant Professor</option>
			</select>
		</div>
		<div class="input-group">
			<label>Name</label>
			<input type="text" name="name" required pattern="^[a-zA-Z\s]+$" title="Only alphabetic characters are allowed.">
		</div>
		<div class="input-group">
			<label>Faculty ID</label>
			<input type="text" name="facultyid" required>
		</div>
		<div class="input-group">
			<label>Password</label>
			<input type="password" name="password" required pattern=".{5,}" title="Five or more characters required.">
		</div>
		<div class="input-group">
			<label>Email ID</label>
			<input type="email" name="email" required pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,3}$" title="Invalid Email.">
		</div>
		<?php
		echo "<div class='input-group'>";
		echo "<label>Department</label>";
		echo "<select name='department' required>";
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
		echo "</select>";
		echo "</div>";
		?>

		<div class="input-group">
			<label>Mobile Number</label>
			<input type="text" name="mobile" required pattern="^[1-9][0-9]{9}$" title="Ten digit mobile number is required and can't start with 0.">
		</div>
		<div class="input-group">
			<button type="submit" name="fsignup" class="btn">SignUp
			<button style="margin-left:20px;" type="reset" class="btn">Reset
		</div>
		<p>Already registered? <a href="index.php">Click here for login</p>
	</form>
</body>
</html>
