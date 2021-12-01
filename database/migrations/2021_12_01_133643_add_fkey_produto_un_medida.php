<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFkeyProdutoUnMedida extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produto', function (Blueprint $table){
            $table->unsignedBigInteger('un_medida_id');
            $table->foreign('un_medida_id')->references('id')->on('un_medida');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produto', function (Blueprint $table){
            $table->dropForeign(['un_medida_id']);
            $table->dropColumn('un_medida_id');
        });
    }
}
