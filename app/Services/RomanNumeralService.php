<?php

namespace App\Services;

use App\Http\Requests\RecentRomanNumeralConversions;
use App\Http\Requests\StoreRomanNumeral;
use App\Http\Requests\TopRomanNumeralConversions;
use App\Http\Resources\RomanNumeralResource;
use App\Interfaces\RomanNumeralRepositoryInterface;
use App\Models\RomanNumeral;
use App\Models\RomanNumeralLog;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Cache;

class RomanNumeralService
{
    public function __construct(
        private RomanNumeralRepositoryInterface $romanNumeralRepository,
        private RomanNumeralConverter $romanNumeralConverter
    ) {
        //
    }

    /**
     * @param StoreRomanNumeral $request
     * @return JsonResponse
     */
    public function store(StoreRomanNumeral $request): JsonResponse
    {
        $integer = $request->get('integer');
        $cacheKey = "roman_numeral_$integer";

        $romanNumeral = Cache::rememberForever($cacheKey, function () use ($integer, $request) {
            $existingRomanNumeral = RomanNumeral::where('integer', '=', $integer)->first();

            if ($existingRomanNumeral) {
                return new RomanNumeralResource($existingRomanNumeral);
            }

            return new RomanNumeralResource($this->romanNumeralRepository->store(
                $integer,
                $this->romanNumeralConverter->convertInteger($integer)
            ));
        });

        RomanNumeralLog::create([
            'roman_numeral_id' => $romanNumeral->id,
            'ip_address' => $request->ip(),
            'user_agent' => $request->userAgent()
        ]);

        return response()->json($romanNumeral, 201);
    }

    /**
     * @param RecentRomanNumeralConversions $request
     * @return JsonResponse
     */
    public function recent(RecentRomanNumeralConversions $request): JsonResponse
    {
        return response()->json($this->romanNumeralRepository->recent());
    }

    /**
     * @param TopRomanNumeralConversions $request
     * @return JsonResponse
     */
    public function top(TopRomanNumeralConversions $request): JsonResponse
    {
        return response()->json($this->romanNumeralRepository->top());
    }
}
