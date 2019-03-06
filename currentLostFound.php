<?php
  include('include/serverLostFoundCommentSubmit.php');
  //session_start();
  //include 'headLinks.php';
  //include 'header.php';
  //include 'include/connection.php';
  if(!isset($_SESSION['logged_in']))
  {
    header("Location: index.php");
  }
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="description" content="" />
<meta name="author" content="" />
<!-- [if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->

    <title>MANIT DISCUSSION FORUM</title>
	<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap-glyphicons.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <!-- BOOTSTRAP CORE STYLE  -->
  <link href="assets/css/bootstrap.css" rel="stylesheet" />
  <!-- Upcoming Events Style -->
  <link href="assets/css/upcoming_events_marquee.css" rel="stylesheet" />
  <!-- FONT AWESOME STYLE  -->
  <link href="assets/css/font-awesome.css" rel="stylesheet" />
  <!-- CUSTOM STYLE  -->
  <link href="assets/css/style.css" rel="stylesheet" />
  <!-- GOOGLE FONT -->
  <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />



<style>
#myDIV {
width: 95%;

margin-left:5%;
text-align: left;
background-color: lightblue;

}
</style>


</head>
<body>
<div class="navbar navbar-inverse set-radius-zero" >
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="studentDashboard.php">

                <img src="assets/img/logo.png" />
            </a>

        </div>

  <div class="right-div">

            <a href='include/logout.php' class='btn btn-danger pull-right'>LOG ME OUT</a>
        </div>
  <div class="right-div">

          <a href="profile.html">
          <label>
            <?
              $query="SELECT * from student WHERE Email_ID='$_SESSION[email]'";
							$result=$db->query($query);
							$row=$result->fetch_assoc();
              $first = explode(' ',trim($row['Student_Name']));
              echo $first[0];
            ?>
          </label></a>
      </div>

<div class="chat-widget-name-right" >
            <a href="profile.html"><img class="media-object img-circle2 img-right-chat"
    style="margin-top:1%;margin-bottom:30px" src="assets/img/faces/face-3.jpg" /></a>
</div>
    </div>
</div>
<!-- LOGO HEADER END-->
<section class="menu-section">
    <div class="container" >
        <div class="row " >
            <div class="col-md-12" >
                <div class="navbar-collapse collapse " >
                    <ul id="menu-top" class="nav navbar-nav navbar-left">
                        <li><a href="studentDashboard.php" class="menu-top-active">HOME</a></li>


                        <li>
                              <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown">PLACEMENT  <span class="glyphicon glyphicon-chevron-down"></span> </a>
                              <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                  <li role="presentation"><a role="menuitem" tabindex="-1" href="placementStats.php">PLACEMENT STATISTICS</a></li>
                                  <li role="presentation"><a role="menuitem" tabindex="-1" href="placementReview.php">PLACEMENT REVIEW</a></li>
                              </ul>
                          </li>
          <li><a href="#">BUY & SELL</a></li>
                          <li><a href="lostFound.php">LOST & FOUND</a></li>
                          <li><a href="#">SUGGESTION BOX</a></li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</section>

<body>
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
        <div class="container">
			<div class="row">
				<div class="col-md-1 col-sm-4 col-xs-12" style="width:13%;">
					<div class="alert alert-info text-center">
						<img class="img-circle1" src="assets/img/faces/face-0.jpg" />
						<br>
						<h4></h4>
						<h4>USERNAME</h4>
						<h5>Full Name</h5>
						<h5>Scholar Number</h5>
						<h5>Branch</h5>
						<h5>Year</h5>
						<h5>Date of joining</h5>
					</div>
				</div>
				<div class="col-md-10" >
					<div class="panel">
						<div class="panel-heading" style="color:black;background:lightgray;"><h3>
							<?php
							$query="SELECT Lost_Found_Title, Description, Type, Status from lost_found where Lost_Found_ID='$_GET[lf]'";
							$result=$db->query($query);
							$row=$result->fetch_assoc();
							if($row['Type']=="lost"){
								echo "<strong>Lost Item Name: </strong>".$row['Lost_Found_Title']."<br>";
							}
							else{
								echo "<strong>Found Item Name: </strong>".$row['Lost_Found_Title']."<br>";
							}
						echo "</h3>
						</div>
						<div class='panel-body well'>
							<div class='col-mod-8 table-responsive'>
                                <div class='col-md-12' >
									<p><h4>".$row['Description']."
									</h4></p>
								</div>
								<br><br>";

								if($row['Status']==0){
									echo "<div style='padding-left:20%;'>
										<form role='form' method='POST'>
										<div class='col-md-10'>
											<textarea class='form-control' rows='2' name='comment'></textarea>
										</div>
										<input type='hidden' name='lf_id' value='".$_GET['lf']."'>
										<button type='submit' name='comment_submit' class='btn btn-info'>POST </button>
									</form></div>";
								}
								else echo "<strong><h3 style='color:red;'>This thread is closed. Sorry no further comments possible.</h3></strong>";
							?>

								<br><br>
								<div style="padding-left:10%;">
                                <table class="table table-striped table-bordered table-hover" >
								    <tbody>
										<?php
										$query1="SELECT * from lost_found_comment where Lost_Found_ID='$_GET[lf]' ORDER BY Comment_ID DESC";
										$result1 = $db->query($query1);
										while($row1=$result1->fetch_assoc()){
											$query2="SELECT Student_Name from student WHERE Email_ID='$row1[Email]'";
											$result2=$db->query($query2);
											$row2=$result2->fetch_assoc();
											date_default_timezone_set('Asia/Kolkata');
											$d1=date('Y-m-d H:i:s');
											$d0=$row1['Date'];
											$dateStart = new DateTime($d0);
											$dateEnd   = new DateTime($d1);
											$interval = $dateStart->diff($dateEnd);
											echo "<tr><td>
												<div class='row' style='margin-left:0px; width:100%;'>
													<div class='chat-widget-name-right' >
														<img class='media-object img-circle2 img-left-chat' src='assets/img/user2.png' />
													</div>
													<div class='header'>";
														$arr = explode(' ',trim($row2['Student_Name']));
														echo "<strong class='primary-font'>".$arr[0]." commented</strong>
														<small class='pull-right text-muted'>";
															echo "<span class='glyphicon glyphicon-time'></span>";
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
													echo "<p>".$row1['Comment']."</p>
												</div>
											</td>
											</tr>";
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
