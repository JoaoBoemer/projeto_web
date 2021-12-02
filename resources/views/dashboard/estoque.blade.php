@extends('dashboard.layouts.site')

@section('title', 'Main')

@section('content')

<?php

use APP\Models\Produto;
use App\Models\un_medida;
use Illuminate\Support\Facades\DB;
?>

<body>
    <main class="col-md-9 ms-sm-auto col-lg-12 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom" style="margin:0px">
            <h1 class="h2">Estoque</h1>
        </div>
        <h2>Itens Cadastrados</h2>
        <div class="table-responsive">
            <table class="table" style="margin: auto;">
                <thead>
                    <tr>
                        <th> ID</th>
                        <th> NOME </th>
                        <th> APELIDO </th>
                        <th> REFERENCIA </th>
                        <th> PESO BRUTO </th>
                        <th> PESO LIQUIDO </th>
                        <th> UNIDADE </th>
                        <th> Observação </th>
                        <th> EDITAR </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produtos as $produto)
                    <?php
                    $teste = Produto::join('un_medida', 'un_medida_id', DB::RAW($produto->un_medida_id))->get();
                    ?>
                    <tr>
                        <td> {{$produto->id}} </td>
                        <td> {{$produto->produto_nome}} </td>
                        <td> {{$produto->produto_apelido}} </td>
                        <td> {{$produto->produto_referencia}} </td>
                        <td> {{$produto->produto_peso_bruto}} </td>
                        <td> {{$produto->produto_peso_liquido}} </td>
                        <td> <?php $un_medida = un_medida::select('medida_apelido')->where(['id' => $produto->un_medida_id])->get();
                                print($un_medida[0]->medida_apelido); ?> </td>
                        <td> {{$produto->produto_obsercacoes}} </td>
                        <td> <a href="produto/{{$produto->id}}" class="btn btn-primary">Editar</a> </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
    <script src="/assets/js/main.js"></script>
</body>

@endsection