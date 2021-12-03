@extends('dashboard.layouts.site')

@section('title', 'Main')

@section('content')

<?php use App\Models\Produto; ?>

@if(session()->has('saldo_insuficiente'))
<div class='alert alert-danger'>
    <p>{{ session()->get('saldo_insuficiente')}}
</div>
@endif
@if(session()->has('venda_excluida'))
<div class='alert alert-success'>
    <p>{{ session()->get('venda_excluida')}}
</div>
@endif
@if(session()->has('data_venda'))
<div class='alert alert-danger'>
    <p>{{ session()->get('data_venda')}}
</div>
@endif
@if(session()->has('success'))
<div class='alert alert-success'>
    <p>{{ session()->get('success')}}
</div>
@endif

<body>
    <H3 style="text-align: center;">VENDA</H3>
    <br>
    <div class="container" style="z-index:0">
        <div class="row">
            <div class="col" style="text-align: center; border: black solid 2px; background-color: lightblue;">
                Venda de item
            </div>
        </div>
        <form action="{{route('venda_cadastrar')}}" method="post" class="login" style="padding:0px">
            @csrf
            <div class="row" style="border: black solid 1px;">
                <div class="mb-3" style="margin: 10px auto;">
                    <select class="form-control" name="produto" required="true">
                        @foreach($estoque_array AS $estoque)
                        @if($estoque->estoque_quantidade > 0)
                        <option value="{{ $estoque->id }}" name="produto">
                            Produto: 
                            <?php $produto = Produto::select('produto_nome')->where(['id' => $estoque->produto_id])->first();
                            print($produto->produto_nome); ?> </td>
                            | Produto ID: {{ $estoque->produto_id}} | Quantidade: {{ $estoque->estoque_quantidade }} | Valor: R${{ $estoque->estoque_valor }}</option>
                        @endif
                        @endforeach
                    </select>
                </div>
                <div class="input-group mb-3">
                    <input class="form-control" placeholder="Quantidade" type="number" name="quantidade" step='0.01' required="true" onkeyup="if(this.value<0){this.value=this.value*-1}">
                    <input class="form-control" placeholder="Valor" type="number" name="valor" step='0.01' required="true" onkeyup="if(this.value<0){this.value=this.value*-1}">
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
    <table class="table" style="width:75%; text-align:center; margin: auto;">
        <thead>
            <tr>
                <th> ID</th>
                <th> NOME DO PRODUTO </th>
                <th> CLIENTE </th>
                <th> QUANTIDADE </th>
                <th> VALOR </th>
                <th> DATA </th>
                <th> FORMA DE PAGAMENTO </th>
                <th> EXCLUIR </th>
            </tr>
        </thead>
        <tbody>
            @foreach($vendas as $venda)
            <tr>
                <td> {{$venda->id}} </td>
                <td> <?php $produto = produto::select('produto_nome')->where(['id' => $venda->produto_id])->first();
                print($produto->produto_nome); ?> </td>
                <td> {{$venda->venda_cliente}} </td>
                <td> {{$venda->venda_quantidade}} </td>
                <td> R${{$venda->venda_valor}} </td>
                <td> {{$venda->venda_data}} </td>
                <td> {{$venda->venda_forma_pagamento}} </td>
                <td> <a href="venda/{{$venda->id}}" class="btn btn-primary">Excluir</a> </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

@endsection