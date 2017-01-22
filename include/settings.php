<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "root";
$db_name = "vulnourblog";

try{
  $db= new PDO("mysql:host=$db_host;dbname=$db_name","$db_user","$db_pass");
}
catch (PDOexception $e){
  print $e->getMessage();
}
?>
