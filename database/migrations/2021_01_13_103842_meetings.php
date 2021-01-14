<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Meetings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Meetings', function (Blueprint $table) {
            $table->id();
            $table->string('supervisor');
            $table->string('student');
            $table->string('title_code');
            $table->string('platform');
            $table->text('comment')->nullable();
            $table->string('link');
            $table->datetime('time');
            $table->rememberToken();
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
        Schema::dropIfExists('Meetings');
    }
}
