@extends('dashboard.layouts.site')

@section('title', 'Main')

@section('content')

@if(session()->has('Sucesso'))
<div class='alert alert-success'>
    <p>{{ session()->get('Sucesso')}}
</div>
@endif
@if(session()->has('compra_excluida'))
<div class='alert alert-success'>
    <p>{{ session()->get('compra_excluida')}}
</div>
@endif
@if(session()->has('sem_produto'))
<div class='alert alert-danger'>
    <p>{{ session()->get('sem_produto')}}
</div>
@endif
    <H3 style="text-align: center;">COMPRA</H3>
    <br>
    <div class="container" style="z-index:0">
        <div class="row" style="width: 80%; text-align: center; margin: auto;">
            <div class="col" style="text-align: center; border: black solid 2px; background-color: lightblue;">
                Compra de item
            </div>
        </div>
        <form action="{{route('compra_cadastrar')}}" method="post" class="login" style="padding:0px">
            @csrf
            <div class="row" style="width: 80%; margin: auto; border: black solid 1px;">
                <div class="mb-3" style="margin: 10px auto;">
                    <select class="form-control" name="produto" required="true">
                        @foreach($produto_array AS $produto)
                        <option value="{{ $produto->id }}" name="produto">{{ $produto->produto_nome }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3">
                    <input class="form-control" placeholder="Quantidade" type="number" name="quantidade" step='0.01' required="true" onkeyup="if(this.value<0){this.value=this.value*-1}">
                    <input class="form-control" placeholder="Valor" min="0.01" type="number" name="valor" step='0.01' required="true" onkeyup="if(this.value<0){this.value=this.value*-1}">
                </div>
                <div class="mb-3">
                    <input class="form-control" placeholder="Cliente" type="text" name="cliente" required="true">
                </div>
                <div class="input-group mb-3">
                    <input class="form-control" placeholder="Data" type="date" name="data" required="true">
                </div>
                <div class="input-group mb-3">
                    <input class="form-control" placeholder="Forma de pagamento" type="text" name="forma_pagamento" required="true">
                </div>
                <div style="margin: auto; text-align: right;" class="mb-2">
                    <input class="btn btn-primary" type="submit" name="submit" value="Gravar">
                </div>
            </div>
        </form>
    </div>
    <h2>
        COMPRAS CADASTRADAS
    </h2>
    <table class="table" style="width:75%; text-align:center; margin: auto;">
        <thead>
            <tr>
                <th> ID</th>
                <th> NOME DO PRODUTO </th>
                <th> QUANTIDADE </th>
                <th> VALOR </th>
                <th> DATA </th>
                <th> FORMA DE PAGAMENTO </th>
                <th> EXCLUIR </th>
            </tr>
        </thead>
        <tbody>
            @foreach($compras as $compra)
            <tr>
                <td> {{$compra->id}} </td>
                <td> {{$compra->id}} </td>
                <td> {{$compra->compra_quantidade}} </td>
                <td> R${{$compra->compra_valor}} </td>
                <td> {{$compra->compra_data}} </td>
                <td> {{$compra->compra_forma_pagamento}} </td>
                <td> <a href="compra/{{$compra->id}}" class="btn btn-primary">Excluir</a> </td>
            </tr>
            @endforeach
        </tbody>

@endsection