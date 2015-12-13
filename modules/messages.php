<?php

error_reporting(0);

session_start();

$data = $_SESSION;


$action = $_POST["action"];

$db = mysql_connect('localhost', 'root', '') or die( mysql_error() );
mysql_select_db( 'netw_data', $db ) or die( mysql_error() );

if($action == 'getMessages'){


    $q = 'SELECT * FROM messages
          LEFT JOIN users ON messages.user_id = users.id
          ORDER BY messages.id ASC';

    $res = mysql_query($q);

    $messages = array();

    while($row = mysql_fetch_assoc($res)){
        $messages[]=$row;
    }

    echo json_encode($messages);

}
elseif($action == 'putMessage' ){

    $message = $_POST["message"];
    $userId = $_POST["userId"];

    $q = 'INSERT INTO `messages`(`user_id`, `message`) VALUES ("'.$userId.'","'.$message.'")';
    echo $q;
    mysql_query($q);

    echo 'success';

}
