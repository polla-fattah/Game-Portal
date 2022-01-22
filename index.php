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
<li><a href="http://cs-skini.me/csfull">Download</a></li>
<li><a href="servers_list.php">Servers List</a></li>
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
<div id="left" style="width: 490px; height: 679px">
<h3>How To Play Online</h3>
<p><a href="http://cs-skini.me/csfull">Click here to download Counter-Strike 
</a></p>
</p>
<p><b>Install the game and launch it from your &quot;Games&quot; list</b></p>
<p><b>Hit &quot;Find Servers&quot; and look for a nice server with more than 10 players 
		but less than 20</b>. This way, you won't have a riot, but you will 
		never have no one to kill.&nbsp;</p>
<p><b>keys if you are unfamiliar with them</b>. Assuming you are playing a 
		normal map (with Prefixes de for Defusal, cs for Hostage, as for 
		Assassination, and es for Escape), hit B (default) to access the buy 
		menu. Buy your guns and ammo.</p>
<p><b>Have some knowledge</b>. In DE, the Terrorists are attempting to blow up 
		a designated target with their C4, which is carried by one random 
		Terrorist. In CS, the Counter-Terrorists are rescuing hostages situated 
		around the map. In AS, the Counter-Terrorists must protect the VIP, who 
		is a random Counter-Terrorist.</p></li>
		</p>

<div align=center>
	<object width='398' height='333' id='FiveminPlayer' classid='clsid:d27cdb6e-ae6d-11cf-96b8-444553540000'> 
	<param name='allowfullscreen' value='true'/> 
	<param name='allowScriptAccess' value='always'/>
	 <param name='movie' value='http://embed.5min.com/68736383/'/> 
	 <param name='wmode' value='opaque' /> 
		<embed name='FiveminPlayer' src='http://embed.5min.com/68736383/' type='application/x-shockwave-flash' width='398' height='333' allowfullscreen='true' allowScriptAccess='always' wmode='opaque'> 
		</embed>
		 </object> 
		<h3>&nbsp;</h3>
</div>
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
<li><a href="join_now.php">Join Now</a></li>
<li class="lastchild"><a href=" ">contact</a></li>
</ul>
<span>© Wego Company 2011.Supported by <a href="http://www.mywego.com/" target="_blank">mywego.com</a></span> </div>
</div>
</body></html>