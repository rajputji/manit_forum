<?php

include('include/serverThreadSubmit.php');
include 'headLinks.php';
include 'fheader.php';

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
				<div class="col-md-2">
					<div class="panel panel-success">
					    <div class="panel-heading">Notice</div>
						<div class="panel-body">
							<div class="col-mod-4">
							    <table class="table">
                                    <tbody>
                                      <?php
                                        $sql = "SELECT * FROM notice ORDER BY Notice_ID desc LIMIT 5;";

                                        $result = mysqli_query($db, $sql);
                                        if (mysqli_num_rows($result) > 0)
                                        {
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                          echo "<tr>
                                              <td><a href='".$row['Notice_Path']."' target='_blank'>".$row['Notice_Title']."</a></td>
                                          </tr>";
                                        }
                                    	}
                                      ?>
                                    </tbody>
                                </table>
							</div>
							<label><a href="allNotices.php">See More</a></label>
						</div>
                    </div>
					<div class="panel panel-warning">
						<div class="panel-heading">Links</div>
						<div class="panel-body">
							<div class="col-mod-4">
							    <table class="table">
                                    <tbody>

                                      <?php
                                        $sql = "SELECT * FROM links ORDER BY Link_ID desc LIMIT 5;";
                                        $result = mysqli_query($db, $sql);
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                                  echo "<tr>
                                                      <td><a href='".$row['Link_Path']."' target='_blank'>".$row['Link_Title']."</a></td>
                                                  </tr>";
                                        }
                                      ?>                                    </tbody>
                                </table>
							</div>
							<label><a href="allLinks.php">See More</a></label>
						</div>
					</div>
				</div>
			    <div class="col-md-8">
					<div class="panel panel-info">
						<div class="panel-heading">Create New Thread</div>
                        <div class="panel-body">
							<div class="col-mod-5" >
								<form role="form" method="POST">
									<div class="form-group">
										<label>About</label>
										<input class="form-control" type="text" name="thread" placeholder="enter new thread" />
                                    </div>
									<div class="form-group">
										<label>Description</label>
										<textarea class="form-control" rows="2" name="thread_description" placeholder="give some description about thread"></textarea>
									</div>
									<button type="submit" name="thread_submit" class="btn btn-info">POST </button>
								</form>
							</div>
						</div>
					</div>
				    <div class="panel panel-info">
					    <div class="panel-heading">Recent Thread Links</div>
						<div class="panel-body">
						    <div class="col-mod-8">
								<table class="table table-striped table-bordered">
                                    <tbody>
									<?php
										$query="SELECT * from threads ORDER BY Thread_ID DESC LIMIT 5";
										$result = $db->query($query);
										while($row=$result->fetch_assoc()){
											$query1="SELECT Faculty_Name from faculty WHERE Email_ID='$row[Email]'";
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
              $email = $row['Email'];
              $s = "SELECT * FROM profileImages WHERE email = '$email'";
              $res = mysqli_query($db,$s);
              $r = mysqli_fetch_assoc($res);


											echo "<tr>
                                            <td>
												<div class='row' style='margin-left:0px; width:100%;'>
													<div class='chat-widget-name-right' >
														<img class='media-object img-circle img-left-chat' src='images/";
														echo $r['image'];
														echo "'/>
													</div>
													<div class='header'>";
														$arr = explode(' ',trim($row1['Student_Name']));
														//echo $arr[0];
														echo "<strong class='primary-font'>".$arr[0]." posted</strong>
														<small class='pull-right text-muted'>";
															echo "<span class='glyphicon glyphicon-time'></span>";
															if($interval->format('%Y')>0)
																echo "About ".$interval->format('%Y').' year ago';
															else if($interval->format('%m')>0)
																echo "About ".$interval->format('%m'). ' months ago';
															else if($interval->format('%d')>0)
																echo "About ".$interval->format('%d'). ' days ago';
															else if($interval->format('%h')>0)
																echo "About ".$interval->format('%h'). ' hours ago';
															else if($interval->format('%i')>0)
																echo "About ".$interval->format('%i'). ' mins ago';
															else
																echo " just now";
															//12 mins ago
														echo "</small>
													</div>";
													echo "<a href='currentThread.php?thread=".$row['Thread_ID']."'>
														<p>";
															echo $row['Thread_Title'];
														echo "</p>
													</a>
												</div>
											</td>
											</tr>";
										}
									?>
									</tbody>
								</table>
						    </div>
							<label><a href="allThreads.php">See All</a></label>
					    </div>
					</div>
				</div>
				<div class="col-md-2 col-sm-4 col-xs-12">
					<div class="panel panel-default">
					    <div class="panel-heading">
							Upcoming Events
						</div>
						<div class="panel-body">
						    <div class="col-mod-4">

                  <script >
                                  $(function () {
                                    $('.marquee').marquee({

                                    });
                                  });
                                  </script>

                  <!--                     -->

                  <div class="marquee ver" data-direction='up' data-duration='6000' data-pauseOnHover="true">

                                    <div style="height:100px; width:205x;">
                                      <?php
                                        $sql = "SELECT * FROM upcoming_event ORDER BY Event_ID desc;";
                                        $result = mysqli_query($db, $sql);
                                        while($row = mysqli_fetch_assoc($result))
                                        {
                                                  echo "<div><b>".$row['Date'].":</b>&nbsp;".$row['Event_Title']."<hr></div>";
                                        }
                                      ?>
                                    </div>
                                  </div>
						                     </div>
                    </div>
                </div>
			</div>
			<br>
		</div>
	</div>
    <!-- CONTENT-WRAPPER SECTION END-->

    <?php include('footer.php'); ?>

    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- Upcoming Events JQUERY  -->
    <script src="assets/js/upcoming_events_marquee.js"></script>    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js"></script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js"></script>
</body>
</html>
