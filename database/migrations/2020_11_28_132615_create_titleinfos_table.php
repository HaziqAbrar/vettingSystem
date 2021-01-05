<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTitleinfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('titleinfos', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('name');
          $table->string('email');
          $table->string('title')->unique();
          $table->text('description');
          $table->text('tools')->nullable($value = true);
          $table->string('major')->nullable($value = true);
          $table->string('numberStudent')->nullable($value = true);
          $table->string('comment')->nullable($value = true);
          $table->enum('status',['Accepted','Rejected','Pending'])->default($value='Pending');
          $table->enum('level',['Postgraduate','Undergraduate']);
          $table->enum('session',['1','2']);
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
        Schema::dropIfExists('titleinfos');
    }
}
