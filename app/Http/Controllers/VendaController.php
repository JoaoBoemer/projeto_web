<?php

namespace App\Http\Controllers;

use App\Models\Estoque;
use Illuminate\Http\Request;
use App\Models\Venda;
use Illuminate\Support\Facades\DB;

class VendaController extends Controller
{
    public function vender(Request $request){

        $estoque_id = $request->produto;
        $quantidade = $request->quantidade;
        $valor = $request->valor;
        $cliente = $request->cliente;
        $data = $request->data;
        $forma_pagamento = $request->forma_pagamento;
        dump($estoque_id, $quantidade, $valor, $cliente, $data, $forma_pagamento);

        $estoque = estoque::find($estoque_id);
        
        dump($estoque);

        return "AntesDoInsert";
        Venda::insert([
            // 'produto_id' => $produto_id,
            'estoque_id' => $estoque_id,
            'compra_quantidade' => $quantidade,
            'compra_valor' => $valor,
            'compra_cliente' => $cliente,
            'compra_data' => $data,
            'compra_forma_pagamento' => $forma_pagamento
        ]);

        session()->flash('Sucesso', 'Compra cadastrada com sucesso.');
        return redirect()->route('venda');
    }
}
