<?php

$server = "";
$username = "";
$password = "";

// Create connection
$conn = mysql_connect($server, $username, $password);
mysql_select_db('api');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}

?>