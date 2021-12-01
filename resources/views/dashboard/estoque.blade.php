@extends('dashboard.layouts.site')

@section('title', 'Main')

@section('content')

<body>
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Listar</h1>
        </div>
        <h2>Itens Cadastrados</h2>
        <div class="table-responsive">
            <table class="table table-striped table-sm data-table">
                <thead>
                <tr>
                    <th scope="col">Nome</th>
                    <th scope="col">Unidade de Medida</th>
                    <th scope="col">Quantidade</th>
                    <th scope="col">Preço</th>
                    <th scope="col">Produto Perecível</th>
                    <th scope="col">Data de Fabricação</th>
                    <th scope="col">Ações</th>
                </tr>
                </thead>
                <!-- As linhas de dados da tabela são gerados no arquivo main.js (função loadItemsTable()) -->
                <tbody id="itemsBody">
                </tbody>
            </table>
        </div>
    </main>
    <script src="/assets/js/main.js"></script>
</body>

@endsection