<!DOCTYPE html>
<!--	Author: BoramLamppa
		Date:	2/18/19
		File:	raises.php
		Purpose:MySQL Exercise
-->

<html>
<head>
	<title>MySQL Query</title>
	<link rel ="stylesheet" type="text/css" href="sample.css">
</head>

<body>
<?php

include ("db-connect.php");

$userQuery = "SELECT empID FROM personnel WHERE hourlyWage < 10"; // ADD THE QUERY

$result = mysqli_query($connect, $userQuery);

if (!$result) 
{
	die("Could not successfully run query ($userQuery) from $db: " .	
		mysqli_error($connect) );
}

if (mysqli_num_rows($result) == 0) 
{
	print("No records found with query $userQuery");
}
else 
{ 
	print("<h1>LIST OF EMPLOYEES WHO NEED A RAISE</h1>");

	while ($row = mysqli_fetch_assoc($result))
	{
		print (	"<p>Employee".$row['empID']." needs a raise!</p>");
	}

}

mysqli_close($connect);   // close the connection
 
?>

</body>
</html>
