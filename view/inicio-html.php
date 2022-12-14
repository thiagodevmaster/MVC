<!DOCTYPE html>
        <html lang="pt-BR">
        <head>
            <meta charset="UTF-8">
            <title>Document</title>
            <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        </head>
        <body>
        
        <?php if(isset($_SESSION['logado'])): ?>
            <header>
                <nav class="navbar navbar-dark bg-dark mb-2">
                    <a class="navbar-brand" href="/listar-cursos">Home</a>
    
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a href="/logout" class="nav-link">Sair</a>
                        </li>
                    </ul>
                </nav>
            </header>
        <?php endif; ?>

        <div class="container">
            <div class="jumbotron">
                <h1><?= $titulo; ?></h1>
            </div>

            <div class="alert alert-<?php  
                if(isset($_SESSION['tipo_mensagem'])){
                    echo $_SESSION['tipo_mensagem'];
                }; 
            ?>">
                <?php 
                    if(isset($_SESSION['mensagem'])){
                        echo $_SESSION['mensagem'];
                    };
                ?>
            </div>

            <?php 
                unset($_SESSION['mensagem']);
                unset($_SESSION['tipo_mensagem']);
            ?>