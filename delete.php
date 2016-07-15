<?php
include 'dbconn.php'; 
$id=$_GET["strID"];	
echo "[$id]";
if ($id != '') {	
  $sql="DELETE FROM dictionary WHERE ID = '$id' ";	
  $result = $conn->query($sql); 	
  echo "Your selection was removed from the database  (<a href='insert.php'>return</a>)<br>";
}
$conn->close();
?>