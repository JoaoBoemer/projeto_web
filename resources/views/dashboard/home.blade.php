<html>

<head>
    <title>@yield('title') - Tekcore</title>
    <meta charset="utf-8">
    <meta name="description" content="Tekcore">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="abstract" content="Tekcore" />
    <meta name="keywords" content="tekcore, loja, itajaí" />
    <meta name="title" content="Tekcore" />
    <meta name="identifier-url" content="tekcore.com.br" />
    <meta name="author" content="Joao Boemer" />
    <meta name="robots" content="all" />
    <meta name="rating" content="general" />
    <meta name="distribution" content="global" />
    <meta name="language" content="pt-br" />
    <meta property="locale" content="pt-br" />
    <meta name="content-language" content="portuguese" />
    <meta name="doc-class" content="completed" />
    <meta name="reply-to" content="joao.boemer@univali.br" />
    <meta itemprop="image" content="">
    <meta itemprop="url" content="http://www.tekcore.com.br/">
    <meta name="viewport" content="width=device-width, initial-scale=1, max-scale=1">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
</head>
<body>

    <div class="welcome">
        <br>
        <div class="welcome_box">
            <h2 style="text-align: center;">
                <br>BEM VINDO
            </h2>
            @if(session()->has('cadastrado'))
            <div class='alert alert-success'>
                <p style="text-align:center">{{ session()->get('cadastrado')}}
            </div>
            @endif
            @if(session()->has('sem_usuario_senha'))
            <div class='alert alert-danger'>
                <p style="text-align:center">{{ session()->get('sem_usuario_senha')}}
            </div>
            @endif
            @if(session()->has('usuario_nao_encontrado'))
            <div class='alert alert-danger'>
                <p style="text-align:center">{{ session()->get('usuario_nao_encontrado')}}
            </div>
            @endif
            <form action="{{route('login')}}" method="post" class="login">
                @csrf
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario" id="usuario" maxlength="60">
                <br><br>
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" maxlength="60">
                <br><br>
                <div class="forget_password">
                    <a href="">Esqueceu a senha?</a>
                </div>
                <input class="botao" type="submit" name="submit" value="login">
                <br><br>
                <button class="botao" onclick="window.location.href='/register'"><a style="text-decoration: none; color:black" href="\register">Registrar</a></button>
            </form>
        </div>
    </div>
</body>

</html>