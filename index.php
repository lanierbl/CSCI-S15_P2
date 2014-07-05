<?php
error_reporting(-1); # Report all PHP errors
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Brent Lanier - P2 - CSCI S-15 (Summer 2014)</title>

    <?php require 'logic.php' ?>

    <link rel='stylesheet' href='style.css' type='text/css'>

</head>

<body>

    <form method="post" action="index.php">

        Password Length: 1<input type="range" name="numPassWords" min="1" max="8" step="1">8
        <input type="submit" value="Submit" />

    </form>

    <h1><? echo getPasswd() ?></h1>

</body>
</html>