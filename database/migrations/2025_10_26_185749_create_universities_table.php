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
        Schema::create('universities', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('country');
            $table->string('city');
            $table->text('description')->nullable();
            $table->string('website')->nullable();
            $table->string('logo')->nullable();
            $table->integer('qs_ranking')->nullable();
            $table->integer('times_ranking')->nullable();
            $table->json('programs')->nullable(); // JSON array of available programs
            $table->json('admission_requirements')->nullable(); // JSON object with requirements
            $table->decimal('tuition_fee_min', 10, 2)->nullable();
            $table->decimal('tuition_fee_max', 10, 2)->nullable();
            $table->string('currency', 3)->default('USD');
            $table->json('contact_info')->nullable(); // JSON object with contact details
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('universities');
    }
};
