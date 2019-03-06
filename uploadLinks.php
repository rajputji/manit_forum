<?php

require("include/connection.php");

$Link_Title = $_POST['linkTitle'];
$Link_Path = $_POST['addLink'];
$d = date("Y-m-d");

$sql = "INSERT INTO links(Link_Path, Link_Title, `Date`) VALUES ('$Link_Path', '$Link_Title', '$d')";

  if(!mysqli_query($db, $sql))
  {
    echo "query failed";
  }

  header("Location: admin.php?upload=success");

?>
