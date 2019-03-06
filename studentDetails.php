            <h3>
              <?php
                $query="SELECT * from student WHERE Email_ID='$email'";
                $result=mysqli_query($db,$query);
                $row=mysqli_fetch_assoc($result);
                $first = explode(' ',trim($row['Student_Name']));
                echo $first[0];
              ?>
            </h3>
            <h6>
              <?php
                echo $row['Student_Name'];
              ?>
            </h6>
            <h5>Scholar Number : 
              <?php
                echo $row['Student_ID'];
              ?>
            </h5>
            <h5>Branch : 
              <?php
                $query = "SELECT * from branch WHERE Branch_ID='$row[Branch_ID]'";
                $res = $db->query($query);
                $r = $res->fetch_assoc();
                echo $r['Branch_Name']; 
              ?>
            </h5>
            <h5>
              <?php
                $sem = $row['Semester'];
                if($sem == 1 || $sem==2)
                    echo "First Year";
                else if($sem==3 || $sem==4)
                    echo "Second Year";
                else if($sem==5 || $sem==6)
                    echo "Third Year";
                else
                    echo "Fourth Year"; 
              ?>
            </h5>
