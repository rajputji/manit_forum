<?php
	echo "<div class='input-group'>";	
	echo "<label>Branch</label>";
	echo "<select name='branch' required >";
	include('connection.php');
	
	$dept=$_GET['q'];
	$branch_query= "SELECT Branch_ID, Branch_Name from branch where Dept_ID='$dept'";
	$result1 = $db->query($branch_query);
	if($result1->num_rows>0){
		echo "<option value=''>Select Branch</option>";
		while($row=$result1->fetch_assoc()){
			echo "<option value=".$row['Branch_ID'].">".$row['Branch_Name']."</option>";
		}
	}
	else{
		echo "<option value=''>No Record Found</option>";
	}
	echo "</select>";
	echo "</div>";				
?>	