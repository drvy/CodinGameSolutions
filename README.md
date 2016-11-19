# CodinGameSolutions
CodinGame solutions in various programming languages. Aims to help with the exercises or to show alternative methods of 
solving a problem in the game.

- [codingame.com - Play with Programming](https://www.codingame.com)

# Contributing
Feel free to contribute to this repository by adding a solution to a unsolved exercise or improving other's solutions.
Do not solve the problem 2 times with different solutions. Just improve the existing one.
Categorize your solution under the correspondent directory.

## How

- Add your solution under the correct directory. If it doesn't exist, create it.
- Start with a comment section describing the problem and the rules (provided by CodinGame)
- Add @author and @license tags to that comment section.
- If you're improving another solution, add your name in the @author tag.
- Put all the code required to solve the exercise including the one provided by the game.
- You can ignore generic comments (like the one's suggesting debug).
- Use clear code. Not necessary a standard code but a clear one. _Shorter and unreadable is NOT better_.
- Try to optimize the code for the least execution time but remember that readability is better than fast.

- The solution should complete all of the achievements presented in the exercise unless one of the those
is a requiring you to solve it in another language (such as Horse Racing Duals.)

### Example of a solution template:
```php
<?php
/**
 * Problem description.
 * 
 * Tips and Rules.
 * 
 * Initialization input
 * Input for a game round
 * Output for a game round
 * 
 * Constraints
 *
 * CodinGame URL to the exercise
 * 
 * @author Your name here
 * @copyright The license (MIT if possible)
 */

fscanf(STDIN, "%d %d %d %d",); // Getting some variables
while(TRUE){} // Game loop and other things.
echo 'SOLUTION', "\n";
```
