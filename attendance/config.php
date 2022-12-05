<?php 

$host = 'localhost';
$username = 'root';
$password = '';
$database = 'employee';

$con = mysqli_connect($host, $username, $password, $database);

if(!$con){
	echo 'Not connected to database';
}

?>