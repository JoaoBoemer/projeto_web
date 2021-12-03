<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddFaturamentoToImpostoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('imposto', function (Blueprint $table) {
            $table->float('impostos_real',8,2);
            $table->float('impostos_presumido',8,2);
            $table->float('faturamento_liquido',8,2);
            $table->float('lucro_liquido',8,2);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('imposto.', function (Blueprint $table) {
            $table->dropColumn('impostos_real',8,2);
            $table->dropColumn('impostos_presumido',8,2);
            $table->dropColumn('faturamento_liquido',8,2);
            $table->dropColumn('lucro_liquido',8,2);
        });
    }
}
