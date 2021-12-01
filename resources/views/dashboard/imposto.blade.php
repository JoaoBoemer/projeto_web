@extends('dashboard.layouts.site')

@section('title', 'Main')

@section('content')

<body>
<div class="body_text">
        Aqui explicaremos um pouco dos calculos realizados.<br>
        No lucro presumido, o nível de detalhamento das declarações é menor que o lucro real mas ainda sim é necessário um pouco do esforço do contribuinte.<br>
        Nele, é adotado o regime cumulativo, aonde as alíquotas de PIS/COFINS são menores, sendo elas de 3,00 % e 0,65%. Contúdo, nesse regime, não são gerados créditos de impostos na venda de produtos, apenas é deduzido na compra. No lucro real é tributado com os valores do PIS/COFINS de 7,6% e 1,65% na compra, contudo o mesmo é recebido de crédito na venda, assim, compensando parte dos gastos.
    </div>
    <div class="date_title">
        <div class="date_content">
            &#160 Escolha a data:
            <input type="date" id="data" name="data" style="border: none;">
        </div>
    </div>
    <div class="input-group mb-3" style="width: 800px; margin: auto;">
        <div class="sub_title2">
            &#160LUCRO REAL (TOTAL): R$0,00
        </div>
        <div class="sub_title2">
            &#160Lucro presumido: R$0,00
        </div>
    </div>
    <div class="input-group mb-3" style="width: 800px; margin: auto;">
        <div class="sub_title2">
            &#160Debitos (pago): R$0,00
        </div>
        <div class="sub_title2">
            &#160Debitos (pago): R$0,00
        </div>
    </div>
    <div style="width: 735px; margin: auto;">
        <div style="width: 350px; border: black 1px solid;">
            &#160Credito (recebido): R$0,00
        </div>
    </div>
    
</body>

@endsection