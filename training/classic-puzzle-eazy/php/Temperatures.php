<?php
/**
 * In this exercise, you have to analyze records of temperature to find the 
 * closest to zero.
 * 
 * Write a program that prints the temperature closest to 0 among input data. 
 * If two numbers are equally close to zero, positive integer has to be 
 * considered closest to zero (for instance, if the temperatures are -5 and 5, 
 * then display 5).
 * 
 * Game Input
 * Your program must read the data from the standard input and write the result 
 * on the standard output.
 * 
 * Input:
 * Line 1: N, the number of temperatures to analyze
 * Line 2: A string with the N temperatures expressed as integers ranging 
 * from -273 to 5526
 * 
 * Output:
 * Display 0 (zero) if no temperatures are provided. Otherwise, display the 
 * temperature closest to 0.
 * 
 * Constraints
 * 0 ≤ N < 10000
 * 
 * @author Dragomir Yordanov (@drvymonkey)
 * @copyright The MIT Licence.
 */

fscanf(STDIN, "%d", $N); // N of temperatures

// the N temperatures expressed as integers ranging from -273 to 5526
$TEMPS = stream_get_line(STDIN, 256, "\n");

// If there are no temperatures, print 0.
if($N < 1 || empty($TEMPS)){ die("0\n"); }

// Temperatures provided are separated by a space. Make them array.
$temps = explode(' ', $TEMPS);

// Sort all temps as numeric so the negatives come first.
sort($temps, SORT_NUMERIC);

// Find the closest one by susctracting and comparing.
$closest = null;
foreach($temps as $temp){

    $compare_a = abs(0 - $closest);
    $compare_b = abs($temp - 0);
    
    if($closest===null || $compare_a > $compare_b || abs($closest+$temp) == 0){
        $closest = $temp;
    }
}

echo $closest, "\n";