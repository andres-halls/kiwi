<?php

error_reporting(0);

session_start();

$names = strtoupper($_POST["names"]);
$user_id = $_POST["user_id"];

$names = explode(" ", $names);

$db = mysql_connect('localhost', 'root', '') or die( mysql_error() );
mysql_select_db( 'netw_data', $db ) or die( mysql_error() );

$q = 'SELECT u.id
          FROM users_contacts AS uc
          LEFT JOIN users AS u ON(uc.contact_id = u.id)
          WHERE uc.user_id = "'.$user_id.'"';

$res = mysql_query($q);
$ids = array();

while($row = mysql_fetch_assoc($res)){
    $ids[] = $row['id'];
}

$q = 'SELECT id, name FROM users
          WHERE id != "'.$user_id.'" AND name LIKE "%'.implode('%" AND name LIKE "%', $names).'%" AND id NOT IN("'.implode('","', $ids).'")';

$res = mysql_query($q);
while($row = mysql_fetch_assoc($res)){
    $results[] = array('id' => $row['id'], 'text' => $row['name']);
}

echo json_encode($results);
