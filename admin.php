<?php
  require 'include/connection.php';
  include 'headLinks.php';

  /*if(!isset($_SESSION['admin_logged_in']))
  {
    header("Location: adminLogin.php");
  }*/
?>
<!DOCTYPE html>
<html>
<body>
<div class="navbar navbar-inverse set-radius-zero" >
      <div class="container">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="admin.php">
                  <img src="assets/img/logo.png" />
              </a>
          </div>
          <?php

                  echo "<div class='right-div'>

                  <a href='include/adminLogout.php' class='btn btn-danger pull-right'>LOG ME OUT</a>";
                  echo "</div>";

          ?>
    <div class="right-div">
            <label> Admin</label>
          </div>
    <div class="chat-widget-name-right" >
              <img class="media-object img-circle2 img-right-chat"
      style="margin-top:1%;margin-bottom:30px" src="assets/img/faces/face-3.jpg" />
    </div>
      </div>
  </div><br><br>
<div>

<div style="float:left; margin-left:10%;">
  <h3>  Notices Upload </h3>
  <form action="upload.php" method="post" enctype="multipart/form-data">
    Give Title:
    <input type="text" name="noticeTitle" id="noticeTitle">
    <br>
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <br>
    <input type="submit" value="Upload Image" name="submit">
  </form>
 </div>

 <div style="float:left; margin-left:10%;">
   <h3> Links Upload </h3>
   <form action="uploadLinks.php" method="post">
    Give Title:
    <input type="text" name="linkTitle" id="linkTitle">
    <br>
    Enter link:
    <input type="Text" name="addLink" id="addLink">
    <br>
    <input type="submit" value="Submit" name="submit">
  </form>
 </div>

 <div style="float:left; margin-left:10%">
  <h3> Upcoming Events Update </h3>
  <form action="uploadEvents.php" method="post">
    Enter Event:
    <input type="text" name="EventTitle" id="eventTitle">
    <br>
    <input type="submit" value="Submit" name="submit">
  </form>
 </div>
</div>
</body>
</html>
