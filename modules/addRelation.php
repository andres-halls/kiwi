<?php

error_reporting(0);

session_start();

$user_id = $_POST["user_id"];
$contact_id = $_POST["contact_id"];
$relation = $_POST["relation"];
$action = $_POST["action"];


$db = mysql_connect('localhost', 'root', '') or die( mysql_error() );
mysql_select_db( 'netw_data', $db ) or die( mysql_error() );

if($action == 'get'){

    $q = 'SELECT u.name
          FROM users AS u
          LEFT JOIN users_contacts AS uc ON(uc.contact_id = u.id)
          WHERE uc.user_id = "'.$user_id.'"';

    $res = mysql_query($q);

    $names = array();
    while($row = mysql_fetch_assoc($res)){
        $names[] = $row;
    }

    echo json_encode($names);
}
elseif($action == 'add'){
    $q = 'INSERT INTO `users_contacts`(`user_id`, `relation`, `contact_id`) VALUES ("'.$user_id.'","'.$relation.'","'.$contact_id.'")';
    $res = mysql_query($q);
}




