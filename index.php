<?php
error_reporting(-1); # Report all PHP errors
ini_set('display_errors', 1);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Brent Lanier - P2 - CSCI S-15 (Summer 2014)</title>

    <link rel='stylesheet' href='style.css' type='text/css'>

</head>

<body>

    <form method="post" action="logic.php">

        Password Length: 0<input type="range" name="numPassWords" min="1" max="10">10
        <input type="submit" value="Submit" />

    </form>

    <h1><? echo $passwd ?></h1>

</body>
</html>