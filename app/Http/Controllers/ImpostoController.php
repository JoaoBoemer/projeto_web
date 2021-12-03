<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\compra;
use App\Models\Venda;
use App\Models\Imposto;
use phpDocumentor\Reflection\Types\Null_;

use function PHPUnit\Framework\isNull;

class ImpostoController extends Controller
{
    public function calcular(Request $data){
        $data_inicio = $data->data_inicio;
        $data_fim = $data->data_fim;


        $compra_array = Compra::all();
        $venda_array = Venda::all();

        $venda_teste = Venda::select('*')->first();

        if(!(isset($venda_teste))){
            Session()->flash('fail', 'Deverá haver ao menos uma compra e uma venda cadastrados no sistema.') ;
            return redirect()->route('imposto');
        }

        $gasto_total = 0;
        $receita_total = 0;

        foreach($compra_array as $compra){
            if($compra->compra_data >= $data_inicio and $compra->compra_data <= $data_fim) 
            $gasto_total += ($compra->compra_quantidade * $compra->compra_valor);
        }
        foreach($venda_array as $venda){
            if($venda->venda_data >= $data_inicio and $venda->venda_data <= $data_fim) 
            $receita_total += ($venda->venda_quantidade * $venda->venda_valor);
        }


        //  CALCULO LUCRO PRESUMIDO
        $faturamento_bruto = $receita_total;
        $lucro_bruto_presumido = $faturamento_bruto - $gasto_total;
        $faturamento_presumido = $faturamento_bruto * 32 / 100;
        $CSLL_PRESUMIDO = $faturamento_presumido * 9 / 100;
        $PIS_PRESUMIDO = $faturamento_bruto * 0.65 / 100;
        $COFINS_PRESUMIDO = $faturamento_bruto * 3 / 100;
        $IRPJ_PRESUMIDO = $faturamento_bruto * 4.8 / 100;
        $impostos_presumido = $CSLL_PRESUMIDO + $PIS_PRESUMIDO + $COFINS_PRESUMIDO + $IRPJ_PRESUMIDO;
        $lucro_liquido_presumido = $lucro_bruto_presumido - $impostos_presumido;
        
        //  CALCULO LUCRO REAL
        $lucro_bruto = $receita_total - $gasto_total;
        
        if($lucro_bruto < 60000){
            $IRPJ_REAL = $lucro_bruto * 15 / 100;
        } else {
            $IRPJ_REAL = 60000 * 15 / 100;
            $IRPJ_REAL += ($lucro_bruto - 60000) * 25 / 100;
        }
        $CSLL_REAL = $lucro_bruto * 9 / 100;
        $PIS_REAL = ($faturamento_bruto*50/100) * 1.65 / 100;
        $COFINS_REAL = ($faturamento_bruto *50/100) * 7.6 / 100;
        $impostos_real = $CSLL_REAL + $PIS_REAL + $COFINS_REAL + $IRPJ_REAL;
        $lucro_liquido_real = $lucro_bruto - $impostos_real;

        $imposto = imposto::select('*')->first();

        if(isset($imposto)){
            $imposto->delete();
        }

        imposto::insert([
            'imposto_data' => $data_inicio,
            'impostos_real' => $impostos_real,
            'impostos_presumido' => $impostos_presumido,
            'faturamento_bruto' => $faturamento_bruto,
            'lucro_bruto' => $lucro_bruto,
            'lucro_liquido_real' => $lucro_liquido_real,
            'lucro_liquido_presumido' => $lucro_liquido_presumido
        ]);

        // Enviar:
        // $impostos_real;
        // $impostos_presumido;
        // $faturamento_liquido;
        // $lucro_liquido;
        // return 0;
        return redirect()->route('imposto');
    }
}
