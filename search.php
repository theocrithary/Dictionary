<?php

include ("dbconn.php");

//get the q parameter from URL
$q=$_GET["q"];

if (strlen($q)>0) {
	
$sql = "SELECT * FROM dictionary WHERE Tagalog LIKE '".$q."%' OR English LIKE '".$q."%' ";	
$result = $conn->query($sql);

}
	
if ($result->num_rows > 0) {	
  
	echo "<table class='reference'><tr><th>Tagalog</th><th>English</th></tr>";
  
	while($row = $result->fetch_assoc()) {  
		echo "<tr>"; 
		echo "<td>" . $row['Tagalog'] . "</td>";
		echo "<td>" . $row['English'] . "</td>";
		echo "</tr>";
	}
	
	echo "</table>";

} else {
    
    echo "0 results";

}

$conn->close();

?> 