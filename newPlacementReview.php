<?php
	//session_start();
	//include 'include/connection.php';
	include('include/serverPlacementReviewSubmit.php');
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
				<div class="well" style="padding-bottom:0px;padding-top:0px;">
					<h3>New Placement Review</h3>
				</div>
				<div class="col-md-11">
					<div class="panel panel-info" style="margin-left:10%;">
						<div class="panel-body" style="margin-top:0px;">
							<div class="col-mod-8" >
								<div class="row " style="margin-left:0px;margin-right:0px;">
								    <div class="col-md-12 well">
										<form method="POST">
											<div class="form-group">
												<label>Topic </label>
												<input name="topic" class="form-control" type="text" placeholder="review topic" />
											</div>
                                            <div class="form-group">
												<label>Description </label>
												<textarea name="description" class="form-control" rows="15" placeholder="review in detail"></textarea>
											</div>
											<button type="submit" name="submit_placement_review" class="btn btn-info">POST </button>
										</form>
									</div>
								</div>
						    </div>
					    </div>
					</div>
                </div>
				<div class="col-md-2 col-sm-4 col-xs-12"></div>
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
