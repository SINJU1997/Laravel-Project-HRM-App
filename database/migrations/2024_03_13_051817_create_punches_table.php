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
        Schema::create('punches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->unsignedBigInteger('userId'); // Foreign key referencing the id column in users table
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            $table->date('date');
            $table->time('punch_in')->nullable();
            $table->time('punch_out')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('punches');
    }
};
