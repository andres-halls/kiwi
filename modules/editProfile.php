<?php

error_reporting(0);

session_start();

$db = mysql_connect('localhost', 'root', '') or die( mysql_error() );
mysql_select_db( 'netw_data', $db ) or die( mysql_error() );

if ($_POST['action'] == 'get') {

    $user_id = $_POST["user_id"];
    $q = 'SELECT description FROM users WHERE id = "'.$user_id.'"';
    $res = mysql_query($q);
    $description = mysql_fetch_assoc($res);
    echo json_encode($description);

} else if ($_POST['action'] == 'update') {

    $description = $_POST["description"];
    $user_id = $_POST["user_id"];

    $q = 'UPDATE users SET description = "'.$description.'" WHERE id = "'.$user_id.'"';
    mysql_query($q);


}

