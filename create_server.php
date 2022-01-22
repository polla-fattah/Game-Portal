<?php
//Start Session
session_start();
//Check Session
if(isset($_SESSION['user'])){
 // header('Location: create_server.php');
}
else{
  echo "please login";
  header('Location: login.html');
}
?>

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
<li><a href="logout.php">Logout</a></li>
<li><a>Create Server</a></a></li>
<li><a href="delete_server.html">Delete Server</a></li>
<li><a href="Contact.php">contact</a></li>
</ul>
<h1>Create Server</h1>
<h2>Team roster</h2>
</div>
<div id="main" style="width: 800px; height: 600px">
	&nbsp;<div id="content" style="width: 660px; height: 250px">
<div id="right" style="width: 629px; height: 499px">
<div class="member" style="width: 730px; height: 721px">
	<table border="0" width="730" height="420">
		<tr>
			<td height="314" width="476">
			<form method="POST" action="e_server_c.php">



							<b>Map </a>:&nbsp;&nbsp;</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;
			<select name="map" size=1>
			<option value=cs_italy>cs_italy</option>
			<option value="de_prodigy">de_prodigy</option>
			<option value="cs_assault">cs_assault</option>
			<option value=cs_aztec>cs_aztec</option>
			<option value=cs_dust>cs_dust</option>
			<option value=cs_inferno>cs_inferno</option>
			<option value=as_oilrig>as_oilrig</option>
			<option value=cs_747>cs_747</option>
			<option value=cs_backalley>cs_backalley</option>
			<option value=cs_estate>cs_estate</option>
			<option value=cs_havana>cs_havana</option>
			<option value=cs_militia>cs_militia</option>
			<option value=cs_office>cs_office</option>
			<option value=cs_siege>cs_siege</option>
			<option value=de_airstrip>de_airstrip</option>
			<option value=de_cbble>de_cbble</option>
			<option value=de_chateau>de_chateau</option>
			<option value=de_dust2>de_dust2</option>
			<option value=de_inferno>de_inferno</option>
			<option value=de_nuke>de_nuke</option>
			<option value=de_piranesi>de_piranesi</option>
			<option value="de_storm">de_storm</option>
			<option value="de_survivor">de_survivor</option>
			<option value="de_torn">de_torn</option>
			<option value="de_train">de_train</option>
			<option value="de_vertigo">de_vertigo</option>
			<option value="de_apache">de_apache</option>

			</select>
			<p>&nbsp;</p>
			<p><b>Host Name:</a> </b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp; <input type=text name="host_name" size="44">
			</p>
			<p>&nbsp;</p>
			<p> 
			<b>Max. Players :</a></b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <input type=text name="max_players" size="44"></p>
<p> 
			&nbsp;</p>
			<p> 
			<b>Server Password :</a>&nbsp;&nbsp;&nbsp;</b>&nbsp;<input type=text name="s_pass" size="44">
				<p> 
			&nbsp;<p> 
			<b>Admin Password </a>:&nbsp; &nbsp;</b> 
			<input type=text name="a_pass" size="44">
				<p> 
			&nbsp;<p> 
			<b>Time per Round </a>:&nbsp;&nbsp;</b>&nbsp; &nbsp;
			<input type=text name="tp_round" size="44">
				<p> 
			&nbsp;<p> 
			<b>Win Limit&nbsp;:</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			<input type=text name="win_limit" size="44">
				<p>&nbsp;</p>
			<p> 
			<b>Start Money:</a>&nbsp;</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp; 
			<input type=text name="start_money" size="44"></p>
			<p> 
			&nbsp;</p>
			<p> 
			<b>Freeze Time :</a>&nbsp;</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
			<input type=text name="freeze_time" size="44"></p>
			<p> 
			&nbsp;</p>
			<p> 
			&nbsp;</p>
			<input type="submit" value="Create Server">
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
<li><a href="index.html">Home</a></li>
<li><a href="logout.php">Logout</a></li>
<li><a>Create Server</a></a></li>
<li class="lastchild"><a href=" ">contact</a></li>
</ul>
<span>© Wego Company 2011.Supported by <a href="http://www.mywego.com/" target="_blank">mywego.com</a></span> </div>
</div>
</body></html>