<?php

namespace App\Http\Controllers;

use App\Models\Estoque;
use Illuminate\Http\Request;
use App\Models\produto;
use App\Models\compra;

class CompraController extends Controller
{
    public function comprar(Request $request){
        $produto_id = $request->produto;
        $quantidade = $request->quantidade;
        $valor = $request->valor;
        $cliente = $request->cliente;
        $data = $request->data;
        $forma_pagamento = $request->forma_pagamento;

        compra::insert([
            'produto_id' => $produto_id,
            'estoque_id' => 1,
            'compra_quantidade' => $quantidade,
            'compra_valor' => $valor,
            'compra_cliente' => $cliente,
            'compra_data' => $data,
            'compra_forma_pagamento' => $forma_pagamento
        ]);

        estoque::insert([
            'produto_id' => $produto_id,
            'estoque_valor' => $valor,
            'estoque_quantidade' => $quantidade,
            'estoque_data_entrada' => $data
        ]);

        session()->flash('Sucesso', 'Compra cadastrada com sucesso.');
        return redirect()->route('compra');
    }
}
