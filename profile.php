<?php
include('include/connection.php');
session_start();
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
    <div class="content-wrapper">
        <div class="col-md-3 col-sm-4 col-xs-12" style="margin-left: 2%; height: 50%">
          <div class="alert alert-info text-center">
            <?php
              
              $email = $_SESSION['email'];

              $sql = "SELECT * FROM profileImages WHERE email = '$email'";
              $result = mysqli_query($db,$sql);
              $row = mysqli_fetch_array($result);
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
        <div class="col-md-9 col-sm-8 col-xs-12" style="margin-left: 1%;">
          <div class="panel panel-default " >
            <div class="panel-body " >
              <ul class="nav nav-tabs ">
                <li class="active">
                  <a href="#details" data-toggle="tab">Personal Details
                  </a>
                </li>
                <li class="">
                  <a href="#threads" data-toggle="tab">Threads
                  </a>
                </li>
                <li class="">
                  <a href="#comments" data-toggle="tab">Comments
                  </a>
                </li>
              </ul>
              <div class="tab-content" >
                <div class="tab-pane fade active in " id="details" >
                  <h4>Your Details
                  </h4>
                  <?php
                  $query2="SELECT * from student WHERE Email_ID='$_SESSION[email]'";
                  $result2=mysqli_query($db,$query2);

                  if(mysqli_num_rows($result2)==1)
                  {
                    $row2=mysqli_fetch_assoc($result2);

                    include 'studentDetails2.php';
                  }
                  else
                  {
                    $query2="SELECT * from faculty WHERE Email_ID='$_SESSION[email]'";
                    $result2=mysqli_query($db,$query2);
                    $row2=mysqli_fetch_assoc($result2);
                    
                    include 'facultyDetails2.php'; 
                  }
                  ?>
                  <div class="right-div">
                    <a href="EditProfile.php" class="btn btn-info pull-right">Edit Profile
                    </a>
                  </div>
                </div>
                <div class="tab-pane fade " id="threads">
                  <h4>Threads You Created
                  </h4>
                  <table class="table table-striped table-bordered">
                    <tbody>
                    <?php
                      $owner=array();
                      $query="SELECT * FROM threads WHERE Email='$_SESSION[email]' ORDER BY Thread_ID DESC";
                      $result = $db->query($query);
                      while($row=$result->fetch_assoc()){

                        date_default_timezone_set('Asia/Kolkata');
                        $d1=date('Y-m-d H:i:s');
                        $d0=$row['Date'];
                        $dateStart = new DateTime($d0);
                        $dateEnd   = new DateTime($d1);
                        $interval = $dateStart->diff($dateEnd);

                        $s = "SELECT * FROM profileImages WHERE email = '$_SESSION[email]'";
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
                              echo "<a href='currentThread.php?thread=".$row['Thread_ID']."'>

                              <strong class='primary-font'> ".$row['Thread_Title']."</strong>
                              </a>
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
                                else
                                  echo " just now";
                              echo "</small>
                            </div>";
                            echo "<p>";
                                echo substr($row['Description'],0,100).'....';
                            echo "</p>
                          </div>
                        </td>
                        </tr>";
                      }
                    ?>
                    </tbody>
                  </table>
                </div>
                <div class="tab-pane fade" id="comments">
                  <h4>Threads On Which You Commented
                  </h4>
                  <table class="table table-striped table-bordered">
                    <tbody>
                    <?php
                      $owner=array();
                      $query="SELECT *,threads.Email as em FROM threads INNER JOIN thread_comments ON thread_comments.Thread_ID=threads.Thread_ID WHERE thread_comments.Email='$_SESSION[email]' GROUP BY threads.Thread_ID ORDER BY threads.Thread_ID DESC";
                      $result = $db->query($query);
                      while($row=$result->fetch_assoc()){
                        date_default_timezone_set('Asia/Kolkata');
                        $d1=date('Y-m-d H:i:s');
                        $d0=$row['Date'];
                        $dateStart = new DateTime($d0);
                        $dateEnd   = new DateTime($d1);
                        $interval = $dateStart->diff($dateEnd);

                        $s = "SELECT * FROM profileImages WHERE email = '$row[em]'";
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
                              echo "<a href='currentThread.php?thread=".$row['Thread_ID']."'>

                              <strong class='primary-font'> ".$row['Thread_Title']."</strong>
                              </a>
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
                                else
                                  echo " just now";
                              echo "</small>
                            </div>";
                            echo "<p>";
                                echo substr($row['Description'],0,100).'....';
                            echo "</p>
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

    <?php include('footer.php'); ?>
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
