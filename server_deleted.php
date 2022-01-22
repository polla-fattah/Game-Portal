<?php
//Get File Name without extenstion (GET SERVER ID) ...
function remove_ext($file_name)
{
  $rest = preg_replace("/\\.[^.\\s]{3,4}$/", "", $file_name);
  return (string)$rest;
}
//Get Server Name ...
function remove_ID($file_nam)
{
	$ext = end(explode('.', $file_nam));
	return (string)$ext;
	}



//set the level of error reporting
//error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
//Retreiving arguments ...
$host_name=$_POST["host_name"];
$s_pass=$_POST["s_pass"];
$a_pass=$_POST["a_pass"];
$today = date("F j, Y, g:i a");
//Getting Username ...
session_start();
$username=$_SESSION['user'];

//Database connection ...
$conn = mysql_connect('localhost', 'root', 'eatmygame');
$db   = mysql_select_db('wego game');

$result=mysql_query("select * from server_table where host_name='$host_name'");
$rowCheck = mysql_num_rows($result);
while($row = mysql_fetch_array($result)){
    $host= $row['host_name'];
     echo "<br>";
     $server_password= $row['server_password'];
     echo "<br>";
     $admin_password= $row['admin_password'];
     echo "<br>";
}
//Checking feilds ...
if(empty($host_name) or empty($s_pass) or empty($a_pass)){
	echo "please enter all feilds  !!!";
 }
                         else if ($rowCheck == 0)
                        {
                          echo "Server <font color=red><b>$host_name</b></font> not exist ...";
                       }
                        else if($server_password != $s_pass){
                          echo "Password Not Mach";
                        }
                        else if($admin_password!= $a_pass){
                          echo "Password Not Mached";
                        }
                         else{
 //Delete the server from DATABASE ...
                          // mysql_query("DELETE FROM server_table WHERE host_name='$host_name'") or die (mysql_error());


                       	echo "Host $host_name Stopped Successfully  ...";

//Deleting Server From Linux ...




//Defining arrays ...
$arrID=array();
$arrname=array();

//Get the list of Servers in the directory /var/run/screen/S-root after changing mode to 1777...
$output = shell_exec("bash ./ch1777.sh");
echo "<pre>$output</pre>";
$dir = "/var/run/screen/S-root";
 $arrfile=array();
 $count=0;
// Open a known directory, and proceed to read its contents
if (is_dir($dir)) {
    if ($dh = opendir($dir)) {
        while (($file = readdir($dh)) !== false) {
             $arrfile[$count] = $file;
             $arrID[$count] = remove_ext($file);
             $arrname[$count] = remove_ID($file);
             $count=$count+1;
        }
        closedir($dh);
    }
}

//Printing array contents
for ($i = 0; $i <= 10; $i++) {
	echo $arrID[$i];
	echo "<br>";
	echo $arrfile[$i];
	echo "<br>";
	echo $arrname[$i];
	echo "<br>";
	}
//Matching Server Name ...
/* The \b in the pattern indicates a word boundary, so only the distinct
 * word "web" is matched, and not a word partial like "webbing" or "cobweb" */
for ($i = 0; $i <= 9; $i++) {
  if (preg_match("/\b$host_name\b/i", $arrname[$i])) {
      //echo "A match was found ";
      //echo "arrfile=";
      echo $arrfile[$i];
      echo "<br>";
      if(true){
        $ID = $arrID[$i];
       /* echo $ID;
        echo "<br>";
          echo "i=";
          echo $i; */
      break;
      }
  } else {
     /* echo "Server Not Found ... ";
      echo "<br>";*/
      }
}

echo "<br>";

//Kill and change mode to 1777
echo "<br>";
$output2 = shell_exec("bash ./ch700kill.sh $ID");
echo "<pre>$output2</pre>";

//Change mode to 700
$output3 = shell_exec("bash ./ch700.sh");
//echo "<pre>$output3</pre>";

              	}
//END

?>