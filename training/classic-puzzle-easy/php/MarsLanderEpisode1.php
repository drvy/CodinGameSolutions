<?php
/**
 * The goal for your program is to safely land the "Mars Lander" shuttle, 
 * the landing ship which contains the Opportunity rover. Mars Lander is guided 
 * by a program, and right now the failure rate for landing on the NASA 
 * simulator is unacceptable.
 * 
 * Note that it may look like a difficult problem, but in reality the problem 
 * is easy to solve. This puzzle is the first level among three, therefore, 
 * we need to present you some controls you won't need in order to complete 
 * this first level. Built as a game, the simulator puts Mars Lander on a 
 * limited zone of Mars sky.
 * 
 * Every second, depending on the current flight parameters (location, speed, 
 * fuel ...), the program must provide the new desired tilt angle and thrust 
 * power of Mars Lander.
 * 
 * The game simulates a free fall without atmosphere. Gravity on Mars is 
 * 3.711 m/s² . For a thrust power of X, a push force equivalent to X m/s² 
 * is generated and X liters of fuel are consumed. As such, a thrust power 
 * of 4 in an almost vertical position is needed to compensate for the gravity 
 * on Mars.
 * 
 * For a landing to be successful, the ship must:
 * land on flat ground
 * land in a vertical position (tilt angle = 0°)
 * vertical speed must be limited ( ≤ 40m/s in absolute value)
 * horizontal speed must be limited ( ≤ 20m/s in absolute value)
 * 
 * Remember that this puzzle was simplified:
 * the landing zone is just below the shuttle. You can therefore ignore rotation 
 * and always output 0 as the target angle. you don't need to store the 
 * coordinates of the surface of Mars to succeed. You only need your vertical 
 * landing speed to be between 0 and 40m/s – your horizontal speed being nil.
 * As the shuttle falls, the vertical speed is negative. As the shuttle flies 
 * upward, the vertical speed is positive.
 * 
 * Initialization input
 * Line 1: the number surfaceN of points used to draw the surface of Mars.
 * 
 * Next surfaceN lines: a couple of integers landX landY providing the 
 * coordinates of a ground point. By linking all6 the points together in a 
 * sequential fashion, you form the surface of Mars which is composed of 
 * several segments. For the first point, landX = 0 and for the last point, 
 * landX = 6999
 * 
 * Input for one game turn
 * A single line with 7 integers: X Y hSpeed vSpeed fuel rotate power X,Y are 
 * the coordinates of Mars Lander (in meters). hSpeed and vSpeed are the 
 * horizontal and vertical speed of Mars Lander (in m/s). These can be negative 
 * depending on the direction of Mars Lander. Fuel is the remaining quantity of 
 * fuel in liters. When there is no more fuel, the power of thrusters falls to 
 * zero. Rotate is the angle of rotation of Mars Lander expressed in degrees.
 * Power is the thrust power of the landing ship.
 * 
 * Output for one game turn
 * A single line with 2 integers: rotate power : rotate is the desired rotation 
 * angle for Mars Lander. Please note that for each turn the actual value of the 
 * angle is limited to the value of the previous turn +/- 15°. power is the 
 * desired thrust power. 0 = off. 4 = maximum power. Please note that for each 
 * turn the value of the actual power is limited to the value of the previous 
 * turn +/- 1.
 * 
 * Constraints
 * 2 ≤ surfaceN < 30
 * 0 ≤ X < 7000
 * 0 ≤ Y < 3000
 * -500 < hSpeed, vSpeed < 500
 * 0 ≤ fuel ≤ 2000
 * -90 ≤ rotate ≤ 90
 * 0 ≤ power ≤ 4
 * Response time per turn ≤ 100ms
 * 
 * https://www.codingame.com/training/easy/mars-lander-episode-1
 * 
 * @author Dragomir Yordanov (@drvymonkey)
 * @copyright The MIT Licence.
 */

fscanf(STDIN, "%d", $N); // The number of points used to draw the surface.

for ($i = 0, $terrain = array(); $i < $N; ++$i){
    
    // Here we get the coordinates of mars.
    // By linking all the points together in a 
    // sequential fashion, we form the surface of Mars.
    
    fscanf(STDIN, "%d %d",
        $LAND_X, // X coordinate of a surface point. (0 to 6999)
        $LAND_Y // Y coordinate of a surface point.  (0 to 3000)
    );
    
    // We don't need the terrain build for this exercise tho.
    //$terrain[$i] = array('x'=>$LAND_X, 'y'=>$LAND_Y);
}

// The game loop
while (TRUE){

    fscanf(STDIN, "%d %d %d %d %d %d %d",
        $X, // X Coordinates of Mars Lander in meters.
        $Y, // Y Coordinates of Mars Lander in meters.
        $HS, // the horizontal speed (in m/s), can be negative.
        $VS, // the vertical speed (in m/s), can be negative.
        $F, // the quantity of remaining fuel in liters.
        $R, // the rotation angle in degrees (-90 to 90).
        $P // the thrust power (0 to 4).
    );

    $power = (int) abs($P);
    $v_speed = (int) abs($VS);
    
    // Vertical Speed should be limited to < 40m/s
    $power = ($v_speed >= 40 ? $power+1 : $power-1);
    
    // Power can't go higher than 4 or lower than 0.
    if($power > 4) { $power = 4; }
    elseif($power < 0) { $power = 0; }
    
    echo '0 ',$power, "\n";
}