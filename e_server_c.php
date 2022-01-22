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
<li><a href="login.html">Logout</a></li>
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
<div id="left">
<h3>Creating Server</h3>
<p>
<?php
//set the level of error reporting
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
//Retreiving arguments ...
$map=$_POST["map"];
$host_name=$_POST["host_name"];
$max_players=$_POST["max_players"];
$s_pass=$_POST["s_pass"];
$a_pass=$_POST["a_pass"];
$tp_round=$_POST["tp_round"];
$win_limit= $_POST["win_limit"];
$start_money=$_POST["start_money"];
$freeze_time=$_POST["freeze_time"];
$today = date("F j, Y, g:i a");
//Getting Username ...
session_start();
$username=$_SESSION['user'];

//Database connection ...
$conn = mysql_connect('localhost', 'root', 'eatmygame');
$db   = mysql_select_db('wego game');

$result=mysql_query("select * from server_table where host_name='$host_name'");
$rowCheck = mysql_num_rows($result);
$getlastport=mysql_query("SELECT port FROM server_table ORDER BY port DESC LIMIT 1");
while($row = mysql_fetch_array($getlastport)){
  $port=$row['port']+1;
}
/*$user_r=mysql_query("select * from server_table where user_name='$username'");
$row_user_ch = mysql_num_rows($user_r);
if($row_user_ch > 0){
  echo "You can create one server at a Time ... ";
}*/
//Checking first and last name ...
if(empty($map) or empty($host_name) or empty($max_players) or empty($a_pass)){
	echo "please enter all feilds  !!!";
 }

   else if (!is_numeric($max_players) or !is_numeric($tp_round) or !is_numeric($win_limit) or !is_numeric($start_money) or !is_numeric($freeze_time))
    {
      echo "Please Enter a NUMBER >> invalid argument type ...";
      $max_players="";
    }
         else if ($rowCheck > 0)
                        {
                          echo "Server <font color=#ffffff><b>$host_name</b></font> Already Exist ...";
                        }
                         else{

                           //Sending Email to the owner user ...
                          // mail($to, $subject, $body);
                           //mail("simon@mywego.com", "sub_Test", "Body_TEST");

                      mysql_query("INSERT INTO server_table (user_name,map,host_name,max_players,server_password,admin_password,tp_round,win_limit,start_money,freeze_time,date,port)
                      VALUES ('$username','$map', '$host_name', '$max_players','$s_pass', '$a_pass','$tp_round','$win_limit','$start_money','$freeze_time','$today','$port')")or die (mysql_error());
				echo "Server Created Successfuly on port $port...";
				if(empty($s_pass)){
                       	
                                           	    // 0       1       2         3           4       5        6        7             8            9        10
			   $output = shell_exec("bash ./create.sh $map $host_name $max_players $port $a_pass $tp_round $win_limit $start_money $freeze_time $s_pass");

			  // echo "<pre>$output</pre>";
			   //echo "Messages ...OK<br>";
			}else{
			$output = shell_exec("bash ./creates.sh $map $host_name $max_players $s_pass $a_pass $tp_round $win_limit $start_money $freeze_time $port");
			} 

                        #echo `./hlds_run -game cstrike -insecure  +sv_lan 0 +maxplayers 18 +map cs_italy -port 27016';
                        //header('Location: index2.html');
              	}
//END

?>
</p>
<p>&nbsp;</p>
<h3>How to create server</h3>
<p>STEPS</p>
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