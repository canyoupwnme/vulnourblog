<?php
$db_host = "localhost";
$db_user = "root";
$db_pass = "";
$db_name = "vulnourblog";
$db_connection = mysql_connect($db_host, $db_user, $db_pass);
if(! $db_connection) die("MySQL'e bağlanılamıyor");
mysql_select_db($db_name, $db_connection) or die ("Veritabanına bağlanılamıyor");
?>