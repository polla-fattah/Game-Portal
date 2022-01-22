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
<li><a href="servers_list.php">Servers List</a></li>
<li><a href="create_server.php">Create Server </a></li>
<li><a href="delete_server.html">Delete Server</a></li>
<li><a href="join_now.php">Join Now</a></li>
<li><a href="Contact.html">Contact</a></li>
</ul>
<h1>Contact</h1>
<h2>Team roster</h2>
</div>
<div id="main"><br />
<div id="content">
<div id="left">
<p>For More Information Please visit : <a href="http://www.mywego.com">
www.mywego.com</a></p>
<p>Call Center : 0750 790 1111 / 075- 790 2222</p>
<h3>Comments</h3>
<p align=center>
<?php
 //Database connection ...
inclue("connect.php");


$today = date("F j, Y, g:i a");

// check if POST data has been entered (meaning a comment was entered)

if (isset ($_POST['submit'])) {

//Start Session
session_start();
//Check Session
if(isset($_SESSION['user']))
{
    $comment = mysql_escape_string (trim ($_POST['comment']));
	$username=$_SESSION['user'];
    if(empty($comment))
    {
   	 header('Location:Contact.php');
    }
    else{
    // enter the comment to the database
    $sql = mysql_query ("INSERT INTO comments (user_name,comments,date) VALUES ('$username','$comment','$today')");

    echo 'Your comment has been entered successfully!';
    header('Location:Contact.php');
}
}
else{
//echo "<li><a href=login.html>Login</a></li>" ;
header('Location:login.html');
}

} else {
    // POST data wasnt entered, so display the comments and comment form

    // view comments from database

    $sql = mysql_query ("SELECT * FROM comments ORDER BY comment_ID ASC");
    while ($row = mysql_fetch_array ($sql)) {
echo "<h3>";
print "<font size=1>";
    print"  <fieldset style=border-style:solid; border-width:1px; color:#800000; font-size:1em; font-style:italic; font-weight:bold; text-align:left; list-style-type:none; letter-spacing:-1pt; vertical-align:text-bottom; padding-left:4px; padding-right:4px; padding-top:1px; padding-bottom:1px>
			<legend style=color: #FFFFFF; font-style: italic; font-weight: bold>";print $row['user_name'];print "</legend>";
    print $row['comments'];
    print "</fieldset>";
print "</font>";
    }
echo "</h3>";
echo "<h3>";
    // display comment form
    echo '
    <form action="Contact.php" method="post">
  <textarea name="comment" cols="40" rows="7"></textarea>
    <br><input type=submit value=Submit name=submit>
    </form>';
echo "</h3>";
}

?>
</h3>

</div>
<div id="right">
<div class="member"> <a href=" "><img src="images/member1.gif" alt="member" /></a> <span><a href=" ">Cyberstriker</a></span>
</div>
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
<div class="member"> <a href=" "><img src="images/member3.gif" alt="member" /></a> <span><a href=" ">Newbie</a></span>
</div>
</div>
<div class="clear"></div>
</div>
</div>
<div id="footer"> <br />
<br />
<ul>
<li><a href="index.html">Home</a></li>
<li><a href="servers_list.php">Servers List</a></li>
<li><a href="create_server.php">Create Server </a></li>
<li><a href="join_now.php">Join Now</a></li>
<li class="lastchild"><a href=" ">contact</a></li>
</ul>
<span>© Wego Company 2011.Supported by <a href="http://www.mywego.com/" target="_blank">mywego.com</a></span> </div>
</div>
</body></html>