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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');

            $table->string('cpf', 50);
            $table->string('rg', 50);
            $table->date('data_nascimento');
            $table->string('sexo', 2);
            $table->string('cep', 50);
            $table->string('endereco', 255);
            $table->string('numero', 50);
            $table->string('bairro', 255);
            $table->string('complemento')->nullable();
            $table->string('telefone', 50);
            $table->string('celular', 50);
            $table->string('status')->default('S');
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
        Schema::dropIfExists('users');
    }
};
