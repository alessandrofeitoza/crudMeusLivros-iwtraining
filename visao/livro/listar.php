<div class="col-lg-12">
    <a href="<?php echo base_url('?entidade=livro&acao=novo'); ?>" class="btn btn-default">
        <span class="glyphicon glyphicon-book"></span>
        Novo Livro
    </a>

    <br><br>

    <?php
        if($livros == false){
            echo '<h2>Não Existem Livros!</h2>';
        }else{

            echo '<table class="table table-hover table-striped">';
                echo '<tr>';
                    echo '<th>Titulo</th>';
                    echo '<th>Autor</th>';
                    echo '<th>Editora</th>';
                    echo '<th>Ano</th>';
                    echo '<th>Adicionado em</th>';
                    echo '<th>Opções</th>';
                echo '</tr>';

            foreach($livros as $cada_livro){
                echo '<tr>';
                    echo '<td>',$cada_livro->titulo,'</td>';
                    echo '<td>',$cada_livro->autor,'</td>';
                    echo '<td>',$cada_livro->editora,'</td>';
                    echo '<td>',$cada_livro->ano,'</td>';
                    echo '<td>',$cada_livro->criado_em,'</td>';
                    echo '<td>';
                        echo '<a href="',base_url('?entidade=livro&acao=editar&id='.$cada_livro->id_livro),'" class="btn btn-warning">';
                            echo '<span class="glyphicon glyphicon-edit"></span>';
                        echo '</a>';

                        echo ' <a href="',base_url('?entidade=livro&acao=excluir&id='.$cada_livro->id_livro),'" class="btn btn-danger">';
                            echo '<span class="glyphicon glyphicon-trash"></span>';
                        echo '</a>';
                    echo '</td>';
                echo '</tr>';
            }
            echo '</table>';

        }
    ?>
</div>