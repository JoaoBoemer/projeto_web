@extends('dashboard.layouts.site')

@section('title', 'Main')

@section('content')

<?php
use APP\Models\Produto;
use App\Models\un_medida;
?>

<body>
    <main class="col-md-9 ms-sm-auto col-lg-12 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 style="margin:auto">Estoque</h1>
        </div>
        <table class="table">
                <thead>
                    <tr>
                        <th> ID</th>
                        <th> PRODUTO_ID </th>
                        <th> NOME DO PRODUTO </th>
                        <th> QUANTIDADE </th>
                        <th> VALOR </th>
                        <th> DATA DE ENTRADA </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($estoque_array as $estoque)
                    @if($estoque->estoque_quantidade > 0)
                    <tr>
                        <td> {{$estoque->id}} </td>
                        <td> {{$estoque->produto_id}} </td>
                        <td> <?php $produto = produto::select('produto_nome')->where(['id' => $estoque->produto_id])->first();
                                print($produto->produto_nome); ?> </td>
                        <td> {{$estoque->estoque_quantidade}} </td>
                        <td> R${{$estoque->estoque_valor}} </td>
                        <td> {{$estoque->estoque_data_entrada}} </td>
                    </tr>
                    @endif
                    @endforeach
                </tbody>
            </table>
        <br><h3>Itens Cadastrados</h3><br>
        <div class="table-responsive">
            <table class="table">
                <thead>
                    <tr>
                        <th> ID</th>
                        <th> NOME </th>
                        <th> APELIDO </th>
                        <th> REFERENCIA </th>
                        <th> PESO BRUTO </th>
                        <th> PESO LIQUIDO </th>
                        <th> UNIDADE </th>
                        <th> OBSERVACOES </th>
                        <th> EDITAR </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produtos as $produto)
                    <tr>
                        <td> {{$produto->id}} </td>
                        <td> {{$produto->produto_nome}} </td>
                        <td> {{$produto->produto_apelido}} </td>
                        <td> {{$produto->produto_referencia}} </td>
                        <td> {{$produto->produto_peso_bruto}} </td>
                        <td> {{$produto->produto_peso_liquido}} </td>
                        <td> <?php $un_medida = un_medida::select('medida_apelido')->where(['id' => $produto->un_medida_id])->first();
                                print($un_medida->medida_apelido); ?> </td>
                        <td> {{$produto->produto_observacoes}} </td>
                        <td> <a href="produto/{{$produto->id}}" class="btn btn-primary">Editar</a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
    <!-- <script src="/assets/js/main.js"></script> -->
</body>

@endsection