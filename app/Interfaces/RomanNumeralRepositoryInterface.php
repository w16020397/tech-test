<?php

namespace App\Interfaces;

use App\Http\Resources\RecentRomanNumeralConversionsResource;
use App\Http\Resources\TopRomanNumeralConversionsResource;
use App\Models\RomanNumeral;

interface RomanNumeralRepositoryInterface
{
    public function recent(): RecentRomanNumeralConversionsResource;

    public function top(): TopRomanNumeralConversionsResource;

    public function store(int $integer, string $value): RomanNumeral;
}
