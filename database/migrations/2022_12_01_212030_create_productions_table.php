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
            $table->boolean('is_published');
            // Tiny text can hold up to 255 bytes/characters
            $table->tinyText('title');
            $table->tinyText('authors');
            $table->text('directors');
            $table->text('choreographers');
            $table->mediumText('dates');
            $table->tinyText('location');
            // Binary is equivalent to Blob
            $table->binary('poster_img_src');
            $table->tinyText('poster_img_caption');
            $table->text('blurb');
            $table->text('content_warning')->nullable();
            // Medium text can hold up to 16,777,215 bytes/characters
            $table->mediumText('land_acknowledgment')->nullable();
            $table->mediumText('about_humber')->nullable();
            $table->mediumText('special_thanks')->nullable();
            // The following are the foreign keys of the faculty that contribute to a given production
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
