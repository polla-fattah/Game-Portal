<?php
//set the level of error reporting
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
//Retreiving arguments ...

//Database connection ...
$conn = mysql_connect('localhost', 'root', 'eatmygame');
$db   = mysql_select_db('wego game');

$result=mysql_query("select * from server_table where server_ID > 1");
//$rowCheck = mysql_num_rows($result);
while($row = mysql_fetch_array($result)){
  $host_name = $row['host_name'];
  $map = $row['map'];
  $max_players = $row['max_players'];
  $s_password = $row['server_password'];
  $a_password = $row['admin_password'];
  $tp_round = $row['tp_round'];
  $win_limit = $row['win_limit'];
  $start_money = $row['start_money'];
  $freeze_time = $row['freeze_time'];
  $port = $row['port'];
  echo "<br>";
if(empty($s_pass)){
  						// 0       1       2         3           4       5        6        7             8            9        10
  $output = shell_exec("bash ./create.sh $map $host_name $max_players $port $a_pass $tp_round $win_limit $start_money $freeze_time $s_pass");
    echo "<pre>$output</pre>";
   echo "Messages ...OK<br>";
   }else{
   $output = shell_exec("bash ./creates.sh $map $host_name $max_players $s_pass $a_pass $tp_round $win_limit $start_money $freeze_time $port");
    echo "<pre>$output</pre>";
   echo "Messages ...OK<br>";
   }

}
/*$user_r=mysql_query("select * from server_table where user_name='$username'");
$row_user_ch = mysql_num_rows($user_r);
if($row_user_ch > 0){
  echo "You can create one server at a Time ... ";
}*/
//Checking first and last name ...



                        #echo `./hlds_run -game cstrike -insecure  +sv_lan 0 +maxplayers 18 +map cs_italy -port 27016';
                        //header('Location: index2.html');
//END

?>