@extends('dashboard.layouts.site')

@section('title', 'Main')

@section('content')
<body>
<H3 style="text-align: center;">VENDA</H3>
    <br>
    <div class="container" style="z-index:0">
        <div class="row" style="width: 80%; text-align: center; margin: auto;">
          <div class="col" style="text-align: center; border: black solid 2px; background-color: lightblue;">
            Venda de item
          </div>
        </div>
        <form action="{{route('venda_cadastrar')}}" method="post" class="login" style="padding:0px">
            @csrf
            <div class="row" style="width: 80%; margin: auto; border: black solid 1px;">
                <div class="mb-3" style="margin: 10px auto;">
                    <select class="form-control" name="produto">
                        @foreach($estoque_array AS $estoque)
                        @if($estoque->quantidade > 0)
                        <option value="{{ $estoque->id }}" name="produto">Produto: {{ $estoque->produto_id}} | Quantidade:{{ $estoque->estoque_quantidade }} | Valor: R${{ $estoque->estoque_valor }}</option>
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
</body>

@endsection