<?php  

$sname = "php-website.cefkjzu19slj.us-east-1.rds.amazonaws.com";
$uname = "admin";
$password = "12345678";

$db_name = "login2";

$conn = mysqli_connect($sname, $uname, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
	exit();
}