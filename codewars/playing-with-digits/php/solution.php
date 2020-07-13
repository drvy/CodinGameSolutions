<?php

function digPow(int $n, int $p): int
{
    $sum    = 0;
    $digits = str_split((string) $n);

    foreach ($digits as $index => $digit) {
        $sum += pow($digit, $p + $index);
    }

    return ($sum % $n ? -1 : $sum / $n);
}


var_dump(digPow(89, 1), 1);
var_dump(digPow(92, 1), -1);
var_dump(digPow(46288, 3), 51);
