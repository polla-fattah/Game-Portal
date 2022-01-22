

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
<li><a onclick="history.go(-1);return true;">back</a></li>

<li><a href="Contact.html">contact</a></li>
</ul>
<h1>ERROR</h1>
<h2>Team roster</h2>
</div>
<div id="main"><br />
<div id="content">
<div id="left">
<p>
<?php
//set the level of error reporting
error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);

//Retreiving arguments ...
$fname=$_GET["fname"];
$lname=$_GET["lname"];
$username=$_GET["username"];
$password=$_GET["password"];
$repassword=$_GET["repassword"];
$age=$_GET["age"];
$phone_no=$_GET["phone_no"];
$email=$_GET["email"];
$region=$_GET["region"];
$todo=$_GET["todo"];
$today = date("F j, Y, g:i a");


//Regular Expression for email validation ...
$normal = "^[a-z0-9_\+-]+(\.[a-z0-9_\+-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*\.([a-z]{2,4})$";
$validButRare = "^[a-z0-9,!#\$%&'\*\+/=\?\^_`\{\|}~-]+(\.[a-z0-9,!#\$%&'\*\+/=\?\^_`\{\|}~-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*\.([a-z]{2,})$";
 //Database connection ...
include("connect.php");

//Retreiving Usernames...
$result=mysql_query("select * from reg_table where user_name='$username'");
$rowCheck = mysql_num_rows($result);
//Checking first and last name ...
if(empty($fname) or empty($lname)){
	echo "Please enter your First name and Last name  !!!";
 }
//Checking Username feild ...
else if(empty($username)){
	echo "Please enter a username !!!";
 }
        //No Password Inserted ...
      else if(empty($password)){
      	echo "Please enter your password";
      }
       //Validation Password is empty ...
      else if(empty($repassword)){
      	echo "Please re-enter the password";
      }
        // Maching the two passwords ...
             else if(!empty($repassword))
              {
              	if($password != $repassword)
                  {
                  	echo "Passwords not mach";
              	  }
                   else if ($rowCheck > 0)
                        {
                          echo "User <font color=#ffffff><b>$username</b></font> Already Exist ...";
                        }

                  //Checking Email feild ...
                 else if(empty($email)){
          	             echo "Please enter your email address !!!";
                         }   //Validating Email Address ...
                             else if(!eregi($normal, $email)) {
                                    echo("The address <font color=#ffffff><b>$email</b></font> is not valid.");

                                   //echo "<FORM><INPUT TYPE=button VALUE=Back onClick=history.go(-1);return true;></FORM>  ";

                                  }

             /*  else if (eregi($validButRare, $email)) {
                  echo("The address $email looks a bit strange but it is syntactically valid. You might want to check it for typos.");
                } */


                   // Done...
                   // DO insertion to the database ...
              	else
                  {

                      mysql_query("INSERT INTO reg_table (fname, lname, user_name,password,age,email,region,phone_no,reg_date)
                      VALUES ('$fname', '$lname', '$username','$password', '$age', '$email','$region', '$phone_no','$today')")or die (mysql_error());


                       	//echo "Now you are able to create servers ";
                        header('Location: index.php');
              	}
                  }






//END


?>
</p>
<h3><FORM><INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);return true;"></FORM></h3>
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
<li><a href="">Home</a></li>
<li><a href="logout.php">Logout</a></li>
<li><a href="create_server.php">Create Server</a></li>
<li><a href="join_now.php">Join Now</a></li>
<li class="lastchild"><a href=" ">contact</a></li>
</ul>
<span>© Wego Company 2011.Supported by <a href="http://www.mywego.com/" target="_blank">mywego.com</a></span> </div>
</div>
</body></html>
