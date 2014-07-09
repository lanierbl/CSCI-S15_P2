# P2 - Brent Lanier - CSCI S-15 (Summer 2014)

## PROD URL
<http://p2.cscis15.lanier.us/>

## P2 Description
XKCD Password Generator - Generates (word-based) strong passwords based on variety of options

## Details for Instructor(s)
I have incorporated Ajax and JSON into my submission of P2.

I haven't worked with either of these two technologies until this exercise and wanted to do some research to see how it deferred from the FORMS POST process that we have discussed in class.

It was a challenge to get the syntax right (I've spent many an hour looking at past Stackoverflow postings) but I'm happy to report that it is working by design.  It's nice not to have the POST confirmation dialogs anymore!

The wordlist (used by the password generator) was the 85K list posted on Piazza.  I'm using a big loop that randomly picks a line for the word out of the word list (# of loops based on the # of words selected by the user).

In addition to # of words selected (2-8), additional options include:  ALL UPPER-CASE, all lower-Case, first character of each work upper-case, upper-case only the first character of the first word, special characters, numbers in password, and max-length of password (1-99 characters).

## Outside code
* jQuery: http://jquery.com
* Stack Overflow: http://www.stackoverflow.com