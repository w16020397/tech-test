<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        if (!Schema::hasTable('roman_numerals')) {
            Schema::create('roman_numerals', function (Blueprint $table) {
                $table->id();
                $table->integer('integer');
                $table->string('value');
                $table->timestamps();
            });
        }

        if (!Schema::hasTable('roman_numeral_logs')) {
            Schema::create('roman_numeral_logs', function (Blueprint $table) {
                $table->id();
                $table->foreignId('roman_numeral_id')->constrained('roman_numerals');
                $table->string('ip_address');
                $table->string('user_agent');
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('roman_numerals');
        Schema::dropIfExists('roman_numeral_logs');
    }
};
