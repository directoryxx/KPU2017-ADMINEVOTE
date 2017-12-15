<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSemaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('sema', function (Blueprint $table) {
          $table->increments('id');
          $table->string('namaketua');
          $table->string('namawakil');
          $table->string('nimketua');
          $table->string('nimwakil');
          $table->string('fotoketua');
          $table->string('fotowakil');
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
        Schema::dropIfExists('sema');
    }
}
