<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculty_involvements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('faculty_id');
            $table->foreignId('production_id');
            $table->enum('involvement', ['senior_dean','associate_dean','head_of_carpentry','theatre_director','head_of_properties','voice_professor','academic_program_manager','head_of_lighting','head_of_wardrobe','head_of_movement','head_of_sound','head_of_paint','technical_director','pso'])->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faculty_involvements');
    }
};
