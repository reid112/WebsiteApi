<?php

// Include database.php
include_once('../database.php');

if($_SERVER['REQUEST_METHOD'] == "POST") {
    // Get data
    $name = isset($_POST['name']) ? mysql_real_escape_string($_POST['name']) : "Anonymous";
    $message = isset($_POST['message']) ? mysql_real_escape_string($_POST['message']) : "";

    // Insert data into data base
    $sql = "INSERT INTO `gb_messages` (`id`, `name`, `message`, `shown`) VALUES (NULL, '$name', '$message', '0');";
    $query = mysql_query($sql);

    if($query) {
        $json = array("status" => 1, "msg" => "Success!");
    } else {
        $json = array("status" => 0, "msg" => "Error!" . $query);
    }
} else {
    $json = array("status" => 0, "msg" => "Request method not accepted");
}

@mysql_close($conn);

/* Output header */
header('Content-type: application/json');
echo json_encode($json);