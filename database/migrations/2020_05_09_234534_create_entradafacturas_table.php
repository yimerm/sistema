<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntradafacturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entradafacturas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('codigo');
            $table->integer('proveedor')->unsigned();
            $table->string('total');
            $table->string('slug_entradafactura')->unique();
            $table->timestamps();
        });

        Schema::table('entradafacturas', function(Blueprint $table)
        {
            $table->foreign('proveedor')->references('id')->on('proveedors')
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
        Schema::dropIfExists('entradafacturas');
    }
}
