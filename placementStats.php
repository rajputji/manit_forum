<?php
	session_start();
	include('include/connection.php');
	include 'headLinks.php';
  include 'header.php';
  if(!isset($_SESSION['logged_in']))
  {
    header("Location: index.php");
  }
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
					<h3>Placement Statistics</h3>
				</div>
				<div class="panel-body" align="center" style="padding-top:0px;">
					<ul class="nav nav-tabs">
						<li class="active"><a href="#home" data-toggle="tab">Placement 2017</a></li>
						<li class=""><a href="#profile" data-toggle="tab">Placement 2016</a></li>
					</ul>
					<div class="panel panel-default ">
						<div class="panel-body ">
							<div class="tab-content">
								<div class="tab-pane fade active in" id="home">
									<h4>Placement Stats 2017</h4>
									<div class="col-md-12">
										<div class="panel-body">
											<div class="table-responsive" style="text-align:center;">
												<table class="table table-striped table-bordered table-hover">
													<thead >
														<tr >
															<th style="text-align:center;">Department</th>
															<th style="text-align:center;">Eligible Candidates</th>
															<th style="text-align:center;">Placed</th>
															<th style="text-align:center;">%</th>
														</tr>
													</thead>
													<tbody>
														<?php
														$data2017 = array(array("Department", "Total Placed Students"));
														$query="SELECT department.Dept_ID, department.Dept_Name, SUM(Total_Students) as Eligible FROM department, branch, yearly_eligible_students WHERE
														department.Dept_ID=branch.Dept_ID AND branch.Branch_ID=yearly_eligible_students.Branch_ID AND Year='2017' GROUP BY department.Dept_ID";
														$result = mysqli_query($db, $query);
														while($row=mysqli_fetch_assoc($result)){
														$query1="SELECT COUNT(Placed_ID) as Placed from placed where placed.Year='2017' and placed.Branch_ID in
														(SELECT branch.Branch_ID from branch where branch.Dept_ID='$row[Dept_ID]')";
														$result1=mysqli_query($db, $query1);
														$row1=mysqli_fetch_assoc($result1);
														echo "<tr><td><a target='_blank' href='detailPlacementStats.php?dept=".$row['Dept_ID']."&year=2017'>".$row['Dept_Name']."</a></td>";
														echo "<td>".$row['Eligible']."</td>";
														echo "<td>".$row1['Placed']."</td>";
														echo "<td>".number_format($row1['Placed']*100/$row['Eligible'], 2, '.', '')."</td></tr>";
														$data2017 [] = [$row['Dept_Name'], (int)$row1['Placed']];
														}
														//echo json_encode($data);
														?>
													</tbody>
												</table>
											</div>
										</div>
										<div class="row" id="txt2017" style="margin-left:0px;">
											<div class="col-md-5">
												<div id="container" style="height: 500px; width: 6000px; margin: 0 auto; ">
												</div>
												<script type="text/javascript" src="javascript/loader.js"></script>
												<script type="text/javascript">
												google.charts.load('current', {'packages':['corechart']});
												google.charts.setOnLoadCallback(drawChart);
												function drawChart(){
												var data = google.visualization.arrayToDataTable(<?php echo json_encode($data2017); ?>);
												var options = { title: 'Placement Statistics of 2017', is3D: true, };
												var chart = new google.visualization.PieChart(document.getElementById('txt2017'));
												chart.draw(data, options);
												}
												</script>
											</div>
										</div>
									</div>
								</div>

								<div class="tab-pane fade active in" id="profile">
									<h4>Placement Stats 2016</h4>
									<div class="col-md-12">
										<div class="panel-body">
											<div class="table-responsive" style="text-align:center;">
												<table class="table table-striped table-bordered table-hover">
													<thead>
														<tr>
															<th style="text-align:center;">Department</th>
															<th style="text-align:center;">Eligible Candidates</th>
															<th style="text-align:center;">Placed</th>
															<th style="text-align:center;">%</th>
														</tr>
													</thead>
													<tbody>
														<?php
														$data2016 = array(array("Department", "Total Placed Students"));
														$query="SELECT department.Dept_ID, department.Dept_Name, SUM(Total_Students) as Eligible FROM department, branch, yearly_eligible_students WHERE
														department.Dept_ID=branch.Dept_ID AND branch.Branch_ID=yearly_eligible_students.Branch_ID AND Year='2016' GROUP BY department.Dept_ID";
														$result = mysqli_query($db, $query);
														while($row=mysqli_fetch_assoc($result)){
														$query1="SELECT COUNT(Placed_ID) as Placed from placed where placed.Year='2016' and placed.Branch_ID in
														(SELECT branch.Branch_ID from branch where branch.Dept_ID='$row[Dept_ID]')";
														$result1=mysqli_query($db, $query1);
														$row1=mysqli_fetch_assoc($result1);
														echo "<tr><td><a target='_blank' href='detailPlacementStats.php?dept=".$row['Dept_ID']."&year=2016'>".$row['Dept_Name']."</a></td>";
														echo "<td>".$row['Eligible']."</td>";
														echo "<td>".$row1['Placed']."</td>";
														echo "<td>".number_format($row1['Placed']*100/$row['Eligible'], 2, '.', '')."</td></tr>";
														$data2016 [] = [$row['Dept_Name'], (int)$row1['Placed']];
														}
														?>
													</tbody>
												</table>
											</div>
										</div>
										<div class="row" id="txt2016" style="margin-left:0px;">
											<div class="col-md-5">
												<div id="container" style="height: 500px; width: 6000px; margin: 0 auto; ">
												</div>
												<script type="text/javascript" src="javascript/loader.js"></script>
												<script type="text/javascript">
												google.charts.load('current', {'packages':['corechart']});
												google.charts.setOnLoadCallback(drawChart);
												function drawChart(){
													var data = google.visualization.arrayToDataTable(<?php echo json_encode($data2016);?>);
													var options = { title: 'Placement Statistics of 2016', is3D: true, };
													var chart = new google.visualization.PieChart(document.getElementById('txt2016'));
													chart.draw(data, options);
												}
												</script>
											</div>
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
