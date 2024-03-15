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
        Schema::create('leaves', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userId'); // Foreign key referencing the id column in users table
            $table->foreign('userId')->references('id')->on('users')->onDelete('cascade');
            $table->string('name'); // Name of the person applying for leave
            $table->string('reason'); // Reason for leave
            $table->date('from_date'); // Starting date of the leave
            $table->date('to_date'); // Ending date of the leave
            $table->string('status')->default('Pending'); // Status of the leave application (default is pending)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaves');
    }
};
