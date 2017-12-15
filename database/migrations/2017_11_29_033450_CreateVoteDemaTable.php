<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVoteDemaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('votedema', function (Blueprint $table) {
          $table->increments('id');
          $table->string('nimpemilih');
          $table->integer('dipilih')->unsigned();
          $table->foreign('dipilih')->references('id')->on('dema');
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
        Schema::dropIfExists('votedema');
    }
}
