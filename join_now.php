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
<li><a href="index.php">Home</a></li>
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

<li><a href="servers_list.php">Servers List</a></li>
<li><a href="create_server.php">Create Server</a></li>
<li><a href="">Join Now</a></li>
<li><a href="Contact.php">contact</a></li>
</ul>
<h1>Join Now</h1>
<h2>Team roster</h2>
</div>
<div id="main" style="width: 800px; height: 600px">
	&nbsp;<div id="content" style="width: 660px; height: 250px">
<div id="right" style="width: 629px; height: 499px">
<div class="member" style="width: 730px; height: 721px"> 
	<table border="0" width="730" height="420">
		<tr>
			<td height="314" width="476">
			<form method="GET" action=welcome_reg.php>
			

			
			<b>First Name:</a> </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type=text name="fname" size="44"> 
			<p>&nbsp;</p>
			<p> 
			<b>Last Name :</a></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type=text name="lname" size="44"></p>
<p> 
			&nbsp;</p>
			<p> 
			<b>User Name :</a>&nbsp;&nbsp;</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			<input type=text name="username" size="44">
				<p> 
			&nbsp;<p> 
			<b>Password </a>:&nbsp;&nbsp;&nbsp;</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			<input type=password name="password" size="44">
				<p> 
			&nbsp;<p> 
			<b>Re-enter password&nbsp;:</b>&nbsp;&nbsp;&nbsp; 
			<input type=password name="repassword" size="44">
				<p>&nbsp;</p>
			<p> 
			<b>Age:</a>&nbsp;&nbsp;&nbsp;</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 

			<select name=age size=1>
			<?php
			for($i=1970;$i<=2006;$i++)
			{
				echo "<option value=$i>$i</option>";
			}
			?>
			</select>
				<p> 
			&nbsp;<p> 
			<b>Email Address :</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; 
			<input type=text name="email" size="44">
			<input type=hidden name=todo>
				<p> 
			&nbsp;<p> 
			<b>Phone# :</a>&nbsp;&nbsp;</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			<input type=text name="phone_no" size="44">
				<p> 
			&nbsp;<p> 
			<b>Region :</a>&nbsp;&nbsp;</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			<input type=text name="region" size="44">
				<p> 
			&nbsp;<p> 
			&nbsp;<p> 
			&nbsp;<p>
			 
			&nbsp;<p><input type="submit" value="Join" name="join_button">&nbsp;
			
			<input type="reset" value="Reset" name="reset_button"></p>
			</form>
			<p> 
			&nbsp;</td>
			<td height="141" width="248" rowspan="2">
<div class="member"> <a href=" "><img src="images/member2.gif" alt="member" /></a> <span><a href=" ">Swatman</a></span>
</div>
<div class="member"> <a href=" "><img src="images/member3.gif" alt="member" /></a> <span><a href=" ">Hunter</a></span>
</div>
<div class="member"> <a href=" "><img src="images/member4.gif" alt="member" /></a> <span><a href=" ">Cosmic</a></span>
</div>
<div class="member"> <a href=" "><img src="images/member2.gif" alt="member" /></a> <span><a href=" ">Wolfcry</a></span>
</div>
<div class="member"> <a href=" "><img src="images/member1.gif" alt="member" /></a> <span><a href=" ">Blade</a></span>
</div>
<div class="member"> <a href=" "><img src="images/member4.gif" alt="member" /></a> <span><a href=" ">Zerocool</a></span>
</div>
<div class="member"> &nbsp;</td>
		</tr>
		<tr>
			<td height="20" width="476" rowspan="2"> &nbsp;</td>
		</tr>
		<tr>
			<td height="18" width="248">
			</td>
		</tr>
	</table>
</div>
</div>
<div class="clear"></div>
</div>
</div>
<div id="footer"> <br />
<br />
<ul>
<li><a href="index.php">Home</a></li>
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

<li><a href="servers_list.php">Servers List</a></li>
<li><a href="create_server.php">Create Server</a></li>
<li><a href="">Join Now</a></li>
<li class="lastchild"><a href=" ">contact</a></li>
</ul>
<span>© Wego Company 2011.Supported by <a href="http://www.mywego.com/" target="_blank">mywego.com</a></span> </div>
</div>
</body></html>