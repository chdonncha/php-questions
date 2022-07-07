<?php

AsciiArray();

// prints the differing character(s) when comparing the difference of two strings
function AsciiArray()
{
    $ascii1 = ",";
    $ascii2 = "|";

    $asciiValue1 = ord($ascii1);
    $asciiValue2 = ord($ascii2);

    $asciiNumbers = null;
    $asciiCharacters = "";

    // Generate all ascii characeters between $ascii1 and $ascii2
    foreach (range($asciiValue1, $asciiValue2) as $number) {
        $asciiCharacters .= chr($number);
    }

    // get random number and remove character
    $randomNumber = rand(0, strlen($asciiCharacters) - 1);

    $newAsciiCharacters = substr_replace(
        $asciiCharacters,
        "",
        $randomNumber,
        1
    );

    $diff = findStringDifference($asciiCharacters, $newAsciiCharacters);

    echo implode("", $diff);
}

function findStringDifference($old, $new)
{
    $from_start = strspn($old ^ $new, "\0");
    $from_end = strspn(strrev($old) ^ strrev($new), "\0");

    $old_end = strlen($old) - $from_end;

    $difference = substr($old, $from_start, $old_end - $from_start);

    return array($difference);
}