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
            // Tiny text can hold up to 255 bytes/characters
            $table->tinyText('title');
            $table->tinyText('author');
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
