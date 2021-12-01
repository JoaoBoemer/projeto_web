@extends('dashboard.layouts.site')

@section('title', 'Produto')

@section('content')

<?php
use APP\Models\Produto;
use App\Models\un_medida;
use Illuminate\Support\Facades\DB;
?>

@if(session()->has('produto_cadastrado'))
<div class='alert alert-danger'>
    <p>{{ session()->get('produto_cadastrado')}}
</div>
@endif

@if(session()->has('Sucesso'))
<div class='alert alert-success'>
    <p>{{ session()->get('Sucesso')}}
</div>
@endif

<body>
    <H3 style="text-align: center;">ITEM</H3>
    <br>
    <div class="container" style="z-index:0">
        <div class="row" style="width: 80%; text-align: center; margin: auto;">
            <div class="col" style="text-align: center; border: black solid 2px; background-color: lightblue;">
                Edicao de item
            </div>
        </div>
        <form action="{{route('editar_produto')}}" method="post" class="login" style="padding:0px">
            @csrf
            <div class="row" style="width: 80%; margin: auto; border: black solid 1px;">
                <div class="input-group mb-3" style="margin: 10px auto;">
                    <input class="form-control" placeholder="Nome" type="text" name="nome" id="nome" required="true" maxlength="60">
                    <input class="form-control" placeholder="Apelido" type="text" name="apelido" id="apelido" required="true" maxlength="60">
                </div>
                <div class="input-group mb-3">
                    <input class="form-control" placeholder="Codigo de Referencia" type="text" name="referencia" id="referencia" required="true" maxlength="60">
                    <select class="form-select form-select" aria-label=".form-select-lg example" name="un_medida" id="un_medida" required="true">
                        <option selected value="1">Unitario</option>
                        <option value="2">Quilograma</option>
                        <option value="3">Litro</option>
                        <option value="4">Outro</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <input class="form-control" placeholder="Peso bruto (Kg)" type="number" name="peso_bruto" id="peso_bruto" required="true" onkeyup="if(this.value<0){this.value=this.value*-1}">
                    <input class="form-control" placeholder="Peso liquido (Kg)" type="number" name="peso_liquido" id="peso_liquido" required="true" onkeyup="if(this.value<0){this.value=this.value*-1}">
                </div>
                <div class="input-group mb-3">
                    <input class="form-control" placeholder="Observacoes" type="text" name="observacoes" id="observacao" required="true" maxlength="60">
                </div>
                <div style="margin: auto; text-align: right;" class="mb-2">
                    <input class="btn btn-primary" type="submit" name="submit" value="Gravar">
                </div>
            </div>
        </form>
    </div>

    <table class="table" style="width:90%; text-align:center; margin: auto;">
        <thead>
            <tr>
                <th> ID</th>
                <th> NOME </th>
                <th> APELIDO </th>
                <th> REFERENCIA </th>
                <th> PESO BRUTO </th>
                <th> PESO LIQUIDO </th>
                <th> UNIDADE </th>
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
                print($un_medida[0]->medida_apelido);?> </td>
                <td> <a href="/main/produto/{{$produto->id}}/edit" class="btn btn-primary">Edit</a> </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

@endsection