<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'cmpe');

/* Attempt to connect to MySQL database */
$mysqli = new mysqli(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_NAME);

//Check connection
if($mysqli === false){
	die("ERROR: COULD NOT CONNECT. " . $mysqli->connect_error);
}
?>
