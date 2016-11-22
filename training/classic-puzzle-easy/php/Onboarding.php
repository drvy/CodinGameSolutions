<?php
/**
 * Your program must destroy the enemy ships by shooting the closest enemy on 
 * each turn.
 * 
 * On each start of turn (within the game loop), you obtain information on the 
 * two closest enemies:
 * 
 * enemy1 and dist1: the name and the distance to enemy 1.
 * enemy2 and dist2: the name and the distance to enemy 2.
 * 
 * Before your turn is over (end of the loop), output the value of either enemy1
 * or enemy2 to shoot the closest enemy.
 * 
 * https://www.codingame.com/training/easy/onboarding
 * 
 * @author Dragomir Yordanov (@drvymonkey)
 * @copyright The MIT Licence.
 */

// The game loop
while(true){
    
    for ($i=0, $target=null, $lastDist=null; $i < 2; ++$i){
        
        fscanf(STDIN, "%s", $enemyName); // Name of the next enemy
        fscanf(STDIN, "%d", $enemyDist); // Distance of the next enemy
        
        if($enemyDist < $lastDist || $target==null){
            $target = $enemyName;
            $lastDist = $enemyDist;
        }
    }
    
    echo $target, "\n"; // Print closest target.
}
