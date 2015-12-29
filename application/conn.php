<?php
$username = "root";
$password = "password";
$hostname = "localhost"; 

//connection to the database
$dbhandle = mysql_connect($hostname, $username, $password) 
  or die("Unable to connect to MySQL");

mysql_select_db("hellocabs",$dbhandle) 
  or die("Could not select examples");
session_start();
date_default_timezone_set('Asia/Kolkata');
?>