<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" /><title>WEGO Counter-stike</title>

</head>

<body>
<div id="container">
<div id="header"></div>
<div id="menu">
<ul>
<li><a href="index.php">HOME</a></a></li>
<?php
//Start Session
session_start();
//Check Session
if(isset($_SESSION['user'])){
echo "<li><a href=logout.php>Logout</a></li>" ;
}
else{
echo "<li><a href=login.html>Login</a></li>" ;
}
?>

<li><a href="create_server.php">Create Server</a></li>
<li><a href="delete_server.html">Delete Server</a></li>
<li><a href="join_now.php">Join Now</a></li>
<li><a href="Contact.php">contact</a></li>
</ul>
<h1>WEGO GAMES</h1>
<h2>Team roster</h2>
</div>
<div id="main"><br />
<div id="content">
<div id="left">
<h3>Wego Servers</h3>
<?php
//Database argument ...
$dbHost = "localhost";
$dbUser = "root";
$dbPass = "eatmygame";
$dbDatabase = "wego game";

//connet to the database

$db = mysql_connect("$dbHost", "$dbUser", "$dbPass") or die ("Error connecting to database.");
//Database selection ...
mysql_select_db("$dbDatabase", $db) or die ("Couldn't select the database.");
 //Query
$result=mysql_query("select * from server_table where server_ID>1");
//Create Table AND Insert all data in ...
Print "<table border=0 width=421 height=56>";
 print "<tr>";
 		print "<td height=18 width=20>";print"</td>";
		print "<th height=18 width=126 align=left>";echo "Host Name";print"</th>";
		print"<th height=18 width=140 align=left>";echo "Owner";print"</th>";
		print"<th height=18 width=133 align=left>";echo "Port Number";print"</th>";
	print"</tr>";
while($row = mysql_fetch_array($result)){

 print "<tr>";
 		print "<td height=18 width=20>";print"</td>";
		print "<td height=18 width=126>";echo $row['host_name'];print"</td>";
		print"<td height=18 width=140>";echo $row['user_name'];print"</td>";
		print"<td height=18 width=133>";echo $row['port'];print"</td>";
	print"</tr>";

 }
 print "</table>";
?>
</p>
<br />
</div>
<div id="right">
<div class="member"> <a href=" "><img src="images/member1.gif" alt="member" /></a>
	<span><a href=" ">Cyberstriker</a></span>
</div>
<div class="member"><a href=" "><img src="images/member2.gif" alt="member" /></a>
	<span><a href=" ">Swatman</a></span> </div>
<div class="member"><a href=" "><img src="images/member3.gif" alt="member" /></a>
	<span><a href=" ">Hunter</a></span> </div>
<div class="member"><a href=" "><img src="images/member4.gif" alt="member" /></a>
	<span><a href=" ">Cosmic</a></span> </div>
<div class="member"><a href=" "><img src="images/member2.gif" alt="member" /></a>
	<span><a href=" ">Wolfcry</a></span> </div>
<div class="member"><a href=" "><img src="images/member1.gif" alt="member" /></a>
	<span><a href=" ">Blade</a></span> </div>
<div class="member"><a href=" "><img src="images/member4.gif" alt="member" /></a>
	<span><a href=" ">Zerocool</a></span> </div>
<div class="member"><a href=" "><img src="images/member3.gif" alt="member" /></a>
	<span><a href=" ">Newbie</a></span> </div>
</div>
<div class="clear"></div>
</div>
</div>
<div id="footer"> <br />
<br />
<ul>
<li><a href="index.html">HOME</a></a></li>
<?php
//Start Session
session_start();
//Check Session
if(isset($_SESSION['user'])){
echo "<li><a href=logout.php>Logout</a></li>" ;
}
else{
echo "<li><a href=login.html>Login</a></li>" ;
}
?>

<li><a href="create_server.php">Create Server</a></li>
<li><a href="join_now.php">Join Now</a></li>
<li><a href="Contact.php">contact</a></li>
</ul>
<span>© Wego Company 2011.Supported by <a href="http://www.mywego.com/" target="_blank">mywego.com</a></span> </div>
</div>
</body></html>