<?php
error_reporting(-1); # Report all PHP errors
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Brent Lanier - P2 - CSCI S-15 (Summer 2014)</title>
    <!--      Include PHP logic file       -->
    <?php require 'logic.php' ?>

    <link rel='stylesheet' href='style.css' type='text/css'>

</head>

<body>

    <h1><?php echo getPasswd() ?></h1>

</body>
</html>