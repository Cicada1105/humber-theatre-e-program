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
            // Binary is equivalent to Blob
            $table->binary('poster_img_src');
            $table->tinyText('poster_img_caption');
            $table->text('blurb');
            $table->text('content_warning')->nullable();
            // Medium text can hold up to 16,777,215 bytes/characters
            $table->mediumText('land_acknowledgment');
            $table->mediumText('about_humber');
            $table->mediumText('special_thanks');
            // The following are the foreign keys of the faculty that contribute to a given production
            $table->foreignId('senior_dean');
            $table->foreignId('associate_dean');
            $table->foreignId('head_of_carpentry');
            $table->foreignId('theatre_director');
            $table->foreignId('head_of_properties');
            $table->foreignId('voice_professor');
            $table->foreignId('academic_program_manager');
            $table->foreignId('head_of_lighting');
            $table->foreignId('head_of_wardrobe');
            $table->foreignId('head_of_movement');
            $table->foreignId('head_of_sound');
            $table->foreignId('head_of_paint');
            $table->foreignId('technical_director');
            $table->foreignId('pso');;
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
