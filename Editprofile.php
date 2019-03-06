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

<?php
  $msg = "";
  
  $email = $_SESSION['email'];

  if(isset($_POST['upload']))
  {
    if(isset($_FILES['image']))
    {
/*      $sql = "SELECT * FROM profileImages WHERE Email = '$email'";
      $result = mysqli_query($db,$sql);
      $row = mysqli_fetch_array($result);
      if($row['image']=="")
      {
*/
          $sql = "DELETE FROM profileImages WHERE Email = '$email'";
          $result = mysqli_query($db,$sql);
      //}
      $target = "images/".basename($_FILES['image']['name']);
      $image = $_FILES['image']['name'];
      $sql = "INSERT INTO profileImages (Email,image) VALUES ('$email','$image')";
      mysqli_query($db,$sql);

    if(move_uploaded_file($_FILES['image']['tmp_name'], $target))
    {
        $msg = "Profile Picture Changed Successfully.";
    }
    else
    {
        $msg = "Error in uploading image.";
    }
    }
  }
  echo $msg;
?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
  <body onload="loadData1()">
    <div class="content-wrapper">
        <div class="col-md-3 col-sm-4 col-xs-12" style="margin-left:2%; height: 50%;">
          <div class="alert alert-info text-center">
            <?php
              $email = $_SESSION['email'];
              $sql = "SELECT * FROM profileImages WHERE email = '$email'";
              $result = mysqli_query($db,$sql);
              $row = mysqli_fetch_array($result);
              echo '<img class="img-circle1" style="height: 50%; margin-bottom: 5%;" src="images/'.$row['image'].'"/>'
            ?>
            <br>

            <form method="post" action="Editprofile.php" enctype="multipart/form-data">
              <input type="hidden" name="size" value="1000000">
              <div>
                <input type="file" name="image">
              </div>
              <div class="input" style="margin: 5px auto;">
                <input class="btn btn-info" type="submit" name="upload" value="Change Profile Picture">
              </div>
           </form>
 
            <h4>
              <?php
                if($_SESSION['user']=="student")
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
        <div class="col-md-9 col-sm-8 col-xs-12" style="margin-left:1%;">
          <div class="panel panel-info" >
            <div class="panel-heading">
              EDIT PROFILE
            </div>
            <div class="panel-body">
              <?php
                  $query2="SELECT * from student WHERE Email_ID='$_SESSION[email]'";
                  $result2=mysqli_query($db,$query2);

                  if(mysqli_num_rows($result2)==1)
                  {
                    $row2=mysqli_fetch_assoc($result2);
                    include 'editProfileStudent.php';
                  }
                  else
                  {
                    $query2="SELECT * from faculty WHERE Email_ID='$_SESSION[email]'";
                    $result2=mysqli_query($db,$query2);
                    $row2=mysqli_fetch_assoc($result2);
                    include 'editProfileFaculty.php'; 
                }
              ?>
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
