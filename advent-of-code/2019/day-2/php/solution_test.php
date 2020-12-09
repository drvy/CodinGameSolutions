<?php

require_once 'IntcodeComputer.php';
use aoc\day2\php\IntcodeComputer as IntcodeComputer;

class IntcodeComputerTest extends PHPUnit\Framework\TestCase
{
    private $cmp;

    public function setUp() : void
    {
        $this->cmp = new IntcodeComputer();
    }

    public function runProgram(string $memory) : string
    {
        $this->cmp->setMem($memory);
        $this->cmp->execute();
        return $this->cmp->getMem();
    }


    public function testSimpleCaseA()
    {
        $this->assertEquals('2,0,0,0,99', $this->runProgram('1,0,0,0,99'));
    }

    public function testSimpleCaseB()
    {
        $this->assertEquals('30,1,1,4,2,5,6,0,99', $this->runProgram('1,1,1,4,99,5,6,0,99'))
    }

    public function testSimpleCaseC()
    {
        $this->assertEquals('2,4,4,5,99,9801', $this->runProgram('2,4,4,5,99,0'));
    }

    public function testIntroductionCase()
    {
        $this->assertEquals('3500,9,10,70,2,3,11,0,99,30,40,50', $this->runProgram('1,9,10,3,2,3,11,0,99,30,40,50'));
    }


}
