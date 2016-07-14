<?php 
include 'dbconn.php'; 

if ($_SERVER['REQUEST_METHOD'] != 'POST'){      
  $me = $_SERVER['PHP_SELF'];            
  $id=$_GET["id"];	  
  $tg=$_GET["tg"];	  
  $en=$_GET["en"];

include 'header.html';
?>

<tr>
  <td></td>
  <td></td>
  <td></td>
</tr>

<form name="form1" method="post" action="<?php echo $me;?>">      

<table>         
  <tr>
    <td>Tagalog:</td>            
    <td><input type="text" name="tagalog" value="<?=$tg?>"></td>
  </tr>         
  <tr>            
    <td>English:</td>            
    <td><input type="text" name="english" value="<?=$en?>"><input type="hidden" name="id" value="<?=$id?>"></td>
  </tr>         
  <tr>            
    <td>&nbsp;</td>            
    <td><input type="submit" name="submit" value="Submit"></td>         
  </tr>      
</table>	  

</form>      

<?php   } else {      
    error_reporting(0);      
    $id = $_POST['id'];      
    $tagalog = $_POST['tagalog'];      
    $english = $_POST['english'];      
    $dateFormat = 'Y-m-d H:i:s';	  
    $timeStamp = time();	  
    $dateTime= date($dateFormat,$timeStamp);	  
    $sql = "UPDATE dictionary SET tagalog = '$tagalog', english = '$english', timestamp = '$dateTime' WHERE id = $id ";         
    $result = $conn->query($sql);
    echo "Data submitted to database! <a href='insert.php'>return</a><br>      
    Tagalog Word: $tagalog<br>      
    English Word: $english<br>";	        

// Close the database connection      
$conn->close();
}
?>

</BODY>
</HTML>