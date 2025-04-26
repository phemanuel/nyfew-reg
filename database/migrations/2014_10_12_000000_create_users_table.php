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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('surname', 60)->nullable();
            $table->string('first_name', 60)->nullable();
            $table->string('other_name', 60)->nullable();
            $table->string('mobile_no', 30);
            $table->integer('user_status')->nullable();
            $table->integer('user_type')->nullable();
            $table->integer('login_attempts')->nullable();
            $table->integer('email_verified_status')->nullable();
            $table->string('email')->unique();
            $table->string('address', 100)->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->default('other')->nullable();
            $table->date('dob')->nullable();
            $table->string('mobile_no1', 15)->nullable();
            $table->string('interest')->nullable();
            $table->unsignedInteger('current_stage')->nullable(); // Correct unsigned integer
            $table->string('instagram', 60)->nullable();
            $table->string('facebook', 60)->nullable();
            $table->string('twitter', 60)->nullable();
            $table->string('snapchat', 60)->nullable();
            $table->string('occupation', 60)->nullable();
            $table->text('qst1')->nullable();
            $table->text('qst2')->nullable();
            $table->text('qst3')->nullable();
            $table->text('if_yes_qst2')->nullable();
            $table->string('image', 255)->nullable();
            $table->date('reg_date');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
