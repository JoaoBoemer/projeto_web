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

        $estoque = estoque::find($estoque_id);

        if($quantidade > $estoque->estoque_quantidade){
            session()->flash('saldo_insuficiente', 'Nao ha saldo suficiente no estoque para efetuar a venda.');
            return redirect()->route('venda');
        }else{
            $estoque->estoque_quantidade -= $quantidade;
            $estoque->save();
        }
        Venda::insert([
            'produto_id' => $estoque->produto_id,
            'estoque_id' => $estoque_id,
            'venda_quantidade' => $quantidade,
            'venda_valor' => $valor,
            'venda_cliente' => $cliente,
            'venda_data' => $data,
            'venda_forma_pagamento' => $forma_pagamento
        ]);

        session()->flash('success', 'Venda cadastrada com sucesso.');
        return redirect()->route('venda');
    }
    public function excluir($id){
        return 0;
    }
}
