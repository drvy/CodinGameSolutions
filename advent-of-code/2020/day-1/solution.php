<?php

$input  = file('input.txt');
$length = count($input);
$target = 2020;
$result = array('A' => 0, 'B' => 0);

for ($a = 0; $a < $length; ++$a) {
    $numA = (int) $input[$a];

    if ($numA > $target) {
        continue;
    }

    for ($b = 0; $b < $length; ++$b) {
        $numB = (int) $input[$b];

        if ($numB > $target) {
            continue;
        }

        $sum = ($numA + $numB);

        if ($sum === $target) {
            $result['A'] = $numA * $numB;
        } elseif ($sum < $target) {
            $diff = ($target - $sum);
            $c    = array_search($diff, $input);
            $numC = (int) $input[$c];

            if ($c) {
                $result['B'] = $numA * $numB * $numC;
            }
        }
    }
}

// 1016964 | 182588480
echo "Result A: {$result['A']}\nResult B: {$result['B']}\n";
