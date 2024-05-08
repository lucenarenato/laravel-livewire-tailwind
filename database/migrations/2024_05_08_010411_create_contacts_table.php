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
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();

            $table->text('email')->nullable();
            $table->text('phone')->nullable();
            $table->longText('address')->nullable();
            $table->text('website')->nullable();

            $table->string('gender')->nullable();
            $table->date('birthday')->nullable();
            $table->date('anniversary')->nullable();

            $table->string('company_name')->nullable();
            $table->string('job_title')->nullable();
            $table->string('photo')->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            //$table->foreignId('team_id')->constrained()->cascadeOnDelete();
            $table->foreignId('team_id')->nullable()->index();
            $table->boolean('starred')->nullable();
            $table->boolean('pinned')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contacts');
    }
};
