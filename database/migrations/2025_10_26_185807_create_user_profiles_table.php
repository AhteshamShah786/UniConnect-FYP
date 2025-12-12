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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('profile_picture')->nullable();
            $table->date('date_of_birth')->nullable();
            $table->string('phone')->nullable();
            $table->string('country');
            $table->string('city')->nullable();
            $table->enum('user_type', ['student', 'alumni', 'current_student']);
            $table->string('current_university')->nullable();
            $table->string('field_of_study')->nullable();
            $table->enum('degree_level', ['bachelor', 'master', 'phd', 'diploma'])->nullable();
            $table->integer('graduation_year')->nullable();
            $table->text('bio')->nullable();
            $table->json('interests')->nullable(); // JSON array of interests
            $table->json('languages')->nullable(); // JSON array of languages spoken
            $table->string('linkedin_profile')->nullable();
            $table->string('github_profile')->nullable();
            $table->boolean('is_mentor')->default(false);
            $table->boolean('is_available_for_mentoring')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_profiles');
    }
};
