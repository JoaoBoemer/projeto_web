@extends('dashboard.layouts.site')

@section('title', 'Main')

@section('content')

<body>
<H3 style="text-align: center;">COMPRA</H3>
    <br>
    <div class="container" style="z-index:0">
        <div class="row" style="width: 80%; text-align: center; margin: auto;">
          <div class="col" style="text-align: center; border: black solid 2px; background-color: lightblue;">
            Compra de item
          </div>
        </div>
        <div class="row" style="width: 80%; margin: auto; border: black solid 1px;">
            <div class="mb-3" style="margin: 10px auto;">
                <select class="form-select form-select" placeholder="A">
                    <option value="1">PRODUTO</option>
                  </select>
            </div>
            <div class="input-group mb-3">
                <input type="number" class="form-control" onkeyup="if(this.value<0){this.value= this.value * -1}" placeholder="Codigo de referencia" aria-label="Codigo">
                <select class="form-select form-select">
                    <option selected>UN</option>
                    <option value="1">KG</option>
                    <option value="2">CAIXA</option>
                    <option value="3">OUTRO</option>
                  </select>
                </div>
            <div class= "mb-3">
                <input type="text" class="form-control" placeholder="Cliente" aria-label="Cliente">
            </div>
            <div class="input-group mb-3">
                <input type="number" class="form-control" onkeyup="if(this.value<0){this.value= this.value * -1}" placeholder="Peso unitario (Kg) " aria-label="Peso">
                <input type="number" class="form-control" onkeyup="if(this.value<0){this.value= this.value * -1}" placeholder="Valor (R$)" aria-label="Valor">
            </div>
            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Observacoes" aria-label="Observacoes">
            </div>
            <div style="margin: auto; text-align: right;" class="mb-2">
                <button type="button" class="btn btn-primary">Gravar</button>
            </div>
        </div>
    </div>
</body>

@endsection