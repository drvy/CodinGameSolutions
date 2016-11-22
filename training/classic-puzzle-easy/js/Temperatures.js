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
 * https://www.codingame.com/training/easy/temperatures
 * 
 * @author Dragomir Yordanov (@drvymonkey)
 * @copyright The MIT Licence.
 */

// the number of temperatures to analyse
var n = parseInt(readline());

// the n temperatures expressed as integers ranging from -273 to 5526
var temps = readline();

// Continue only if there are temperatures provided.
if(temps.length > 0 && typeof temps !== undefined){
    
    // Temperatures provided are separated by a space. Make them array.
    var temperatures = temps.split(' ');
    
    // Sort all temps as numeric so the negatives come first.
    temperatures = temperatures.sort(function(a,b){ return a-b; });
    
    // Find the closest one by substracting and comparing.
    for(var i=0, closest=null, tlen=temperatures.length; i < tlen; ++i){
        
        var temp = parseInt(temperatures[i]);
        
        var compare_a = Math.abs(0 - closest);
        var campare_b = Math.abs(temp - 0);
        
        if(closest === null || compare_a > campare_b || Math.abs(closest + temp) === 0){
            closest = temp;
        }
        
    }
    
    print(closest);
    
} 

else { print(0); }