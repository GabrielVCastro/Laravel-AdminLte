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
        Schema::create('rifas', function (Blueprint $table) {
            $table->id();
            $table->string('documento');
            $table->string('status')->default('cancelado');
            $table->bigInteger('produto_id')->unsigned();
            $table->foreign('produto_id')->references('id')->on('produtos');

            $table->bigInteger('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('users');


            $table->datetime('data_confirmacao')->default(null);


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
        Schema::dropIfExists('rifas');
    }
};
