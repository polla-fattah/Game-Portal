<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="style.css" rel="stylesheet" type="text/css" /><title>WEGO Counter-stike</title>
<?php
ini_set('display_errors', 1);
ini_set('error_reporting',E_ALL);
?>
</head>

<body>
<object height="6%" width="7%"
classid="clsid:22D6F312-B0F6-11D0-94AB-0080C74C7E95">
<param name="AutoStart" value="0" />
<param name="FileName" value="sample.wav" />
</object> 

<div id="container">
<div id="header"></div>
<div id="menu">
<ul>
<li><a href="index.php">Home</a></li>
<li><a href="http://cs-skini.me/csfull">Download</a></li>
<li><a href="servers_list.php">Servers List </a><a href="join_now.php">Join Now
</a><a href="Contact.php">contact</a></li>
</ul>
<h1>WEGO GAMES</h1>
<h2>Team roster</h2>
</div>
<div id="main"><br />
<div id="content">
<div id="left" style="width: 490px; height: 679px">
<h3>Please Try Again</h3>
<div align=center>
<p>
<?php
//check that the user is calling the page from the login form and not accessing it directly
//and redirect back to the login form if necessary
if (isset($user_name)) {
//header( "Location: login.html");
echo "User already login";
}
//check that the form fields are not empty, and redirect back to the login page if they are
/*elseif (empty($user_name) || empty($password)) {
//header( 'Location: login.html');
echo "Empty";
} */
else{

//convert the field values to simple variables

//add slashes to the user_name and md5() the password
$user = $_GET['user_name'];
$pass = $_GET['password'];
//$page=$_GET['pre_page'];
$today = date("F j, Y, g:i a");

//set the database connection variables

 //Database connection ...
echo "Test";
require  "connect.php";

$result=mysql_query("select * from reg_table where user_name='$user'");
//$info = mysql_fetch_array($result);
//check that at least one row was returned

$rowCheck = mysql_num_rows($result);
if($rowCheck > 0){
//if(true){

while($row = mysql_fetch_array($result)){

  if($row['password']==$pass){


   session_start();
  //session_register('user');

  $_SESSION['user'] = $user;

  // Then to call the uname from now on use...


  //trying to get last page requesting...
 /* echo 'Success!';
  $pre_page=$_SERVER['HTTP_REFERER'];
  echo "<br>";
  echo $_SERVER['REQUEST_URI'];
  echo "<br>";
  echo $pre_page;*/
 // echo $page;
 header('Location: index.php');
  //Inserting into table user name and time of logining ...
  mysql_query("INSERT INTO login_table (user_name,date)
                      VALUES ('$user','$today')")or die (mysql_error());


  }
  else{
    echo 'Incorrect login name or password. Please try again.';
  }



  }

  }
  else {

  //if nothing is returned by the query, unsuccessful login code goes here...

  echo 'Incorrect login name or password. Please try again.';
  }
  }

?>
</p>
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
<li><a href="index.html">Home</a></li>
<li><a href="login.html">Login</a></li>
<li><a href="servers_list.php">Servers List</a></li>
<li><a href="create_server.php">Create Server</a></li>
<li><a href="join_now.php">Join Now</a></li>
<li class="lastchild"><a href=" ">contact</a></li>
</ul>
<span>© Wego Company 2011.Supported by <a href="http://www.mywego.com/" target="_blank">mywego.com</a></span> </div>
</div>
</body></html>