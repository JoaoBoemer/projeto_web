<?php

namespace App\Http\Controllers;

use App\Models\Estoque;
use Illuminate\Http\Request;
use App\Models\compra;
use Illuminate\Support\Facades\DB;

class CompraController extends Controller
{
    public function comprar(Request $request){
        $produto_id = $request->produto;
        $quantidade = $request->quantidade;
        $valor = $request->valor;
        $cliente = $request->cliente;
        $data = $request->data;
        $forma_pagamento = $request->forma_pagamento;
        
        if($produto_id == null){
            session()->flash('sem_produto', 'Produto inválido');
            return redirect()->route('compra');
        }
        

        $estoque_id = db::table('estoque')->insertGetId([
            'produto_id' => $produto_id,
            'estoque_valor' => $valor,
            'estoque_quantidade' => $quantidade,
            'estoque_data_entrada' => $data
        ]);

        compra::insert([
            'produto_id' => $produto_id,
            'estoque_id' => $estoque_id,
            'compra_quantidade' => $quantidade,
            'compra_valor' => $valor,
            'compra_cliente' => $cliente,
            'compra_data' => $data,
            'compra_forma_pagamento' => $forma_pagamento
        ]);

        session()->flash('Sucesso', 'Compra cadastrada com sucesso.');
        return redirect()->route('compra');
    }

    public function excluir($id){
        $compra = compra::find($id);
        $estoque_id = $compra->estoque_id;
        $estoque = estoque::find($estoque_id);
        $compra->delete();
        $estoque->delete();
        
        session()->flash('compra_excluida', 'Compra excluida com sucesso.');
        return redirect()->route('compra');

    }
}
