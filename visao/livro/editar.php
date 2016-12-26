<div class="col-lg-6 col-lg-offset-3 jumbotron">
    <form action="<?php echo base_url('?entidade=livro&acao=atualizar'); ?>" method="POST">
        <legend>Editar Livro</legend>

        <label>Titulo</label>
        <input type="text" name="titulo" value="<?php echo $livro->titulo; ?>" class="form-control" placeholder="Digite o Titulo" required>
        <br>

        <label>Autor</label>
        <input type="text" name="autor" value="<?php echo $livro->autor; ?>" class="form-control" placeholder="Informe o Autor" required>
        <br>

        <label>Editora</label>
        <input type="text" name="editora" value="<?php echo $livro->editora; ?>" class="form-control" placeholder="Informe a Editora" required>
        <br>

        <label>Ano</label>
        <select class="form-control" name="ano" required>
            <option value="" selected> -- Selecione -- </option>
            <?php
            echo '<option selected>',$livro->ano,'</option>';
            for($ano = date('Y'); $ano >= 1900; $ano--){
                echo "<option>$ano</option>";
            }
            ?>
        </select>
        <br>

        <input type="hidden" name="id" value="<?php echo $livro->id_livro; ?>">

        <button class="btn btn-primary btn-block btn-lg">CONFIRMAR</button>


    </form>
</div>