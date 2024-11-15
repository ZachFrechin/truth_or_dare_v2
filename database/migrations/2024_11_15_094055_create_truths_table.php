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
        Schema::create('truths', function (Blueprint $table) {
            $table->id();
            $table->string('truth');
            $table->string('author');
            $table->unsignedBigInteger('asked')->default(value: 0);
            $table->unsignedBigInteger('response')->default(0);
            $table->unsignedBigInteger('give_up')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('truths');
    }
};
