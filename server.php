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
     echo $row['port'];
     echo $port;
     echo "<br>";
}
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
                          echo "Server <font color=red><b>$host_name</b></font> Already Exist ...";
                        }
                         else{

                           //Sending Email to the owner user ...
                          // mail($to, $subject, $body);
                           //mail("simon@mywego.com", "sub_Test", "Body_TEST");

                      mysql_query("INSERT INTO server_table (user_name,map,host_name,max_players,server_password,admin_password,date,port)
                      VALUES ('$username','$map', '$host_name', '$max_players','$s_pass', '$a_pass','$today','$port')")or die (mysql_error());


                       	echo "Your $host_name Create Successfuly  ...";
                                            //        0         1      2          3            4      5        6        7             8            9         10
			   $output = shell_exec("bash ./create.sh $map $host_name $max_players $s_pass $a_pass $tp_round $win_limit $start_money $freeze_time $port");

			   //echo "<pre>$output</pre>";
			   //echo "Messages ...OK<br>";

                        #echo `./hlds_run -game cstrike -insecure  +sv_lan 0 +maxplayers 18 +map cs_italy -port 27016';
                        //header('Location: index2.html');
              	}
//END

?>