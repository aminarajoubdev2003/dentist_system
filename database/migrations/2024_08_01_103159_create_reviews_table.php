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
        Schema::create('reviews', function (Blueprint $table) {
            $table->id();
            $table->foreignId('patient_id')
                ->references('id')
                ->on('patients')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->foreignId('doctor_id')
                ->references('id')
                ->on('doctors')
                ->onDelete('cascade')->onUpdate('cascade');
            $table->enum('rate',[0,1,2,3,4,5])->default(0);
            $table->string('comment')->nullable();
            $table->unique(['patient_id','doctor_id']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
