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

<body style="margin:auto">

    <header class="menu_principal">
        <br>
        <div style="width: 70%; margin: auto;">
            <div class="logoff" style="float: left;">
                <a href="/">logoff</a>
            </div>
            <div style="float: right;">
                <img style="" src="https://i.imgur.com/Bb6VAKv.png" title="source: imgur.com" />
            </div>
        </div>
        <main>
            <div>
                <div class="menu">
                    <ul>
                        <li>
                            <a href="/main">Home</a>
                        </li>
                        <li>
                            Compra
                            <ul style="z-index: 1;">
                                <li><a href="/produto">item</a></li>
                                <li><a href="/compra">Compra</a></li>
                                <li><a href="/estoque">Estoque</a></li>
                            </ul>
                        </li>
                        <li>
                            Venda
                            <ul style="z-index: 1;">
                                <li><a href="/produto">Item</a></li>
                                <li><a href="/venda">Venda</a></li>
                                <li><a href="/estoque">Estoque</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="/imposto">Imposto</a>
                        </li>
                    </ul>
                </div>
            </div>
        </main>
    </header>
    <main>
    @yield('content')
    </main>
</body>