@extends('dashboard.layouts.site')

@section('title', 'Produto')

@section('content')

<body>
<form action="{{route('excluir_produto', $id)}}" method="post">
     {{ csrf_field() }}
     {{method_field('DELETE')}}
      <p>Tem certeza que deseja deletar o produto?</p>
      <div class="modal-header">
      <h4 style="margin:auto"> ID do prduto: {{ $id }}</h4>
     </div>
     <button type="submit" class="btn btn-danger">Deletar</button>
</form>
</body>

@endsection