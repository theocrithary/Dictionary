<?php
include ("header.html");
include ("dbconn.php");	
?>

</table>
<?php

# setup SQL statement	
$sql = <<<SQL
    SELECT *
    FROM dictionary
    ORDER BY Tagalog
SQL;

# execute SQL statement
if(!$result = $conn->query($sql)){
    die('There was an error running the query [' . $conn->error . ']');
}

if ($result->num_rows > 0) {

    # display results		
    echo ("<table class='reference'><tr><th>Tagalog</th><th>English</th><th>&nbsp;</th></tr>");		

    while($row = $result->fetch_assoc()) {			
        $tagalog = $row["Tagalog"];			
        $english = $row["English"];
        $strID = $row["ID"];			
        echo ("<tr>");			
        echo ("<td>$tagalog</td>\n");			
        echo ("<td>$english</td>\n");		
        echo ("<td><a href='update.php?id=$strID&tg=$tagalog&en=$english'>edit</a></td>\n");	  	  
        //echo ("<td><a href='delete.php?strID=$strID'>delete</a></td>");
        echo ("</tr>");		
    }		
    
    echo ("</table>");

} else {
    echo "0 results";
}

// Close the database connection
$conn->close();

?>
</center>
</body>
</html>