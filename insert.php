<?
include ("dbconn.php");
echo "<link rel=\"stylesheet\" type=\"text/css\" href=\"style.css\" />";

if ($_SERVER['REQUEST_METHOD'] != 'POST'){      
    $me = $_SERVER['PHP_SELF'];

include ("header.html");
?>

<tr>
  <td></td>
  <td></td>
  <td></td>
</tr>

<form name="form1" method="post"         action="<?php echo $me;?>">      
<table>
  <tr>            
    <td>Tagalog:</td>            
    <td colspan=3><input type="text" name="tagalog"></td>         
  </tr>         
  <tr>            
    <td>English:</td>            
    <td colspan=3><input type="text" name="english"></td>         
  </tr>         
  <tr>            
    <td>&nbsp;</td>            
    <td colspan=3><input type="submit" name="submit"               value="Submit"></td>         
  </tr>      
</table>	  

</form>	  


<?php   
} else {      
  error_reporting(0);      
  $tagalog = $_POST['tagalog'];      
  $english = $_POST['english'];            
  if ($tagalog != '') {	    
    $sql = "SELECT COUNT(tagalog) FROM dictionary WHERE tagalog = '$tagalog'";	    
    $result = $conn->query($sql);	    
    # Count the results	    
    while($row = $result->fetch_assoc()){	      
      $count = $row["COUNT(tagalog)"];	    
    }      
  } else if ($english != '') {      	
    $sql = "SELECT COUNT(english) FROM dictionary WHERE english = '$english'";      	
    $result = $conn->query($sql);     
    # Count the results	    
    while($row = $result->fetch_assoc()){	      
      $count = $row["COUNT(english)"];	    
    }      
  } else {      	
    $end = 1;      
  }             
  if ($end == 1) {      	
    echo ("No values have been entered (<a href='insert.php'>return</a>)");      
  } else if ($count == 0) {      	
    $sql = "INSERT INTO dictionary (tagalog,english) VALUES ('$tagalog','$english')";        
    $result = $conn->query($sql);     
    echo "Data submitted to database! <a href='insert.php'>return</a><br>        
    Tagalog Word: $tagalog<br>        
    English Word: $english<br>";      
  } else {              
    if ($tagalog != '') {	      
      $sql = "SELECT * FROM dictionary WHERE tagalog = '$tagalog'";        
    } else if ($english != '') {      	  
      $sql = "SELECT * FROM dictionary WHERE english = '$english'";        
    }	  		  	
    # Search for results in database	  	
    $result = $conn->query($sql);     
    # display results	  	
    echo "Already exists, click on edit to change  (<a href='insert.php'>return</a>)<br>";	  	
    echo ("<table class='reference'><tr><th>Tagalog</th><th>English</th><th>&nbsp;</th><th>&nbsp;</th></tr>");	  	
    while ($row = $result->fetch_assoc()) {	      
      $strID = $row["id"];	  	  
      $tagalog = $row["tagalog"];	  	  
      $english = $row["english"];	  	  
      echo ("<tr>");	  	  
      echo ("<td>$tagalog</td>\n");	  	  
      echo ("<td>$english</td>");	  	  
      echo ("<td><a href='update.php?id=$strID&tg=$tagalog&en=$english'>edit</a></td>\n");	  	  
      echo ("<td><a href='delete.php?strID=$strID'>delete</a></td>");	  	  
      echo ("</tr>");	  
    }	   	  
    echo ("</table>");	  
  }            
  # Close the database connection      
  $conn->close();   
}
?>
</CENTER>
</BODY>
</HTML>