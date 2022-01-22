<?php
//Start Session
session_start();
//Unset Session
session_unset();
//Destroy Session
session_destroy();
header('Location: index.php');
?>