<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTricsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trics', function (Blueprint $table) {
            $table->id();
            $table->string('chapterNumber');
            $table->string('title');
            $table->string('b1h');
            $table->string('b1');
            $table->string('imageOne');
            $table->string('imageTwo');

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
        Schema::dropIfExists('trics');
    }
}
