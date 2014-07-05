<?php

function getPasswd() {

    // Initial passwprd variable initialized
    $passwd = "";
    // Set password length
    $numPassWords = 5;
    // Open external file containing list of works
    $file = new SplFileObject('wordlist.txt');
    // Set max word list of external file
    $maxFileWords = 58000;
    // Loop count = requested password length
    for($i = 0; $i < $numPassWords; $i++) {
        // Determine random int to determine which word to retrieve
        $fileLine = rand(1,$maxFileWords);
        // Open external file and go to specified line
        $file->seek($fileLine-1);
        // Append word to existing passwd string
        $passwd = $passwd.trim($file->current());
        // If loop continuing, add a "-" between words
        if ($i < ($numPassWords - 1)) {
            $passwd = $passwd."-";
        };
    }
    // Return passwd
    return $passwd;
}


