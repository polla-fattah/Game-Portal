<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">

<head>
  <title>Log in</title>
</head>

<body>

<?php
//set the level of error reporting
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

$username=$_GET['user_name'];
$password=$_GET['password'];

//Database connection ...
$conn = mysql_connect('localhost', 'root', '');
$db   = mysql_select_db('wego game');

$username_result=mysql_query("SELECT * FROM reg_table WHERE user_name='$username'") or die (mysql_error());

while ($row = mysql_fetch_array($username_result))
{
  if($row[password] === $password)
  {
    echo "WELCOME Dear $username";
    echo history.go(-1);echo return true; 
    //header('Location: session.php');
  }
  else
  {
    echo "Wrong User Name or Password";
  }
}
 mysql_close($conn);
?>

</body>

</html>
