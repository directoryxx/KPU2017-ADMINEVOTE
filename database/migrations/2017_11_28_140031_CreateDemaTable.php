<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDemaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('dema', function (Blueprint $table) {
          $table->increments('id');
          $table->string('namaketua');
          $table->string('nimketua');
          $table->string('fotoketua');
          $table->string('visi');
          $table->string('misi');
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
        Schema::dropIfExists('dema');
    }
}
