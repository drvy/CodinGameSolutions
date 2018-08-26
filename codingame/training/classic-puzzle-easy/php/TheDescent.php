<?php
/**
 * Destroy the mountains before your starship collides with one of them. 
 * For that, shoot the highest mountain on your path.
 * 
 * At the start of each game turn, you are given the height of the 8 mountains
 * from left to right. By the end of the game turn, you must fire on the 
 * highest mountain by outputting its index (from 0 to 7). Firing on a mountain 
 * will only destroy part of it, reducing its height.  Your ship descends after 
 * each pass.
 * 
 * Within an infinite loop, read the heights of the mountains from the standard 
 * input and print to the standard output the index of the mountain to shoot.
 * 
 * Input for one game turn:
 * 8 lines: one integer mountainH per line. Each represents the height of one 
 * mountain given in the order of their index (from 0 to 7).
 * 
 * Output for one game turn:
 * A single line with one integer for the index of which mountain to shoot.
 * 
 * Constraints:
 * 0 ≤ mountainH ≤ 9
 * Response time per turn ≤ 100ms
 * 
 * https://www.codingame.com/training/easy/the-descent
 * 
 * @author Dragomir Yordanov (@drvymonkey)
 * @copyright The MIT Licence.
 */

// game loop
while (TRUE){

    // $i = One mountain's index.
    // $hIndex = The index of the highest mountain.
    // $hHeight = The height of the highest mountain.
    for ($i=0, $hIndex=0, $hHeight=0; $i < 8; $i++){

        fscanf(STDIN, "%d", $height); // Height of the mountain.
        
        if($height > $hHeight){
            $hIndex = $i;
            $hHeight = $height;
        }

        continue;
    }

    echo $hIndex, "\n";
}
