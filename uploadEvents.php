<?php

require("include/connection.php");

$Event_Title = $_POST['EventTitle'];
$d = date("Y-m-d");

$sql = "INSERT INTO upcoming_event(Event_Title, `Date`) VALUES ('$Event_Title', '$d')";
echo $sql;
  if(!mysqli_query($db, $sql))
  {
    echo "query failed";
  }

  header("Location: admin.php?upload=success");

?>
