<?php

use sys4soft\Database;

require_once('header.php');

// inclua os arquivos necessários
require_once('config.php');
require_once('libraries/Database.php');

$contatos = null;
$total_contatos = 0;
$search = null;
$database = new Database(MYSQL_CONFIG);

// verifique se há uma postagem na pesquisa
if($_SERVER['REQUEST_METHOD'] == 'POST'){

    // resultados da pesquisa
    $search = $_POST['text_search'];
    $params = [
        ':search' => '%' . $search . '%'
    ];
    $results = $database->execute_query("SELECT * FROM contactos WHERE nome LIKE :search OR telefone LIKE :search ORDER BY id DESC", $params);
} else {
    $results = $database->execute_query("SELECT * FROM contactos ORDER BY id DESC");
}

$contatos = $results->results;
$total_contatos = $results->affected_rows;

?>

<!-- pesquisar e adicionar novo -->
<div class="row align-items-center mb-3">
    <div class="col">

        <form action="index.php" method="post">
            <div class="row">
                <div class="col-auto"><input type="text" class="form-control" name="text_search" id="text_search" minlength="3" maxlength="20" required></div>
                <div class="col-auto"><input type="submit" class="btn btn-outline-dark" value="Procurar"></div>
                <div class="col-auto"><a href="index.php" class="btn btn-outline-dark">Ver tudo</a></div>
            </div>
        </form>

    </div>

    <div class="col text-end">
        <a href="adicionar_contato.php" class="btn btn-outline-dark">Adicionar contato</a>
    </div>
</div>

<!-- mostrar tabela de contato -->
<div class="row">
    <div class="col">
        <?php if($total_contatos == 0): ?>
            <!-- sem resultados -->
            <p class="text-center opacity-75 mt-3">Não foram encontrados contatos registados.</p>
        <?php else:?>
            <!-- resultados -->
            <table class="table table-sm table-striped table-bordered">
                <thead class="bg-dark text-white">
                    <tr>
                        <th width="40%">Nome</th>
                        <th width="30%">Telefone</th>
                        <th width="15%"></th>
                        <th width="15%"></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($contatos as $contato): ?>
                    <tr>
                        <td><?= $contato->nome ?></td>
                        <td><?- $contato->telefone ?></td>
                        <td class="text-center"><a href="editar_contato.php?id=<?= $contato->id?>">Editar</a></td>
                        <td class="text-center"><a href="eliminar_contato.php?id=<?= $contato->id?>">Eliminar</a></td>
                    </tr>
                    <?php endforeach;?>
                </tbody>
            </table>

            <!-- resultados totais -->
            <div class="row">
                <div class="col">
                    <p>Total: <strong><?= $total_contatos ?></strong></p>
                </div>
            </div>
        <?php endif;?>
        



    </div>
</div>

<?php
require_once('footer.php');
?>