<?php 
if(isset($_GET['logout'])){
  session_unset();
  session_destroy();
  header("location:home.php");
}
?>