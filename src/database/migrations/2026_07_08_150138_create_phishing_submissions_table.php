<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('phishing_submissions', function (Blueprint $table) {
            $table->id();

            $table->string('participant_code', 20);
            $table->string('simulated_email', 100);
            $table->string('password_masked', 100);
            $table->unsignedInteger('password_length');
            $table->boolean('format_valid')->default(true);
            $table->timestamp('submitted_at');

            $table->timestamps();

            $table->index('participant_code');
            $table->index('simulated_email');
            $table->index('submitted_at');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('phishing_submissions');
    }
};