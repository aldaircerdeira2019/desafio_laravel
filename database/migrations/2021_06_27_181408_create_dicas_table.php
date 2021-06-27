<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDicasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dicas', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('descri');
            $table->unsignedBigInteger('modelo_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('versao_id')->nullable();
            $table->foreign('modelo_id')->references('id')->on('modelos')->onDelete('cascade'); 
            $table->foreign('versao_id')->references('id')->on('versaos')->onDelete('cascade'); 
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade'); 
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
        Schema::dropIfExists('dicas');
    }
}
