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
        Schema::create('chatbot_conversations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
            $table->string('session_id'); // For anonymous users
            $table->text('user_message');
            $table->text('bot_response');
            $table->string('language', 5)->default('en'); // Language code (en, ur, ar, etc.)
            $table->json('context')->nullable(); // JSON object for conversation context
            $table->enum('message_type', ['question', 'greeting', 'help', 'search', 'other']);
            $table->boolean('was_helpful')->nullable(); // User feedback
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chatbot_conversations');
    }
};
