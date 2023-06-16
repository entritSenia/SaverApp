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
        Schema::table('listings', function (Blueprint $table) {
            $table->string('need');
            $table->boolean('type');
            $table->boolean('status');
            $table->boolean('for');
            $table->unsignedBigInteger('price');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Schema::table('listings', function (Blueprint $table) {
        //     $table->dropColumns();
        // });

        Schema::dropColumns('listings', [
            'need', 'type', 'for', 'price'
        ]);
    }
};
