<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkeyVendaEstoque extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('venda', function (Blueprint $table){
            $table->unsignedBigInteger('estoque_id');
            $table->foreign('estoque_id')->references('id')->on('estoque');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('venda', function (Blueprint $table){
            $table->dropForeign(['estoque_id']);
            $table->dropColumn('estoque_id');
        });
    }
}
