            <form role="form" action="profile.html">
                <div class="row" style="margin-left:10px;">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Name
                      </label>
                      <input class="form-control" style="width:300px" type="text"
                            name="Student_Name" id="Student_Name"
                             placeholder="" value="" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Scholar Number
                      </label>
                      <input class="form-control" style="width:300px" type="text"
                             placeholder="" value="" name="Scholar_No" id="Scholar_No" />
                    </div>
                  </div>
                </div>
                <div class="row" style="margin-left:10px;">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Branch
                      </label>
                      <input class="form-control" style="width:300px" type="text"
                             placeholder="" id="Branch" name="Branch"/>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Year of Study
                      </label>
                      <input class="form-control" style="width:300px" type="text"
                             placeholder="" name="year" value="" id="year"/>
                    </div>
                  </div>
                </div>
                <div class="row" style="margin-left:10px;">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Mobile Number
                      </label>
                      <input class="form-control" style="width:300px" type="text"
                             placeholder="" id="Mobile_No" name="Mobile_No" value="" />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Email Adrress
                      </label>
                      <input class="form-control" style="width:300px" type="email"
                             placeholder="" id="Email_ID" name="Email_ID" value="" />
                    </div>
                  </div>
                </div>
                <div class="row" style="margin-left:10px;">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Date Of Birth
                      </label>
                      <input class="form-control" style="width:300px" type="date"
                             placeholder="" id="DOB" name="DOB" value=""  />
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Address
                      </label>
                      <input class="form-control" style="width:300px" type="text"
                             placeholder="" name="Address" id="Address" value="" />
                    </div>
                  </div>
                </div>
                <div class="right-div">
                  <button type="submit" class="btn btn-info" >Update
                  </button>
                </div>
              </form>
              <script type="text/javascript">alert("loaded");</script>
    <script type="text/javascript">
         function loadData1()
         {
            document.getElementById('Student_Name').value=
            '<?php echo $row2['Student_Name']; ?>';
            document.getElementById('Scholar_No').value=
            '<?php echo $row2['Student_ID']; ?>';

                          <?php
                            $query = 
                            "SELECT * from branch WHERE Branch_ID='$row2[Branch_ID]'";
                            $res = $db->query($query);
                            $r = $res->fetch_assoc();
                            $b = $r['Branch_Name']; 
                          ?>

            document.getElementById('Branch').value='<?php echo $b; ?>';
            <?php
                          $y="";
                            $sem = $row2['Semester'];
                            if($sem == 1 || $sem==2)
                                $y = "First Year";
                            else if($sem==3 || $sem==4)
                                $y = "Second Year";
                            else if($sem==5 || $sem==6)
                                $y = "Third Year";
                            else
                                $y = "Fourth Year"; 
            ?>
            document.getElementById('year').value='<?php echo $y; ?>';

         };
    </script>             