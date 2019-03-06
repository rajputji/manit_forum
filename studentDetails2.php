                  <table class="table table-hover">
                    <tbody>
                      <tr>
                        <td>
                          <b>Name
                          </b>
                        </td>
                        <td>
                          <b>:
                          </b>
                        </td>
                        <td>
                          <?php echo $row2['Student_Name']; ?>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <b>Scholar Number
                          </b>
                        </td>
                        <td>
                          <b>:
                          </b>
                        </td>
                        <td>
                          <?php echo $row2['Student_ID']; ?>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <b>Branch
                          </b>
                        </td>
                        <td>
                          <b>:
                          </b>
                        </td>
                        <td>
                          <?php
                            $query = 
                            "SELECT * from branch WHERE Branch_ID='$row2[Branch_ID]'";
                            $res = $db->query($query);
                            $r = $res->fetch_assoc();
                            echo $r['Branch_Name']; 
                          ?>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <b>Year
                          </b>
                        </td>
                        <td>
                          <b>:
                          </b>
                        </td>
                        <td>
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
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <b>Mobile Number
                          </b>
                        </td>
                        <td>
                          <b>:
                          </b>
                        </td>
                        <td>
                           <?php echo $row2['Mobile_No']; ?>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <b>Email Address
                          </b>
                        </td>
                        <td>
                          <b>:
                          </b>
                        </td>
                        <td>
                           <?php echo $row2['Email_ID']; ?>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <b>Date Of Birth
                          </b>
                        </td>
                        <td>
                          <b>:
                          </b>
                        </td>
                        <td>
                           <?php echo $row2['DOB']; ?>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <b>Address
                          </b>
                        </td>
                        <td>
                          <b>:
                          </b>
                        </td>
                        <td>
                           <?php echo $row2['Address']; ?>
                        </td>
                      </tr>
                    </tbody>
                  </table>