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
        <form action="{{route('editar_produto', $produto)}}" method="post" class="login" style="padding:0px">
            @method('PUT')
            @csrf
            <div class="row" style="width: 80%; margin: auto; border: black solid 1px;">
                <div class="input-group mb-3" style="margin: 10px auto;">
                    <input class="form-control" placeholder="Nome" value="{{ old('nome') ?? $produto->produto_nome }}" type="text" name="nome" id="nome" required="true" maxlength="60">
                    <input class="form-control" placeholder="Apelido" value ="{{ old('apelido') ?? $produto->produto_apelido }}" type="text" name="apelido" id="apelido" required="true" maxlength="60">
                </div>
                <div class="input-group mb-3">
                    <input class="form-control" placeholder="Codigo de Referencia" value="{{ old('referencia') ?? $produto->produto_referencia }}" type="text" name="referencia" id="referencia" required="true" maxlength="60">
                    <select class="form-select form-select" aria-label=".form-select-lg example" name="un_medida" id="un_medida" required="true">
                        <option selected value="1">Unitario</option>
                        <option value="2">Quilograma</option>
                        <option value="3">Litro</option>
                        <option value="4">Outro</option>
                    </select>
                </div>
                <div class="input-group mb-3">
                    <input class="form-control" placeholder="Peso bruto (Kg)" value="{{ old('peso_bruto') ?? $produto->produto_peso_bruto }}" type="number" name="peso_bruto" id="peso_bruto" required="true" onkeyup="if(this.value<0){this.value=this.value*-1}">
                    <input class="form-control" placeholder="Peso liquido (Kg)" value="{{ old('peso_liquido') ?? $produto->produto_peso_liquido }}" type="number" name="peso_liquido" id="peso_liquido" required="true" onkeyup="if(this.value<0){this.value=this.value*-1}">
                </div>
                <div class="input-group mb-3">
                    <input class="form-control" placeholder="Observacoes" value="{{ old('observacoes') ?? $produto->produto_observacoes }}" type="text" name="observacoes" id="observacoes" required="true" maxlength="60">
                </div>
                <div style="margin: auto; text-align: right;" class="mb-2">
                    <input class="btn btn-primary" type="submit" name="submit" value="Gravar">
                    <td> <a href="/produto/excluir/{{$produto->id}}" class="btn btn-primary">Excluir</a> </td>
                </div>
            </div>
        </form>
    </div>
</body>

@endsection