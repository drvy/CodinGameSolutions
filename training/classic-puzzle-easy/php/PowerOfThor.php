<?php
/**
 * Your program must allow Thor to reach the light of power.
 * 
 * Thor moves on a map which is 40 wide by 18 high. Note that the coordinates 
 * (X and Y) start at the top left! This means the most top left cell has the 
 * coordinates "X=0,Y=0" and the most bottom right one has the coordinates 
 * "X=39,Y=17".
 * 
 * Once the program starts you are given:
 * the variable lightX: the X position of the light of power Thor must reach.
 * the variable lightY: the Y position of the light of power Thor must reach.
 * the variable initialTX: the starting X position of Thor.
 * the variable initialTY: the starting Y position of Thor.
 * 
 * At the end of the game turn, you must output the direction in which you 
 * want Thor to go among:
 * 
 * N (North)
 * NE (North-East)
 * E (East)
 * SE (South-East)
 * S (South)
 * SW (South-West)
 * W (West)
 * NW (North-West)
 * 
 * The program must first read the initialization data from the standard input, 
 * then, in an infinite loop, provides on the standard output the instructions 
 * to move Thor.
 * 
 * Initialization input
 * Line 1: 4 integers lightX lightY initialTX initialTY. 
 * (lightX, lightY) indicates the position of the light. 
 * (initialTX, initialTY) indicates the initial position of Thor.
 * 
 * Input for a game round
 * Line 1: the number of remaining moves for Thor to reach the light of power: 
 * remainingTurns. You can ignore this data but you must read it.
 * 
 * Output for a game round
 * A single line providing the move to be made: N NE E SE S SW W or NW
 * 
 * Constraints
 * 0 ≤ lightX < 40
 * 0 ≤ lightY < 18
 * 0 ≤ initialTX < 40
 * 0 ≤ initialTY < 18
 * Response time for a game round ≤ 100ms
 * 
 * https://www.codingame.com/training/easy/power-of-thor-episode-1
 * 
 * @author Dragomir Yordanov (@drvymonkey)
 * @copyright The MIT Licence.
 */

fscanf(STDIN, "%d %d %d %d",
    $LX, // the X position of the light of power
    $LY, // the Y position of the light of power
    $TX, // Thor's starting X position
    $TY // Thor's starting Y position
);

// The game loop
while (TRUE){

    fscanf(STDIN, "%d", $E); // p energy.

    # nw   N    ne
    #     W E
    # sw   S    se

    if($LX < $TX && $LY < $TY){
        $res = 'NW';
        $TX--; $TY--;
    }

    elseif($LX > $TX && $LY > $TY){
        $res = 'SE'; 
        $TX++; $TY++; 
    }

    elseif($LX < $TX && $LY > $TY){
        $res = 'SW'; 
        $TX--; $TY++; 
    }

    elseif($LX > $TX && $LY < $TY){
        $res = 'NS';
        $TX++; $TY--; 
    }

    elseif($LX < $TX) {
        $res = 'W';
        $TX--; 
    }

    elseif($LX > $TX) {
        $res = 'E'; 
        $TX++;
    }

    elseif($LY > $TY) {
        $res = 'S'; 
        $TY++;
    }

    elseif($LY < $TY) {
        $res = 'N'; 
        $TY--;
    }

    echo $res, "\n";
}