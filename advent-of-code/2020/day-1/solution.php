<?php

namespace AdventOfCode2020;

/**
 * Returns the result multiplicating the 2 and 3 numbers that sum to
 * the target. (1721 + 299 = [2020] => 514579)
 *
 * @param array $input
 * @param integer $target
 * @return array
 */
function reportRepair(array $input, int $target = 2020): array
{
    $length = count($input);
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
                continue;
            }

            if ($sum < $target) {
                $diff = ($target - $sum);
                $c    = array_search($diff, $input);

                if ($c !== false) {
                    $result['B']  = $numA * $numB * (int) $input[$c];
                }
            }
        }
    }

    return $result;
}

$input  = file('input.txt');
$result = reportRepair($input, 2020);

// 1016964 | 182588480
echo "Result A: {$result['A']}\nResult B: {$result['B']}\n";
