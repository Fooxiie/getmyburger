<?php

namespace App\Enums;

use BenSampo\Enum\Enum;

/**
 * @method static static OptionOne()
 * @method static static OptionTwo()
 * @method static static OptionThree()
 */
final class Drinks extends Enum
{
    const None = 'Aléatoire';
    const Orangina = 'Orangina';
    const Fanta = 'Fanta';
    const Coca = 'Coca';
    const Sprite = 'Sprite';
    const IceTea = 'Ice-tea';
    const Water = 'Vittel';
    const Perrier = 'Perrier';
}
