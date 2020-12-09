<?php

$input  = file('input.txt');
$result = array('A' => 0, 'B' => 0);

foreach ($input as $line) {
    preg_match('/(\d+)-(\d+) ([a-z]+): (\w+)/', $line, $output);
    list($capture, $min, $max, $char, $password) = $output;

    // Part 1
    $count = substr_count($password, $char);

    if ($count >= $min && $count <= $max) {
        $result['A']++;
    }

    // Part 2
    $posA = (isset($password[$min - 1]) ? $password[$min - 1] : null);
    $posB = (isset($password[$max - 1]) ? $password[$max - 1] : null);

    if (($posA === $char && $posB !== $char) || ($posB === $char && $posA !== $char)) {
        $result['B']++;
    }
}

// 636 | 588
echo "Result A: {$result['A']}\nResult B: {$result['B']}\n";
