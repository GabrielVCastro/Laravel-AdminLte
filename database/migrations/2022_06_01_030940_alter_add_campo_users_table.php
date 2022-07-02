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
        Schema::table('users', function (Blueprint $table) {
            $table->string('telefone', 30)->nullable();
            $table->string('celular', 30)->nullable();
            $table->string('cidade', 50)->nullable();
            $table->string('logradouro', 100)->nullable();
            $table->string('numero', 10)->nullable();
            $table->string('complemento')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
};
