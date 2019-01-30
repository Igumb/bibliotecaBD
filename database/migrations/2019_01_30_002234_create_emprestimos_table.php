<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmprestimosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('emprestimos', function (Blueprint $table) {
            $table->increments('id');
            $table->string('status');
            $table->string('dataDeInicio');
            $table->string('dataDeTermino');
            $table->integer('clientesId')->unsigned()->nullable();
            $table->integer('livrosId')->unsigned()->nullable();
            $table->timestamps();
        });

        Schema::table('emprestimos', function (Blueprint $table){
            $table->foreign('clientesId')->references('id')->on('clientes')->onDelete('set null');
        });
        Schema::table('emprestimos', function (Blueprint $table){
            $table->foreign('livrosId')->references('id')->on('livros')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('emprestimos');
    }
}
