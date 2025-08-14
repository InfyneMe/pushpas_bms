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
        Schema::create('crushers', function (Blueprint $table) {
            $table->bigIncrements('id'); // Primary key
            $table->char('uuid', 36)->unique(); // UUID for external reference
            $table->string('name'); // Crusher name
            $table->string('status')->default('active'); // Status (active/inactive)
            $table->string('location'); // Physical location name/desc
            $table->decimal('latitude', 10, 8)->nullable(); // Latitude coords
            $table->decimal('longitude', 11, 8)->nullable(); // Longitude coords
            $table->integer('capacity'); // Capacity value
            $table->string('gst_number')->nullable(); // GST Number (optional)
            $table->boolean('has_weight')->default(false); // Whether crusher has weight machine
            $table->timestamps(); // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('crushers');
    }
};
