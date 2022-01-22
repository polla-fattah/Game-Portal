<?php
//Database argument ...
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "";
$dbDatabase = "wego game";

//connet to the database

$db = mysql_connect("$dbHost", "$dbUser", "$dbPass") or die ("Error connecting to database.");
//Database selection ...
mysql_select_db("$dbDatabase", $db) or die ("Couldn't select the database.");
 //Query
$result=mysql_query("select * from server_table");
//Create Table AND Insert all data in ...
Print "<table border=0 width=421 height=56>";
 print "<tr>";
		print "<th height=18 width=126 align=left>";echo "Host Name";print"</th>";
		print"<th height=18 width=140 align=left>";echo "Owner";print"</th>";
		print"<th height=18 width=133 align=left>";echo "Port Number";print"</th>";
	print"</tr>";
while($row = mysql_fetch_array($result)){
 print "<tr>";
		print "<td height=18 width=126>";echo $row['host_name'];print"</td>";
		print"<td height=18 width=140>";echo $row['user_name'];print"</td>";
		print"<td height=18 width=133>";echo $row['port'];print"</td>";
	print"</tr>";

 }
 print "</table>";
?>
