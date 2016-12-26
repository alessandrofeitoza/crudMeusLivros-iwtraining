<div class="col-lg-6 col-lg-offset-3 jumbotron">
    <form action="<?php echo base_url('?entidade=usuario&acao=inserir'); ?>" method="post">
        <legend>Novo Usuário</legend>

        <label>Nome:</label>
        <input type="text" name="nome" placeholder="Digite o nome" class="form-control" required>
        <br>

        <label>Email:</label>
        <input type="email" name="email" placeholder="Digite o email" class="form-control" required>
        <br>

        <label>Senha:</label>
        <input type="password" name="senha" placeholder="Digite a senha" class="form-control" required>
        <br>
        <br>

        <button class="btn btn-block btn-lg btn-primary">CONFIRMAR</button><br>

        <div class="text-center">
            <a href="<?php echo base_url(); ?>">Já possuo conta!</a>
        </div>
    </form>
</div>