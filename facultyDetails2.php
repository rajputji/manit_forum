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
                          <?php echo $row2['Faculty_Name']; ?>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <b>Designation
                          </b>
                        </td>
                        <td>
                          <b>:
                          </b>
                        </td>
                        <td>
                         <?php echo $row2['Designation']; ?>
                        </td>
                      </tr>
                      <tr>
                        <td>
                          <b>Department
                          </b>
                        </td>
                        <td>
                          <b>:
                          </b>
                        </td>
                        <td>
                           <?php
                            $query = "SELECT * from department WHERE Dept_ID='$row2[Dept_ID]'";
                            $res = mysqli_query($db,$query);
                            $r = mysqli_fetch_assoc($res);
                            echo $r['Dept_Name']; 
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