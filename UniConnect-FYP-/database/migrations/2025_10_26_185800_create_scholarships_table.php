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
        Schema::create('scholarships', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->foreignId('university_id')->nullable()->constrained()->onDelete('set null');
            $table->string('provider'); // University, Government, Private Organization
            $table->decimal('amount', 10, 2)->nullable();
            $table->string('currency', 3)->default('USD');
            $table->enum('coverage', ['full', 'partial', 'tuition_only', 'living_expenses'])->nullable();
            $table->json('eligibility_criteria')->nullable(); // JSON object with criteria
            $table->json('required_documents')->nullable(); // JSON array of required documents
            $table->date('application_deadline');
            $table->date('announcement_date')->nullable();
            $table->string('application_link')->nullable();
            $table->json('programs_covered')->nullable(); // JSON array of programs
            $table->json('countries_eligible')->nullable(); // JSON array of eligible countries
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('scholarships');
    }
};
