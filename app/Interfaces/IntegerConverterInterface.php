<?php

namespace App\Interfaces;

interface IntegerConverterInterface
{
    public function convertInteger(int $integer): string;
}
