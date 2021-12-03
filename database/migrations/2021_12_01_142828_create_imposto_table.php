<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateImpostoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('imposto', function (Blueprint $table) {
            $table->id();
            $table->date("imposto_data");
            $table->float('impostos_real',8,2);
            $table->float('impostos_presumido',8,2);
            $table->float('lucro_bruto', 8, 2);
            $table->float('faturamento_bruto', 8, 2);
            $table->float('lucro_liquido_real',8,2);
            $table->float('lucro_liquido_presumido',8,2);
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
        Schema::dropIfExists('imposto');
    }
}
