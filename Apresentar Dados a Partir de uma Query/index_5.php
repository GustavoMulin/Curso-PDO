<?php 

    /*
    Agora com a query bem organizada, voltamos a ter o resultado esperado
    Mas vamos acrescentar na query uma cláusula WHERE.
    Ela vai indicar que só queremos os produtos cujo o ID seja superior
    a 100. Não existe nenhum pruduto nessa situação.
    Então vamos ter o retorno de $resultados = []
    Não existem produtos na coleção.
    */

    // dados de ligação
    $database = 'udemy_loja_online';
    $username = 'root';

    try {
        
        // ligação
        $ligacao = new PDO("mysql:host=localhost;dbname=$database", $username);

        // Execução da query
        $resultados = $ligacao->query("SELECT * FROM produtos WHERE id > 100")->fetchAll(PDO::FETCH_OBJ);
    } catch (PDOException $e) {
        $erro = "Aconteceu um erro na ligação.";
    }

    // fechar a ligação
    $ligacao = null;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDO - Apresentação de dados de uma query SQL</title>
    <link rel="stylesheet" href="bootstrap.min.css">
</head>
<body>


    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-5">

                <?php if (!empty($erro)) : ?>
                    <p class="text-center text-danger"></p><?= $erro ?></p>
                <?php else: ?>
                    <?php if(count($resultados) == 0): ?>
                        <p class="text-center">Não foram encontrados dados.</p>
                    <?php else: ?>

                        <?php foreach($resultados as $produto): ?>
                            <div class="card p-3 mb-2 bg-light texte-center">
                                <h5><?=$produto->produto?></h5>
                                <h5 class="texte-primary"><?= $produto->preco_unidade?> $</h5>
                            </div>
                        <?php endforeach;?>

                    <?php endif;?>
                <?php endif;?>

            </div>
        </div>
    </div>

</body>
</html>