<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RomanNumeralLog extends Model
{
    /**
     * @var string[] $fillable
     */
    protected $fillable = [
        'roman_numeral_id',
        'ip_address',
        'user_agent'
    ];
}
