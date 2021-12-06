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
            $table->double('impostos_real');
            $table->double('impostos_presumido');
            $table->double('lucro_bruto');
            $table->double('faturamento_bruto');
            $table->double('lucro_liquido_real');
            $table->double('lucro_liquido_presumido');
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
