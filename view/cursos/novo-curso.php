<?php  require __DIR__."/../inicio-html.php";?>
    
    <form action="/salvar-curso<?= isset($curso) ? '?id=' . $curso->getId() : ''; ?>" method="POST">
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <input type="text" name="descricao" id="descricao" class="form-control" value="<?= $input_value;?>">
        </div>
        <button class="btn btn-primary">Salvar</button>
    </form>

<?php  require __DIR__."/../fim-html.php";?>