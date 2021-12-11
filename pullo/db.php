<?php
define('DB_SERVER', 'database-1.caorc3vfgkkg.us-east-2.rds.amazonaws.com');
define('DB_USERNAME', 'admin');
define('DB_PASSWORD', 'Password123');
define('DB_NAME', 'shoppingdb');

/* Attempt to connect to MySQL database */
$mysqli = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);

//Check connection
if($mysqli === false){
	die("ERROR: COULD NOT CONNECT. " . $mysqli->connect_error);
}
?>
