@extends('dashboard.layouts.site')

@section('title', 'Main')

@section('content')

<body>
    <div class="body_text">
        <p>&#160Aqui explicaremos um pouco dos calculos realizados.</p>
        <p>&#160No lucro presumido, o nível de detalhamento das declarações é menor que o lucro real mas ainda sim é necessário um pouco do esforço do contribuinte.</p>
        <p>&#160Nele, é adotado o regime cumulativo, aonde as alíquotas de PIS/COFINS são menores, sendo elas de 3,00 % e 0,65%. Contúdo, nesse regime, a cobrança será referente ao faturamento da empresa, ou seja, independente dos lucros, se a empresa acabou lucrando pouco em um mês, se houve um bom faturamento, os impostos serão altos também.</p>
        <p>&#160Já no lucro real, o PIS/COFINS tem alíquotas maiores de 1,65% e 7,6%, contúdo, há algumas deduções de impostos, e outros impostos como o IRPJ (Imposto de renda de Pessoa Jurídica) e o CSLL são debitados apenas dos lucros da empresa.</p>
        <p>&#160Nesse sistema, realizaremos as cobranças por TRIMESTRE, mas, você pode inserir os dias desejados para a cobrança caso queira ter uma noção do valor que será pago em um determinado período.</p>
    </div>
    <form action="{{route('calcular_imposto')}}" method="post">
        @csrf
        <div class="date_title" style="width: 50%; text-align:center">
            <input type="date" name="data_inicio" style="border: none;" required="true">
            <input type="date" name="data_fim" style="border: none;" required="true">
            <input class="button" type="submit" name="submit" value="Executar">
        </div>
    </form>
    <div class="input-group mb-3">
        <div class="sub_title2">
            &#160LUCRO REAL (TOTAL): R$0,00
        </div>
        <div class="sub_title2">
            &#160Lucro presumido: R$0,00
        </div>
    </div>
    <div class="input-group mb-3">
        <div class="sub_title2">
            &#160Debitos (pago): R$0,00
        </div>
        <div class="sub_title2">
            &#160Debitos (pago): R$0,00
        </div>
    </div>
    <div class="input-group mb-3">
        <div class="sub_title2">
            &#160Credito (recebido): R$0,00
        </div>
        <div class="sub_title2">
            &#160Credito (recebido): R$0,00
        </div>
    </div>
</body>

@endsection