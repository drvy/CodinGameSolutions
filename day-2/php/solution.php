<?php

use php\IntcodeComputer;

require 'IntcodeComputer.php';


$cmp = new IntcodeComputer('1,9,10,3,2,3,11,0,99,30,40,50');
echo $cmp->getMem(), PHP_EOL;

echo var_dump(
    $cmp->parseInstruction(),
    $cmp->parseInstruction(),
    $cmp->parseInstruction(),
    $cmp->parseInstruction(),
), PHP_EOL;

echo $cmp->getMem(), PHP_EOL;
