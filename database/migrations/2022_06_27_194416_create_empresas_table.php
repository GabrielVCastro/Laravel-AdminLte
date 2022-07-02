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
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string("nome");
            $table->string("sobre")->nullable(true)->default(false);
            $table->string('celular',30);
            $table->string('pix_1')->nullable(true)->default(false);
            $table->string('pix_2')->nullable(true)->default(false);
            $table->string('pix_3')->nullable(true)->default(false);
            $table->string('endereco_ban_1')->nullable(true)->default(false);
            $table->string('endereco_ban_2')->nullable(true)->default(false);
            $table->string('endereco_ban_3')->nullable(true)->default(false);
            $table->string('email',150);
            $table->string('uf',2);
            $table->boolean('ativo')->default(false);
            $table->softDeletes();
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
        Schema::dropIfExists('empresas');
    }
};
