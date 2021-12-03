<?php

namespace App\Http\Controllers;

use App\Models\Estoque;
use Illuminate\Http\Request;
use App\Models\Venda;
use App\Models\Compra;
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
        $compra = compra::select('*')->where(['estoque_id' => $estoque_id]);

        if($quantidade > $estoque->estoque_quantidade){
            session()->flash('saldo_insuficiente', 'Nao ha saldo suficiente no estoque para efetuar a venda.');
            return redirect()->route('venda');
        }else if ($data < $estoque->estoque_data_entrada){
            session()->flash('data_venda', 'A data da venda antecede a data da entrada do produto no estoque.');
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
        $venda = Venda::find($id);
        $estoque = Estoque::find($venda->estoque_id);
        $estoque->estoque_quantidade += $venda->venda_quantidade;
        $estoque->save();
        $venda->delete();
        session()->flash('venda_excluida', 'Venda excluida com sucesso.');
        return redirect()->route('venda');
    }
}
