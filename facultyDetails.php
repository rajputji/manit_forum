            <h3>
              <?php
                $query="SELECT * from faculty WHERE Email_ID='$email'";
                $result=mysqli_query($db,$query);
                $row=mysqli_fetch_assoc($result);
                $first = explode(' ',trim($row['Faculty_Name']));
                echo $first[0];
              ?>
            </h3>
            <h6>
              <?php
                echo $row['Faculty_Name'];
              ?>
            </h6>
            <h5>Designation : 
              <?php
                echo $row['Designation'];
              ?>
            </h5>
            <h5>Department : 
              <?php
                $query = "SELECT * from department WHERE Dept_ID='$row[Dept_ID]'";
                $res = mysqli_query($db,$query);
                $r = mysqli_fetch_assoc($res);
                echo $r['Dept_Name']; 
              ?>
            </h5>