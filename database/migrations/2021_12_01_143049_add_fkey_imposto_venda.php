<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkeyImpostoVenda extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('imposto', function (Blueprint $table){
            $table->unsignedBigInteger('venda_id');
            $table->foreign('venda_id')->references('id')->on('venda');
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
            $table->dropForeign(['venda_id']);
            $table->dropColumn('venda_id');
        });
    }
}
