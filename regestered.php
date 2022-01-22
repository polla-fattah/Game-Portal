

<html>
<head>Error ...</head>
<body>
<br>
<FORM><INPUT TYPE="button" VALUE="Back" onClick="history.go(-1);return true;"></FORM>
 <br>
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
$conn = mysql_connect('localhost', 'root', 'eatmygame');
$db   = mysql_select_db('wego game');


//Retreiving Usernames...
$result=mysql_query("select * from reg_table where user_name='$username'");
$rowCheck = mysql_num_rows($result);
//Checking first and last name ...
if(empty($fname) or empty($lname)){
	echo "please enter your First name and Last name  !!!";
 }
//Checking Username feild ...
else if(empty($username)){
	echo "please enter a username !!!";
 }
        //No Password Inserted ...
      else if(empty($password)){
      	echo "please enter your password";
      }
       //Validation Password is empty ...
      else if(empty($repassword)){
      	echo "please re-enter the password";
      }
        // Maching the two passwords ...
             else if(!empty($repassword))
              {
              	if($password != $repassword)
                  {
                  	echo "Password not mach";
              	  }
                   else if ($rowCheck > 0)
                        {
                          echo "User <font color=red><b>$username</b></font> Already Exist ...";
                        }

                  //Checking Email feild ...
                 else if(empty($email)){
          	             echo "please enter your email address !!!";
                         }   //Validating Email Address ...
                             else if(!eregi($normal, $email)) {
                                    echo("The address <font color=red>$email</font> is not valid.");
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


                       	echo "New Raw Inserted ...";
                        //header('Location: index2.html');
              	}
                  }






//END


?>

</body>
</html>