<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {

            $table->increments('id');

            $table->integer('categoria')->unsigned(); 

            $table->string('codigo');
            $table->string('nombre');
            $table->string('precio_ini');
            $table->string('Porcentaje');
            $table->string('precio_final');
            $table->string('cantidades');
            $table->string('total_cantidades');
            $table->string('salidas_cantidades');
            $table->timestamps();

            
        });

        Schema::table('productos', function(Blueprint $table)
        {
            $table->foreign('categoria')->references('id')->on('caregorias')
            ->onUpdate('cascade')
            ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('productos');
    }
}
