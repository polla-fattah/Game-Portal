<?php
//Start Session
session_start();
//Check Session
if(isset($_SESSION['user'])){
  echo "Welcome user ".$_SESSION['user'];
  header('Location: index2.html');
}
else{
  echo "please login";
  header('Location: login.html');
}
?>