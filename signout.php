<?php
//signout.php
ob_start();

include 'connect.php';
include 'header.php';

$url = "signout.php";
 
//User session in ['user']
if(isset($_SESSION['signed_in']))
{
  
  session_unset();
  session_destroy();
  session_write_close();
  header('Location: '.$url);

}
include 'footer.php';

ob_start();
?>