<?php
include('include/serverCommentSubmit.php');
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
    <!-- MENU SECTION END-->
    <div class="content-wrapper">
      <div class="col-md-3 col-sm-4 col-xs-12" style="margin-left: 2%; height: 50%">
        <div class="alert alert-info text-center">
          <?php
          $query="SELECT * from threads where Thread_ID='$_GET[thread]'";
          $result=mysqli_query($db,$query);
          $row=mysqli_fetch_assoc($result);
          $email = $row['Email'];
          $sql = "SELECT * FROM profileImages WHERE email = '$email'";
          $result = mysqli_query($db,$sql);
          $row = mysqli_fetch_assoc($result);
          echo '<img class="img-circle1" style="height: 50%; margin-bottom: 5%;" src="images/'.$row['image'].'"/>'
          ?>
          <br>
          <h4>
          </h4>
          <?php
          $query1="SELECT Student_Name from student WHERE Email_ID='$row[Email]'";
          $result1=mysqli_query($db,$query1);
          if(mysqli_num_rows($result1)==1)
          {
          include 'studentDetails.php';
          }
          else
          {
          include 'facultyDetails.php';                
          }
          ?>
        </div>
      </div>
      <div class="col-md-9 col-sm-8 col-xs-12">
        <div class="panel panel-info">
          <div class="panel-heading" style="color:black">
            <h4>
              <?php
              $query="SELECT Thread_Title, Description from threads where Thread_ID='$_GET[thread]'";
              $result=$db->query($query);
              $row=$result->fetch_assoc();
              echo "<h3><strong>Title:  </strong>".$row['Thread_Title']."</h3>
              <hr style='background-color:gray; height:5px;'>
              <strong>Description: </strong>".$row['Description'];
              ?>
            </h4>
          </div>
          <div class="panel-body">
            <div class="col-md-12 table-responsive">
              <form role="form" method="POST">
                <div class="col-md-10">
                  <textarea class="form-control" rows="2" name="comment" required></textarea>
                </div>
                <input type="hidden" name="thread_id" value="<?php echo $_GET['thread']; ?>">
                <button type="submit" name="comment_submit" class="btn btn-info">
                  POST 
                </button>
              </form>
            </div>
            <br>
            <br>
            <table class="table table-striped table-bordered table-hover" >
              <tbody>
                <?php
                $query1="SELECT * from thread_comments where Thread_ID='$_GET[thread]' ORDER BY Comment_ID DESC";
                $result1 = mysqli_query($db,$query1);

                $name = "";

                while($row1=mysqli_fetch_assoc($result1)){
                  $query2="SELECT Student_Name from student WHERE Email_ID='$row1[Email]'";
                  $result2=mysqli_query($db,$query2);
                  $row2=mysqli_fetch_assoc($result2);
                  $arr = explode(' ',trim($row2['Student_Name']));
                  $name = $arr[0];

                  if(mysqli_num_rows($result2) == 0){
                  $query2="SELECT Faculty_Name from faculty WHERE Email_ID='$row1[Email]'";
                  $result2=mysqli_query($db,$query2);
                  $row2=mysqli_fetch_assoc($result2);
                  $arr = explode(' ',trim($row2['Faculty_Name']));
                  $name = $arr[0];
                  }

                  date_default_timezone_set('Asia/Kolkata');
                  $d1=date('Y-m-d H:i:s');
                  $d0=$row1['Date'];
                  $dateStart = new DateTime($d0);
                  $dateEnd   = new DateTime($d1);
                  $interval = $dateStart->diff($dateEnd);


                  $email = $row1['Email'];
                  $q = "SELECT * FROM profileImages WHERE email = '$email'";
                  $res = mysqli_query($db,$q);
                  $r = mysqli_fetch_assoc($res);

                  echo "<tr><td>
                  <div class='row' style='margin-left:0px; width:100%;'>
                  <div class='chat-widget-name-right' >
                  <img class='media-object img-circle2 img-left-chat' src='images/".$r['image']." '/>
                  </div>
                  <div class='header'>";
                  echo "<strong class='primary-font'>".$name." commented</strong>
                  <small class='pull-right text-muted'>";
                  echo "<span class='glyphicon glyphicon-time'> </span>";
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
                  else
                  echo " just now";
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
    <!-- CONTENT-WRAPPER SECTION END-->
    <?php include('footer.php'); ?>
    <!-- FOOTER SECTION END-->
    <!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
    <!-- CORE JQUERY  -->
    <script src="assets/js/jquery-1.10.2.js">
    </script>
    <!-- BOOTSTRAP SCRIPTS  -->
    <script src="assets/js/bootstrap.js">
    </script>
    <!-- CUSTOM SCRIPTS  -->
    <script src="assets/js/custom.js">
    </script>
  </body>
</html>
