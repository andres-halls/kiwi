<?php

error_reporting(0);

require("init.php");
require("idCodeToDate.php");

if (isset($_POST["signature"])) {
    $result = $sw->authentication($_SESSION["smart_card_auth_challenge"], $_POST["signature"], $_POST["certificate"]);
    unset($_SESSION["smart_card_auth_challenge"]);

    $actionSuccess = $result === true;

    if (!$actionSuccess) {
        print_r($result);
    } else {
        // User was successfully authenticated. Now get user details from certificate.
        $data = $sw->parseCertificate($_POST["certificate"]);
        login($data);

        $idCode = $_SESSION['user']['identificationCode'];
        $country = $_SESSION['user']['organization'];
        $idCodeToDate = new personalcode($idCode);
        $dob = $idCodeToDate->parseIdCode()['DateOfBirth'];

        $db = mysql_connect('localhost', 'root', '') or die( mysql_error() );
        mysql_select_db( 'netw_data', $db ) or die( mysql_error() );
        $q = 'SELECT id FROM users WHERE id_code="'.$idCode.'" AND organization="'.$country.'"';
        $res = mysql_query($q);

        if(mysql_num_rows($res)){
            $user_ID = mysql_fetch_assoc($res)['id'];
        }
        else {
            $q = 'INSERT INTO `users`(`id_code`, `name`, `dateofbirth`, `organization`)'.
                 'VALUES ("'.$idCode.'","'.$_SESSION['user']['firstName'].' '.$_SESSION['user']['lastName'].'","'.$dob.'","'.$country.'")';

            $res = mysql_query($q);
            $user_ID = mysql_insert_id();
        }

        $_SESSION['user']['DateOfBirth'] = $dob;
        $_SESSION['user']['id'] = $user_ID;
        echo json_encode($_SESSION['user']);
    }
}