<?php

namespace App\Repositories;

use App\Http\Resources\RecentRomanNumeralConversionsResource;
use App\Http\Resources\TopRomanNumeralConversionsResource;
use App\Interfaces\RomanNumeralRepositoryInterface;
use App\Models\RomanNumeral;

class RomanNumeralRepository implements RomanNumeralRepositoryInterface
{
    /**
     * @return RecentRomanNumeralConversionsResource
     */
    public function recent(): RecentRomanNumeralConversionsResource
    {
        return new RecentRomanNumeralConversionsResource(
            RomanNumeral::orderBy('created_at', 'desc')->paginate(10)
        );
    }

    /**
     * @return TopRomanNumeralConversionsResource
     */
    public function top(): TopRomanNumeralConversionsResource
    {
        $results = RomanNumeral::withCount('logs as count')
            ->orderBy('count', 'desc')
            ->get(10);

        return new TopRomanNumeralConversionsResource($results);
    }

    /**
     * @param int $integer
     * @param string $value
     * @return RomanNumeral
     */
    public function store(int $integer, string $value): RomanNumeral
    {
        return RomanNumeral::create([
            'integer' => $integer,
            'value' => $value
        ]);
    }
}
