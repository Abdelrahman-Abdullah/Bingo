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
        Schema::create('plan_property', function (Blueprint $table) {
            // TODO: we don't need id column here
            // TODO: the primary key should be the combination of plan_id and property_id

            $table->id();
            $table->foreignId('plan_id')
                ->constrained()
                ->cascadeOnDelete();

            $table->foreignId('property_id')
                ->constrained()
                ->cascadeOnDelete();
            // TODO: we don't need timestamps here
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('plan_property');
    }
};
