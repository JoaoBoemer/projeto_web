<?php

namespace App\Http\Controllers;

use App\Models\Estoque;
use Illuminate\Http\Request;
use App\Models\produto;

class ProdutoController extends Controller
{
    public function show(){
        return 0;
    }
    public function index(){
        return 0;
    }
    public function produto(Request $request)
    {

        $teste = produto::select('*')->where(['produto_nome' => $request->nome])->get();
        foreach ($teste as $object) {
            $nome = $object->produto_nome;
            $referencia = $object->produto_referencia;
            if ($nome == $request->nome and $referencia == $request->referencia) {
                session()->flash('produto_cadastrado', 'Um produto ja foi cadastrado com esse nome e código de referência');
                return redirect()->route('produto_cadastrado');
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
        return redirect()->route('produto_cadastrado');
    }
    public function edit($id){
        $produto = Produto::find($id);
        return view('produto_cadastrado');
    }
}
