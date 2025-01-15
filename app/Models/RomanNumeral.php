<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class RomanNumeral extends Model
{
    /**
     * @var string[] $fillable
     */
    protected $fillable = ['integer', 'value'];

    /**
     * @return HasMany
     */
    public function logs(): HasMany
    {
        return $this->hasMany(RomanNumeralLog::class);
    }
}
