# Dictionary

* Rename the dbconn.php.template file to dbconn.php
* Edit the contents to replace the following variables with your mysql connection settings;

	####$conn = new mysqli('hostname', 'user', 'pass', 'database');
	
* Create a mysql database table named 'dictionary' with the following columns;

	####ID (int,unique,auto_increment)
	####Tagalog (varchar)
	####English (varchar)
