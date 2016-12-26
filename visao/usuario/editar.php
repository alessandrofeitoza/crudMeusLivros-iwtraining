<div class="col-lg-6 col-lg-offset-3 jumbotron">
    <form action="<?php echo base_url('?entidade=usuario&acao=atualizar'); ?>" method="post">
        <legend>Atualizar Perfil</legend>

        <label>Nome:</label>
        <input type="text" value="<?php echo $us->nome; ?>" name="nome" placeholder="Digite o nome" class="form-control" required>
        <br>

        <label>Email:</label>
        <input type="email" value="<?php echo $us->email; ?>" name="email" placeholder="Digite o email" class="form-control" required>
        <br>

        <label>Senha:</label>
        <input type="password" name="senha" placeholder="Digite a senha" class="form-control">
        <br>
        <br>

        <button class="btn btn-block btn-lg btn-primary">CONFIRMAR</button><br>
    </form>

    <div class="text-center">
        <a data-toggle="modal" href="#excluir_conta">Excluir Conta</a>
    </div>

    <div class="modal fade" id="excluir_conta" data-toggle="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">Você tem certeza?</div>
                </div>
                <div class="modal-body">

                </div>
                <div class="modal-footer">
                    <a href="<?php echo base_url('?entidade=usuario&acao=excluir'); ?>" class="btn btn-danger">Sim</a>
                    <button class="btn btn-danger" data-dismiss="modal">Não</button>
                </div>
            </div>
        </div>
    </div>
</div>