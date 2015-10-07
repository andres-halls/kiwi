<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>ERES</title>

    <!-- jQuery -->
    <script type="text/javascript" src="lib/jquery/jquery-2.1.4.min.js"></script>

    <!-- Bootstrap -->
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/bootstrap.min.css"/>
    <link rel="stylesheet" type="text/css" href="lib/bootstrap/bootstrap-theme.min.css"/>
    <script type="text/javascript" src="lib/bootstrap/bootstrap.min.js"></script>

    <!-- Select2 -->
    <link rel="stylesheet" type="text/css" href="lib/select2/select2.css" />
    <link rel="stylesheet" type="text/css" href="lib/select2/select2-bootstrap.css" />
    <script type="text/javascript" src="lib/select2/select2.min.js"></script>

    <!-- Knockout -->
    <script type="text/javascript" src="lib/knockout-3.3.0.js"></script>

    <!-- Sammy -->
    <script type="text/javascript" src="lib/sammy-0.7.6.min.js"></script>

    <!-- SignWise -->
    <script type="text/javascript" src="lib/signwise.js"></script>

    <!-- Site JS & CSS -->
    <link rel="stylesheet" type="text/css" href="css/landingpage.css"/>
    <script type="text/javascript" src="js/home.js"></script>
    <script type="text/javascript" src="js/profile.js"></script>
    <script type="text/javascript" src="js/nav.js"></script>
    <script type="text/javascript" src="js/init.js"></script>
</head>
<body>
<div id="page_container">
    <?php

        require("components/home.php");
        require("components/profile.php");

    ?>
</div>
</body>
</html>