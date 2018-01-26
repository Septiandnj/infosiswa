<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gurus', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nipg');
            $table->string('foto');
            $table->string('nama_guru');
            $table->string('jenis_kelamin');
            $table->date('tanggal_lahir');
            $table->integer('id_mapel')->unsigned();
            $table->foreign('id_mapel')->references('id')
                  ->on('mapels')->onUpdate('cascade')
                  ->onDelete('cascade');  
            $table->text('alamat');
            $table->string('no_telepon');
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
        Schema::dropIfExists('gurus');
    }
}
