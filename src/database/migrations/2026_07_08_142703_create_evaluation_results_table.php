<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('evaluation_results', function (Blueprint $table) {
            $table->id();
            $table->uuid('participant_code');

            $table->enum('phase', [
                'pre',
                'post',
            ]);

            $table->unsignedInteger('score');
            $table->unsignedInteger('total_questions');
            $table->decimal('percentage', 5, 2);
            $table->json('answers')->nullable();
            $table->timestamp('completed_at')->nullable();
            $table->timestamps();

            $table->unique([
                'participant_code',
                'phase',
            ]);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('evaluation_results');
    }
};