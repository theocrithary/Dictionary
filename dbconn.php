<?php

$host = "0.0.0.0";
$db = "db_name";
$usr = "db_username";
$pwd = "db_password";

$conn = mysql_connect($host, $usr, $pwd);
mysql_select_db($db,$conn);
if (!$conn) { echo("ERROR: " . mysql_error() . "\n");	}

?>