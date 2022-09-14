<?php require __DIR__."/../inicio-html.php";?>

<form action="/realiza-login" method="GET">
    <div class="form-group">
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" class="form-control">
    </div>

    <div class="form-group">
        <label for="senha">Senha:</label>
        <input type="password" name="senha" id="senha" class="form-control">
    </div>

    <button class="btn btn-primary">Entrar</button>
</form>

<?php require __DIR__."/../fim-html.php";?>