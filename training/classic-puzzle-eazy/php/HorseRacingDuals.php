<?php
/**
 * Casablanca’s hippodrome is organizing a new type of horse racing: duals. 
 * During a dual, only two horses will participate in the race. In order for 
 * the race to be interesting, it is necessary to try to select two horses 
 * with similar strength.
 * 
 * Write a program which, using a given number of strengths, 
 * identifies the two closest strengths and shows their difference 
 * with an integer (≥ 0).
 * 
 * Input
 * Line 1: Number N of horses
 * The N following lines: the strength Pi of each horse. Pi is an integer.
 * 
 * Output
 * The difference D between the two closest strengths. D is an integer 
 * greater than or equal to 0.
 * 
 * Constraints
 * 1 < N  < 100000
 * 0 < Pi ≤ 10000000
 * 
 * @author Dragomir Yordanov (@drvymonkey)
 * @copyright The MIT Licence.
 */

fscanf(STDIN, "%d", $N); // Number of horses
$horses = array(); // Container for all the horses

for ($i = 0; $i < $N; ++$i){
    
    fscanf(STDIN, "%d",$Pi); // Strength of the horse
    $horses[$Pi] = $Pi; // Set index to $Pi to prevent duplicates.
    
}

// Reverse sort all the horses
rsort($horses);

// Max difference is 10000000
for($i=0, $difference=10000000; $i < ($N-1); ++$i){
    $_dif = ($horses[$i] - $horses[$i+1]);
    if($_dif < $difference){ $difference = $_dif; }
}


echo $difference, "\n";
