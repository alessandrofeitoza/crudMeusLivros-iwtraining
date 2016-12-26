<div class="col-lg-6 col-lg-offset-3 jumbotron">
    <form action="<?php echo base_url('?entidade=livro&acao=inserir'); ?>" method="POST">
        <legend>Novo Livro</legend>

        <label>Titulo</label>
        <input type="text" name="titulo" class="form-control" placeholder="Digite o Titulo" required>
        <br>

        <label>Autor</label>
        <input type="text" name="autor" class="form-control" placeholder="Informe o Autor" required>
        <br>

        <label>Editora</label>
        <input type="text" name="editora" class="form-control" placeholder="Informe a Editora" required>
        <br>

        <label>Ano</label>
        <select class="form-control" name="ano" required>
            <option value="" selected> -- Selecione -- </option>
            <?php
                for($ano = date('Y'); $ano >= 1900; $ano--){
                    echo "<option>$ano</option>";
                }
            ?>
        </select>
        <br>

        <button class="btn btn-primary btn-block btn-lg">CONFIRMAR</button>


    </form>
</div>