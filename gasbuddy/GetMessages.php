<?php

// Include database.php
include_once('../database.php');

$sql = "SELECT * FROM gb_messages WHERE shown = 0";
$query = mysql_query($sql);
$posts = array();

if($query) {
    if(mysql_num_rows($query)) {
        while($message = mysql_fetch_assoc($query)) {
            $messages[] = array($message);
        }
    }

    $json = array("status" => 1, "msg" => "Success!", "messages" => $messages);
} else {
    $json = array("status" => 0, "msg" => "Error!");
}

// Set all "unread" messages to read
$update_sql = "UPDATE gb_messages SET shown = 1 WHERE shown = 0;";
mysql_query($update_sql);

@mysql_close($conn);

header('Content-type: application/json');
echo json_encode(array('response'=>$json));

?>
