<?php
	session_start();
	include('include/connection.php');
	include 'headLinks.php';
  include 'header.php';
  if(!isset($_SESSION['logged_in']))
  {
    header("Location: index.php");
  }
	$dept=$_GET['dept'];
	$year=$_GET['year'];
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<body>
    <!--<h1 data-toggle="tooltip" align=center>Maulana Azad National Institute of Technology.</h1>
    <h3 data-toggle="tooltip" title="hi" align=center></h3>-->
<div class="content-wrapper">
    <div class="container">
		<div class="row" >
			<div class="well" style="padding-bottom:0px;padding-top:0px;">
				<h3>Detail Placement Statistics - <?php echo $year; ?></h3>
			</div>
			<div class="panel-body" align="center" style="padding-top:0px;">
				<ul class="nav nav-tabs">
					<li class="active"><a href="#home" data-toggle="tab">Placement <?php echo $year; ?></a>
					</li>
				</ul>
	<div class="panel panel-default ">
	<div class="panel-body ">
	<div class="tab-content">
		<div class="tab-pane fade active in" id="home">
			<?php
				$D_query="SELECT Dept_Name FROM department WHERE Dept_ID='$dept'";
				$D_result = mysqli_query($db, $D_query);
				$D_row=mysqli_fetch_assoc($D_result);
				echo "<h4>Branch Wise Placement Stats for Department of ".$D_row['Dept_Name']."</h4>";
			?>
			<div class="col-md-12">
				<div class="panel-body">
					<div class="table-responsive" style="text-align:center;">
						<table class="table table-striped table-bordered table-hover">
							<thead >
								<tr >
									<th style="text-align:center;">Branch</th>
									<th style="text-align:center;">Eligible Candidates</th>
									<th style="text-align:center;">Placed</th>
									<th style="text-align:center;">%</th>
								</tr>
							</thead>
							<tbody>
									<?php
									//$data2017 = array(array("Department", "Total Placed Students"));
									$query="SELECT branch.Branch_ID, Branch_Name, Total_Students FROM branch, yearly_eligible_students WHERE
									    branch.Dept_ID='$dept' and branch.Branch_ID=yearly_eligible_students.Branch_ID and Year='$year'";
									$result = mysqli_query($db, $query);
									while($row=mysqli_fetch_assoc($result)){
										$query1="SELECT COUNT(Placed_ID) as Placed from placed where Year='$year' and Branch_ID='$row[Branch_ID]'";
										$result1=mysqli_query($db, $query1);
										$row1=mysqli_fetch_assoc($result1);
										echo "<tr><td>".$row['Branch_Name']."</td>";
										echo "<td>".$row['Total_Students']."</td>";
										echo "<td>".$row1['Placed']."</td>";
										echo "<td>".number_format($row1['Placed']*100/$row['Total_Students'], 2, '.', '')."</td></tr>";
										//$data2017 [] = [$row['Dept_Name'], (int)$row1['Placed']];
									}
												//echo json_encode($data);
									?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
		<div class="tab-pane fade active in" id="home">
			<h4>Placed Students Detail</h4>
			<div class="col-md-12">
				<div class="panel-body">
					<div class="table-responsive" style="text-align:center;">
						<table class="table table-striped table-bordered table-hover">
							<thead >
								<tr >
									<th style="text-align:center;">Student Name</th>
									<th style="text-align:center;">Branch Name</th>
									<th style="text-align:center;">Company Name</th>
								</tr>
							</thead>
							<tbody>
									<?php
									//$data2017 = array(array("Department", "Total Placed Students"));
									$query2="SELECT Branch_Name, Student_Name, Company_Name FROM branch, placed
											WHERE branch.Dept_ID='$dept' and branch.Branch_ID=placed.Branch_ID and Year='$year'";
									$result2 = mysqli_query($db, $query2);
									while($row2=mysqli_fetch_assoc($result2)){
										echo "<tr><td>".$row2['Student_Name']."</td>";
										echo "<td>".$row2['Branch_Name']."</td>";
										echo "<td>".$row2['Company_Name']."</td></tr>";
									}
									?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	</div>
    <!-- MENU SECTION END-->
	</div>
    </div>
	</div>
    </div>
    <!-- FOOTER SECTION END-->

    <?php include('footer.php'); ?>

    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
      <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
