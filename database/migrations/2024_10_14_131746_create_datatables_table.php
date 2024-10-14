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
        Schema::create('datatables', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable(); // For text field
            $table->text('description')->nullable(); // For longer text or description
            $table->string('image_path')->nullable(); // For storing image path or URL
            $table->date('published_date')->nullable(); // For date field
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('datatables');
    }
};
