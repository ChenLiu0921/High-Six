<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '2243d3896cc5eccd');
define('DB_NAME', 'high_six');

/* Attempt to connect to MySQL database */
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}

?>
