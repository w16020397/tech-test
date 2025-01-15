<?php

namespace App\Http\Controllers;

use App\Http\Requests\RecentRomanNumeralConversions;
use App\Http\Requests\StoreRomanNumeral;
use App\Http\Requests\TopRomanNumeralConversions;
use App\Services\RomanNumeralService;
use Illuminate\Http\JsonResponse;

class RomanNumeralConvertorController extends Controller
{
    public function __construct(private RomanNumeralService $romanNumeralService)
    {
        //
    }

    /**
     * @param StoreRomanNumeral $request
     * @return JsonResponse
     */
    public function store(StoreRomanNumeral $request): JsonResponse
    {
        return $this->romanNumeralService->store($request);
    }

    /**
     * @param RecentRomanNumeralConversions $request
     * @return JsonResponse
     */
    public function recent(RecentRomanNumeralConversions $request): JsonResponse
    {
        return $this->romanNumeralService->recent($request);
    }

    /**
     * @param TopRomanNumeralConversions $request
     * @return JsonResponse
     */
    public function top(TopRomanNumeralConversions $request): JsonResponse
    {
        return $this->romanNumeralService->top($request);
    }
}
