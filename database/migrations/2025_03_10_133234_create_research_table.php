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
        Schema::create('research', function (Blueprint $table) {
            $table->id();
            $table->foreignId('business_id')->nullable();
            $table->foreignId('user_id');
            $table->string('category');
            $table->string('image')->nullable();
            $table->text('description');
            $table->string('visibility')->default('private');
            $table->string('status')->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('research');
    }
};
