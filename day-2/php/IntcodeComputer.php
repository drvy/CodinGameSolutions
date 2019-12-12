<?php

namespace aoc\day2\php;

class IntcodeComputer
{
    private $memory = array();
    private $instruction = '';
    private $pointer = 0;

    /**
     * Load instructions and general program options.
     *
     * @param string $instructions
     */
    public function __construct(string $memory = null)
    {
        if (!empty($memory)) {
            $this->setMem($memory);
        }
    }


    /**
     * Returns current memory.
     *
     * @return string
     */
    public function getMem() : string
    {
        return implode(',', $this->memory);
    }


    public function setMem(string $memory = null) : bool
    {
        if (empty($memory)) {
            throw new \InvalidArgumentException('setMem argument cannot be empty.');
        }

        $tmp_memory = explode(',', $memory);

        if (!is_array($tmp_memory) || empty($tmp_memory)) {
            throw new \InvalidArgumentException('Invalid or empty memory supplied.');
        }

        echo "debug: --- Memory set ", implode(',', $tmp_memory), PHP_EOL;

        $this->memory =& $tmp_memory;
        unset($tmp_memory);

        return true;
    }


    /**
     * Get position's value inside the memory. Supports referenced positions.

     * @param integer $pos
     * @param boolean $ref - Will try to find the value of the position's value.
     * @return integer
     */
    public function getMemPos(int $pos, bool $ref = false) : int
    {
        if (!isset($this->memory[$pos])) {
            throw new \InvalidArgumentException("Invalid memory position: {$pos}.");
        }

        $pos = $this->memory[$pos];
        return ($ref ? $this->getMemPos($pos, false) : $pos);
    }


    /**
     * Tries to set the value of a position inside the memory. Supports referenced positions.
     *
     * @param integer $pos
     * @param integer $value
     * @param boolean $ref - Will try to set the value of the position's value.
     * @return boolean
     */
    public function setMemPos(int $pos, int $value, bool $ref = false) : bool
    {
        if (!isset($this->memory[$pos])) {
            throw new \InvalidArgumentException("Invalid instruction position: {$pos}.");
        }

        echo "debug: --- Set position {$pos} ref: ", ($ref ? 'yes' : 'no'), ",", PHP_EOL;

        $pos = ($ref ? $this->getMemPos($pos, false) : $pos);
        $this->memory[$pos] = $value;

        return true;
    }


    public function parseInstruction() : bool
    {
        $operation = $this->getMemPos($this->pointer, false);

        if ($operation === 99) {
            return false;
        }

        $param_a = $this->getMemPos($this->pointer + 1, true);
        $param_b = $this->getMemPos($this->pointer + 2, true);
        $output  = $this->getMemPos($this->pointer + 3, false);

        echo "Attempting opcode: {$operation}, ";
        echo "{$param_a}(", $this->memory[$this->pointer + 1], "), ";
        echo "{$param_b}(", $this->memory[$this->pointer + 2], "), ";
        echo "{$output}, ";
        echo "at position {$this->pointer}", PHP_EOL;


        switch ($operation) {
            case 1:
                $output = (int) ($param_a + $param_b);
                break;

            case 2:
                $output = (int) ($param_a * $param_b);
                break;
        }


        $output = $this->setMemPos($this->pointer + 3, $output, true);
        $this->pointer += 4;

        return $output;
    }
}
