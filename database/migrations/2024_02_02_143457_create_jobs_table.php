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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->string('title');
            $table->text('description');
            $table->string('location');
            $table->integer('salary');
            $table->string('skills');
            $table->enum('experience_level', ['entry', 'mid', 'senior']);
            $table->enum('job_type', ['full-time', 'part-time', 'contract']);
            $table->boolean('remote_work')->default(false);
            $table->string('category');
            $table->string('requirements');
            $table->string('responsibilities');
            $table->string('benefits');
            $table->string('company_logo')->nullable();
            $table->string('company_name');
            $table->string('company_email');
            $table->string('company_website');
            $table->enum('status', ['open', 'closed', 'pending_approval'])->default('pending_approval');
            $table->timestamp('deadline')->nullable();
            $table->boolean('featured')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jobs');
    }
};
