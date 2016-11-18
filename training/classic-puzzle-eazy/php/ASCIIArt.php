<?php
/**
 * ASCII art allows you to represent forms by using characters. To be precise, 
 * in our case, these forms are words. 
 * For example, the word "MANHATTAN" could be displayed as follows in ASCII art: 
 * 
 *  # #  #  ### # #  #  ### ###  #  ###
 *  ### # # # # # # # #  #   #  # # # #
 *  ### ### # # ### ###  #   #  ### # #
 *  # # # # # # # # # #  #   #  # # # #
 *  # # # # # # # # # #  #   #  # # # #
 *  
 * ​Your mission is to write a program that can display a line of text in 
 * ASCII art in a style you are given as input.
 * 
 * Input:
 * Line 1: the width L of a letter represented in ASCII art.
 * All letters are the same width.
 * 
 * Line 2: the height H of a letter represented in ASCII art. 
 * All letters are the same height.
 * 
 * Line 3: The line of text T, composed of N ASCII characters.
 * Following lines: the string of characters ABCDEFGHIJKLMNOPQRSTUVWXYZ? 
 * Represented in ASCII art.
 * 
 * Output:
 * The text T in ASCII art.
 * The characters a to z are shown in ASCII art by their equivalent in 
 * upper case.
 * 
 * The characters that are not in the intervals [a-z] or [A-Z] will be shown as 
 * a question mark in ASCII art.
 * 
 * Constraints:
 * 0 < L < 30
 * 0 < H < 30 
 * 0 < N < 200
 * 
 * @author Dragomir Yordanov (@drvymonkey)
 * @copyright The MIT Licence.
 */

fscanf(STDIN, "%d",$letterWidth); // Ascii letter width.
fscanf(STDIN, "%d",$letterHeight); // Ascii letter height
$text = stream_get_line(STDIN, 256, "\n"); // The text to display.

/**
 * Detect the (first) position of a character in a given charset. 
 * If not present, return the position of the last character.
 *
 * @param      string   $char     The character (Needle)
 * @param      string   $charset  The charset (Haystack)
 * @return     integer            The position
 */
function characterPos($char, $charset){
    $position = strpos(strtolower($charset), strtolower($char));
    if($position===false){ return strlen($charset)-1; }
    return $position;
}

$charset = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ?'; // Charset provided by the game.
$letterRow = array(); // Container for the ascii raw letters.

// Get raw ascii and set a sorted array with each row and letter.
for ($i = 0; $i < $letterHeight; ++$i){    
    $row = stream_get_line(STDIN, 1024, "\n");
    $letterRow[] = str_split($row, $letterWidth);
}

// Split the text to letters.
$text = str_split($text);

// Display characters
foreach($letterRow as $letters){
    foreach($text as $character){
        echo $letters[characterPos($character, $charset)];
    }
    
    echo "\n";
}