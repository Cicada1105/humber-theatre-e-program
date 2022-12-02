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
        Schema::create('productions', function (Blueprint $table) {
            $table->id();
            $table->boolean('is_active');
            // Tiny text can hold up to 255 bytes/characters
            $table->tinyText('title');
            $table->tinyText('authors');
            $table->text('directors');
            $table->text('choreographers');
            $table->tinyText('senior_dean');
            $table->tinyText('associate_dean');
            $table->tinyText('head_of_carpentry');
            $table->tinyText('theatre_director');
            $table->tinyText('head_of_properties');
            $table->tinyText('voice_professor');
            $table->tinyText('academic_program_manager');
            $table->tinyText('head_of_lighting');
            $table->tinyText('head_of_wardrobe');
            $table->tinyText('head_of_movement');
            $table->tinyText('head_of_sound');
            $table->tinyText('head_of_paint');
            $table->tinyText('technical_director');
            $table->tinyText('pso');
            // Binary is equivalent to Blob
            $table->binary('poster_img_src');
            $table->tinyText('poster_img_caption');
            $table->text('blurb');
            $table->text('content_warning')->nullable();
            // Medium text can hold up to 16,777,215 bytes/characters
            $table->mediumText('special_thanks');
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
        Schema::dropIfExists('productions');
    }
};
