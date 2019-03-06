<div>
  <div class="navbar navbar-inverse set-radius-zero">
      <div class="container" style="width: 95%;">
          <div class="navbar-header">
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="Dashboard.php">
                  <img src="assets/img/logo.png" />
              </a>
          </div>
          <?php

                  echo "<div class='right-div'>

                  <a href='include/logout.php' class='btn btn-danger pull-right'>LOG ME OUT</a>";
                  echo "</div>";

          ?>
    <div class="right-div">
            <a href="profile.php"> <label>
            <?php

            if( isset($_SESSION['logged_in']))
            {
                  if( $_SESSION['user'] == "student")
                  {
                    $query="SELECT * from student WHERE Email_ID='$_SESSION[email]'";
      							$result=$db->query($query);
      							$row=$result->fetch_assoc();
                    $first = explode(' ',trim($row['Student_Name']));
                    echo $first[0];
                  }
                  else
                  {
                    $query="SELECT * from faculty WHERE Email_ID='$_SESSION[email]'";
                    $result=$db->query($query);
                    $row=$result->fetch_assoc();
                    $first = explode(' ',trim($row['Faculty_Name']));
                    echo $first[0];
                  }
              }
              else
              {
                header("Location: index.php");
              }
            ?>
              </label></a>
          </div>
    <div class="chat-widget-name-right" >
              <a href="profile.php">
              
              <?php
              $email = $_SESSION['email'];
              $sql = "SELECT * FROM profileImages WHERE email = '$email'";
              $result = mysqli_query($db,$sql);
              $row = mysqli_fetch_array($result);
              echo  '<img class="media-object img-circle2 img-right-chat"
                style="margin-top:1%;margin-bottom:30px" src="images/'.$row['image'].'"/>';
              ?>

              </a>
    </div>
      </div>
  </div>
  <!-- LOGO HEADER END-->
  <section class="menu-section" >
      <div class="container" >
          <div class="row" >
              <div class="col-md-12">
                  <div class="navbar-collapse collapse">
                      <ul id="menu-top" class="nav navbar-nav navbar-left">
                          <li><a href="Dashboard.php" class="menu-top-active">HOME</a></li>
                          <li>
                              <a href="#" class="dropdown-toggle" id="ddlmenuItem" data-toggle="dropdown">PLACEMENT  <span class="glyphicon glyphicon-chevron-down"></span> </a>
                              <ul class="dropdown-menu" role="menu" aria-labelledby="ddlmenuItem">
                                  <li role="presentation"><a role="menuitem" tabindex="-1" href="placementStats.php">PLACEMENT STATISTICS</a></li>
                                  <li role="presentation"><a role="menuitem" tabindex="-1" href="placementReview.php">PLACEMENT REVIEW</a></li>
                              </ul>
                          </li>
            <li><a href="#">BUY & SELL</a></li>
                          <li><a href="lostFound.php">LOST & FOUND</a></li>
                          <!-- <li><a href="#">SUGGESTION BOX</a></li> -->
                      </ul>
                  </div>
              </div>
          </div>
      </div>
  </section>
</div>
