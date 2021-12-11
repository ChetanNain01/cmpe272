<?php
define('DB_SERVER', 'database-1.caorc3vfgkkg.us-east-2.rds.amazonaws.com');
define('DB_USERNAME', 'admin');
define('DB_PASSWORD', 'Password123');
define('DB_NAME', 'shoppingdb');

$mysqli = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($mysqli === false){
    die("ERROR: COULD'T CONNECT. ". $mysqli -> connect_error);
}
?>