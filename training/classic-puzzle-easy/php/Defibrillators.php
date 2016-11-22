<?php
/**
 * The city of Montpellier has equipped its streets with defibrillators to help 
 * save victims of cardiac arrests. The data corresponding to the position of 
 * all defibrillators is available online.
 * 
 * Based on the data we provide in the tests, write a program that will allow 
 * users to find the defibrillator nearest to their location using their 
 * mobile phone.
 * 
 * Within an infinite loop, read the heights of the mountains from the standard 
 * input and print to the standard output the index of the mountain to shoot.
 * 
 * The input data you require for your program is provided in text format.
 * This data is comprised of lines, each of which represents a defibrillator.
 * Each defibrillator is represented by the following fields:
 * A number identifying the defibrillator
 * Name
 * Address
 * Contact Phone number
 * Longitude (degrees)
 * Latitude (degrees)
 * 
 * These fields are separated by a semicolon (;).
 * Beware: the decimal numbers use the comma (,) as decimal separator. 
 * Remember to turn the comma (,) into dot (.) if necessary in order to use 
 * the data in your program.
 * 
 * The distance (d) between two points A and B will be calculated using the
 * following formula: https://en.wikipedia.org/wiki/Haversine_formula
 * 
 * Note: In this formula, the latitudes and longitudes are expressed in radians.
 * 6371 corresponds to the radius of the earth in km.
 * 
 * The program will display the name of the defibrillator located the closest 
 * to the user’s position. This position is given as input to the program.
 * 
 * Input
 * Line 1: User's longitude (in degrees)
 * Line 2: User's latitude (in degrees)
 * Line 3: The number N of defibrillators located in the streets of Montpellier
 * N next lines: a description of each defibrillator
 * 
 * Output
 * The name of the defibrillator located the closest to the user’s position.
 * 
 * Constraints
 * 0 < N < 10000
 * 
 * https://www.codingame.com/training/easy/defibrillators
 * 
 * @author Dragomir Yordanov (@drvymonkey)
 * @copyright The MIT Licence.
 */

fscanf(STDIN, "%s", $LON); // User's longitude in degrees
fscanf(STDIN, "%s", $LAT); // User's latitude in degrees
fscanf(STDIN, "%d", $NUM); // Total number oof defibrillators

// Set User's position as an array and replace commas with dots.
$userPosition = array(
    'lat' => str_replace(',', '.', $LAT),
    'lon' => str_replace(',', '.', $LON)
);

/**
 * Calculates a distance between two coordinates using the Haversine
 * formula. Formula may be a bit inacurate but its the same from the
 * problem description.
 *
 * @param      array   $from    Coordinates (lat,lon) for the first position.
 * @param      array   $to      Coordinates (lat,lon) for the second position.
 * @param      integer $radius  Earth's radius (6371 may be inacurate)
 * @return     integer          The distance in meters.
 */
function haversine($from, $to, $radius=63710000){
    $latFrom = deg2rad($from['lat']);
    $lonFrom = deg2rad($from['lon']);
    $latTo = deg2rad($to['lat']);
    $lonTo = deg2rad($to['lon']);
    
    $latD = $latTo - $latFrom;
    $lonD = $lonTo - $lonFrom;
    
    $angle = 2 * asin(sqrt(pow(sin($latD / 2), 2) +
    cos($latFrom) * cos($latTo) * pow(sin($lonD / 2), 2)));
    return $angle * $radius;
}

// Get each defibrillator, put him in the array and
// calculate the distance between it and the user.
for ($i = 0, $defibrillators = array(); $i < $NUM; $i++){
    
    $DEFIB = stream_get_line(STDIN, 256 + 1, "\n");
    $DEFIB = explode(';', $DEFIB);
    
    // Set a nice array for each defibrillator
    $defibrillators[$i] = array(
        'id' => $DEFIB[0],
        'name' => $DEFIB[1],
        'address' => $DEFIB[2],
        'phone' => $DEFIB[3],
        'position' => array(
            'lon' => str_replace(',','.',$DEFIB[4]),
            'lat' => str_replace(',','.',$DEFIB[5])
        ),
    );
    
    // Calculate the distance between the user and the defibrillator
    $defibrillators[$i]['distance'] = haversine($userPosition, $defibrillators[$i]['position']);
    
}

// Sort the array of defibrillators by distance (closest first) via lambda usort.
usort($defibrillators, function($a, $b){ return $a['distance']-$b['distance']; });

// Print the name of the first (closest) defibrillator in the array.
echo $defibrillators[0]['name'], "\n";