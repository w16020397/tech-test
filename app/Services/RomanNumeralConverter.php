<?php

namespace App\Services;

use App\Interfaces\IntegerConverterInterface;

class RomanNumeralConverter implements IntegerConverterInterface
{
    /**
     * @param int $integer
     * @return string
     */
    public function convertInteger(int $integer): string
    {
        $mapping = [
            1000 => 'M',
            900 => 'CM',
            500 => 'D',
            400 => 'CD',
            100 => 'C',
            90 => 'XC',
            50 => 'L',
            40 => 'XL',
            10 => 'X',
            9 => 'IX',
            5 => 'V',
            4 => 'IV',
            1 => 'I',
        ];

        $result = '';

        foreach ($mapping as $value => $numeral) {
            while ($integer >= $value) {
                $result .= $numeral;
                $integer -= $value;
            }
        }

        return $result;
    }
}
