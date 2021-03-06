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
                <br>CADASTRAR
            </h2>
            <form action="{{route('register/submit')}}" method="post" class="login">
                @csrf
                <label for="email">Email</label>
                <input type="text" name="email" id="email" required="true" maxlength="60">
                <br><br>
                <label for="usuario">Usuario</label>
                <input type="text" name="usuario" id="usuario" required="true" maxlength="60">
                <br><br>
                <label for="senha">Senha</label>
                <input type="password" name="senha" id="senha" required="true" maxlength="60">
                <br><br>
                <input class="botao" type="submit" name="submit" value="salvar">
                <br><br>
                <input class="botao" type="button" value="voltar" onclick="history.back(-1)">
                <br><br>
            </form>
        </div>
    </div>
</body>

</html>