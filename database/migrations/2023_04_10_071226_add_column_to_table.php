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
        Schema::table('lisense_plates', function (Blueprint $table) {
            $table->integer('type')->default('1')->comment('1= In & 2 = Out');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lisense_plates', function (Blueprint $table) {
            //
        });
    }
};
