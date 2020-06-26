<?php

function capitalize(string $string): array
{
    $chars  = mb_str_split($string);
    $result = array('', '');

    foreach ($chars as $index => $letter) {
        $isOdd = ($index % 2 === 0 ? 1 : 0);

        $result[$isOdd] .= $letter;
        $result[(1 - $isOdd)] .= strtoupper($letter);
    }

    return $result;
}

var_dump(capitalize('abcdef'));
