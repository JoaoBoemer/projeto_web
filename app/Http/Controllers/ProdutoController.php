<?php

namespace App\Http\Controllers;

use App\Models\Estoque;
use Illuminate\Http\Request;
use App\Models\produto;
use Illuminate\Support\Facades\DB;

class ProdutoController extends Controller
{
    public function cadastrar(Request $request)
    {
        $teste = produto::select('*')->where(['produto_nome' => $request->nome])->get();
        if ($teste <> null) {
            foreach ($teste as $object) {
                $nome = $object->produto_nome;
                $referencia = $object->produto_referencia;
                if ($nome == $request->nome and $referencia == $request->referencia) {
                    session()->flash('produto_cadastrado', 'Um produto ja foi cadastrado com esse nome e código de referência');
                    return redirect()->route('produto');
                }
            }
        }
        produto::insert([
            'produto_nome' => $request->nome,
            'produto_apelido' => $request->apelido,
            'produto_referencia' => $request->referencia,
            'produto_peso_bruto' => $request->peso_bruto,
            'produto_peso_liquido' => $request->peso_liquido,
            'produto_observacoes' => $request->observacoes,
            'un_medida_id' => $request->un_medida
        ]);
        session()->flash('Sucesso', 'Produto cadastrado');
        return redirect()->route('produto');
    }
    public function edit($id)
    {
        $produto = Produto::find($id);
        return view('dashboard/edit', compact('produto'));
    }

    public function update(Request $request, $id)
    {
        $produto = Produto::findOrFail($id);
        $nome = $request->nome;
        $apelido = $request->apelido;
        $referencia = $request->referencia;
        $un_medida = $request->un_medida;
        $peso_bruto = $request->peso_bruto;
        $peso_liquido = $request->peso_liquido;
        $observacoes = $request->observacoes;
        $produto->produto_nome = $nome;
        $produto->produto_apelido = $apelido;
        $produto->produto_referencia = $referencia;
        $produto->un_medida_id = $un_medida;
        $produto->produto_peso_bruto = $peso_bruto;
        $produto->produto_peso_liquido = $peso_liquido;
        $produto->produto_observacoes = $observacoes;
        $produto->save();
        session()->flash('produto_atualizado', 'Produto atualizado com sucesso!');
        return redirect()->route('produto');
    }

    public function excluir($id)
    {
        return view('dashboard/excluir', compact('id'));
    }

    public function destroy($id)
    {
        $produto = Produto::find($id);
        // if($produto in estoque) {
            // Nao faz e retonar :D
            // session()->flash('produto_em_estoque', 'Produto não pode ser excluido pois está no esotque.');
            // return redirect()->route('produto');
        // }
        $produto->delete();
        session()->flash('produto_excluido', 'Produto deletado com sucesso.');
        return redirect()->route('produto');
    }
}
