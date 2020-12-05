<?php

$modules = file('input.txt');
$modules_fuel = 0;
$additional_fuel = 0;

/**
 * Calculate the fuel required for a module with N mass.
 *
 * @param float $mass
 * @return integer
 */
function get_fuel_required(float $mass)
{
    return (floor(($mass / 3)) - 2);
}


/**
 * Calculate the additional fuel required for the fuel that a module requires.
 *
 * @param integer $fuel_required
 * @return integer
 */
function get_additional_fuel(int $fuel_required)
{
    $additional_fuel = 0;

    for ($tfuel = $fuel_required; $tfuel > 0;) {
        $tfuel = get_fuel_required((float) $tfuel);
        $additional_fuel += ($tfuel > 0 ? $tfuel : 0);
    }

    return $additional_fuel;
}


if (is_array($modules)) {
    foreach ($modules as $module_mass) {
        $module_mass = (float) trim($module_mass);

        if ($module_mass > 0) {
            $fuel_required = get_fuel_required((float) $module_mass);

            $modules_fuel += $fuel_required;
            $additional_fuel += get_additional_fuel($fuel_required);
        }

    }
}

echo 'Fuel required for modules: ', $modules_fuel, PHP_EOL;
echo 'Total fuel required: ', ($modules_fuel + $additional_fuel), PHP_EOL;
