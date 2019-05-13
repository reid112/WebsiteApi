<?php

$server = "enter server";
$username = "enter username";
$password = "enter password";

// Create connection
$conn = mysql_connect($server, $username, $password);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysql_connect_error());
}

echo "Connected successfully";

?>