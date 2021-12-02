<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUnMedidaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('un_medida', function (Blueprint $table) {
            $table->id();
            $table->string("medida_nome");
            $table->string("medida_apelido");
            $table->timestamps();
        });
        DB::table('un_medida')->insert([
            'medida_nome' => 'Unitario',
            'medida_apelido' => 'UN'
        ]);
        DB::table('un_medida')->insert([
            'medida_nome' => 'Quilograma',
            'medida_apelido' => 'KG'
        ]);
        DB::table('un_medida')->insert([
            'medida_nome' => 'Litro',
            'medida_apelido' => 'L'
        ]);
        DB::table('un_medida')->insert([
            'medida_nome' => 'Outro',
            'medida_apelido' => 'Outro'
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('un_medida');
    }
}
