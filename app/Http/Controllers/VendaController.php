<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\compra;

class VendaController extends Controller
{
    public function vender(Request $request){

        $produto_id = $request->produto;
        $quantidade = $request->quantidade;
        $valor = $request->valor;
        $cliente = $request->cliente;
        $data = $request->data;
        $forma_pagamento = $request->forma_pagamento;
        
        // $estoque_id = db::table('estoque')->insertGetId([
        //     'produto_id' => $produto_id,
        //     'estoque_valor' => $valor,
        //     'estoque_quantidade' => $quantidade,
        //     'estoque_data_entrada' => $data
        // ]);

        // compra::insert([
        //     'produto_id' => $produto_id,
        //     'estoque_id' => $estoque_id,
        //     'compra_quantidade' => $quantidade,
        //     'compra_valor' => $valor,
        //     'compra_cliente' => $cliente,
        //     'compra_data' => $data,
        //     'compra_forma_pagamento' => $forma_pagamento
        // ]);

        session()->flash('Sucesso', 'Compra cadastrada com sucesso.');
        return redirect()->route('venda');
    }
}
