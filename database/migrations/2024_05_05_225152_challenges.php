<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('challenges', function (Blueprint $table) {
            $table->id();
            $table->string('title',255)->comment("Challenge's Table title");
            $table->text('description')->nullable()->comment("Challenge's Table description");
            $table->integer('difficulty')->comment("Challenge's Table difficulty");
            $table->unsignedBigInteger('user_id')->comment("Users Table Id ");
            $table->timestamps();

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onUpdate('cascade')
                ->onDelete('cascade');

        });
         DB::statement("ALTER TABLE `challenges` comment 'Challenges Table'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('challenges');
    }
};
