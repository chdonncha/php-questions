<?php

PrimeNumbers();

function PrimeNumbers()
{
    $numbers = array_map(function ($values) {
        return $values;
    }, range(1, 100));

    foreach ($numbers as &$number) {

        $multiples = null;

        // Get multiples
        for ($i = 1; $i <= 100; $i++) {
            if ($i % $number === 0) {
                $multiples .= $i . ",";
            }
        }

        $multiples = substr($multiples, 0, -1);

        if ($multiples == $number) {
            $number = $number . "[PRIME] \n";
        } else {
            $number = $number . " (" . $multiples . ") \n";
        }
    }

    echo implode(' ', $numbers);
}