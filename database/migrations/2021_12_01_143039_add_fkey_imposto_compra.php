<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkeyImpostoCompra extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('imposto', function (Blueprint $table){
            $table->unsignedBigInteger('compra_id');
            $table->foreign('compra_id')->references('id')->on('compra');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('imposto', function (Blueprint $table){
            $table->dropForeign(['compra_id']);
            $table->dropColumn('compra_id');
        });
    }
}
