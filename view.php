<?php

  require 'include/connection.php';
 ?>

<table width="80%" border="1">
    <tr>
    <td>File Name</td>
    <td>File Type</td>
    <td>File Size(KB)</td>
    <td>View</td>
    </tr>
    <?php

 $sql="SELECT * FROM notice";
 $result_set=mysqli_query($db, $sql);
 while($row=mysqli_fetch_assoc($result_set))
 {
  ?>
        <tr>
        <td><?php echo $row['Notice_ID'] ?></td>
        <td><?php echo $row['Notice_Title'] ?></td>
        <td><?php echo $row['Date'] ?></td>
        <td><a href="<?php echo $row['File_Path'] ?>" target="_blank">view file</a></td>
        </tr>
        <?php
 }
 ?>
</table>
