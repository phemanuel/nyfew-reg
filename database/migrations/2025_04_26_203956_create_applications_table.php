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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedTinyInteger('stage');
            $table->string('comment', 100)->nullable();
            $table->enum('status', ['Approved', 'Not Approved', 'Pending Review', 'Reviewed'])->nullable();
            $table->string('content')->nullable();
            $table->string('file_size')->nullable();
            $table->timestamp('reviewed_at')->nullable();
            $table->timestamps(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
