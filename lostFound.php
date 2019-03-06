﻿<?php
	//session_start();
	//include 'include/connection.php';
	include('include/serverLostFoundStatusChange.php');
	include 'headLinks.php';
	include 'header.php';
	if(!isset($_SESSION['logged_in']))
	{
		header("Location: index.php");
	}
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<body >
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
         <div class="container">
			<div class="row">
				<div class="col-md-10">
					<div class="panel panel-info">
					    <div class="panel-heading">
                            LOST/FOUND SECTION
						</div>
						<div class="panel-body">
							<div class="col-mod-8">
								<table class="table table-striped table-bordered">
								    <tbody>
                                        <?php
										$query="SELECT * from lost_found ORDER BY Lost_Found_ID DESC LIMIT 5";
										$result = $db->query($query);
										while($row=$result->fetch_assoc()){
											$query1="SELECT Student_Name from student WHERE Email_ID='$row[Email]'";
											$result1=$db->query($query1);
											$row1=$result1->fetch_assoc();
											date_default_timezone_set('Asia/Kolkata');
											$d1=date('Y-m-d H:i:s');
											$d0=$row['Date'];
											$dateStart = new DateTime($d0);
											$dateEnd   = new DateTime($d1);
											//$interval = date_diff($d1, $d0);
											$interval = $dateStart->diff($dateEnd);
											//$pdate=0;
											//if($interval->format('%Y')>0)
											echo "<tr>
                                            <td>
												<div class='row' style='margin-left:0px; width:100%;'>
													<div class='chat-widget-name-right' >
														<img class='media-object img-circle img-left-chat' src='assets/img/user2.png' />
													</div>
													<div class='header'>";
														$arr = explode(' ',trim($row1['Student_Name']));
														//echo $arr[0];
														if($row['Type']=="found"){
															echo "<strong class='primary-font'>".$arr[0]." posted about a found item</strong>";
														}
														else{
															echo "<strong class='primary-font'>".$arr[0]." posted about a lost item</strong>";
														}
															echo "<small class='pull-right text-muted'><span class='glyphicon glyphicon-time'></span>";
															if($interval->format('%Y')>0)
																echo " About ".$interval->format('%Y').' year ago';
															else if($interval->format('%m')>0)
																echo " About ".$interval->format('%m'). ' months ago';
															else if($interval->format('%d')>0)
																echo " About ".$interval->format('%d'). ' days ago';
															else if($interval->format('%h')>0)
																echo " About ".$interval->format('%h'). ' hours ago';
															else if($interval->format('%i')>0)
																echo " About ".$interval->format('%i'). ' mins ago';
															//12 mins ago
														echo "</small>
													</div>";
													echo "<a href='currentLostFound.php?lf=".$row['Lost_Found_ID']."'>
														<p>";
															echo $row['Lost_Found_Title'];
														echo "</p>
													</a>
												</div>
											</td>";
											if($row['Status']==1){
												echo "<td><button class='btn btn-warning'>Closed</button></td>";
											}
											else if($row['Status']==0 && $row['Email']==$_SESSION['email']){
												echo "<form method='POST'><input type='hidden' name='lf_id' value='".$row['Lost_Found_ID']."'>
												<td><button name='close' class='btn btn-warning'>Close This Thread</button></td></form>";
											}
											echo "</tr>";
										}
									?>
									</tbody>
								</table>
						    </div>
							<label><a href="allLostFound.php">See All</a></label>
					    </div>
					</div>
                </div>
				<a href="newLostFound.php">
					<button type="submit" class="btn btn-info right-div">POST ABOUT SOME LOST/FOUND ITEM</button>
				</a>
			</div>
			<br>
		</div>
	</div>
    <!-- CONTENT-WRAPPER SECTION END-->

    <?php include('footer.php'); ?>

    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js"></script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
