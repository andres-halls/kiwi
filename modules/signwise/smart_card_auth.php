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
        $dob = $idCodeToDate->doMagicWithPersonalcode()['DateOfBirth'];

        $_SESSION['user']['DateOfBirth'] = $dob;
        echo json_encode($_SESSION['user']);
    }
}