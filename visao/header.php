<header class="row">
    <nav class="navbar navbar-inverse">
        <div class="col-lg-4">
            <a href="<?php echo base_url(); ?>" class="navbar-brand">
                <span class="glyphicon glyphicon-book"></span> Meus Livros
            </a>
        </div>

        <div class="col-lg-4 col-lg-offset-4">
            <?php if(isset($us)){ ?>
                <div class="text-right">

                    <h4 style="color: #fff;"><?php echo $us->nome; ?></h4>

                    <a href="<?php echo base_url("?entidade=usuario&acao=editar"); ?>" class="btn btn-default btn-xs"> <span class="glyphicon glyphicon-user"></span> Perfil</a>

                    <a href="<?php echo base_url("?entidade=usuario&acao=logout"); ?>" class="btn btn-default btn-xs"><span class="glyphicon glyphicon-off"></span> Sair</a>

                </div>
            <?php } ?>
        </div>
    </nav>
</header>
