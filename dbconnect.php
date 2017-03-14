<?php
$host = "localhost";
$user = "root";
$pass = "fantastic";
$db = "poll";
$link = mysqli_connect($host,$user,$pass,$db);
if (!$link)
{
   die('Could not connect: ' . mysql_error());
}
#echo 'Connected successfully<p>'; #MySQL database connection test line, uncomment to test connection.

$dbcon = mysqli_select_db($link, $db);
if (!$dbcon)
{
	die('Database selection failed:' . mysql_error());
}
?>
