<br><br><br>

<div class="col-lg-4 col-lg-offset-4 jumbotron">
    <form action="<?php echo base_url('?entidade=usuario&acao=login'); ?>" method="POST">
        <input type="email" class="form-control input-lg" placeholder="Email" name="email" required>
        <br>

        <input type="password" class="form-control input-lg" placeholder="Senha" name="senha" require>
        <br>

        <button class="btn btn-lg btn-block btn-primary">Entrar</button><br>

        <div class="text-center">
            <a href="<?php echo base_url('?entidade=usuario&acao=novo'); ?>">Criar uma conta!</a>
        </div>
    </form>
</div>