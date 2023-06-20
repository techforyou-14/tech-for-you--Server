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
        Schema::create('trees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('alias')->default('arbol');
            $table->string('tree');
            $table->string('leaf_type')->nullable();
            $table->string('tree_shape')->nullable();
            $table->string('maximum_height')->nullable();
            $table->string('drought_tolerance')->nullable();
            $table->string('salt_tolerance')->nullable();
            $table->string('wind_resistance')->nullable();
            $table->string('growth')->nullable();
            $table->string('trunk_characteristics')->nullable();
            $table->string('common_uses')->nullable();
            $table->string('soil_requirements')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trees');
    }
};
