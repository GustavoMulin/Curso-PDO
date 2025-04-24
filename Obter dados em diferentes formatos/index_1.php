<?php

// OBTER DADOS EM DIFERENTES FORMATOS

/*
Já vimos que temos vindo a obter resultados em forma
de array associativos.
Vamos perceber o que isso significa.
*/

$database = 'udemy_loja_online';
$username = 'root';

$ligacao = new PDO("mysql:host=localhost;dbname=$database", $username);

$resultados = $ligacao->query("SELECT * FROM produtos")->fetchAll();

$ligacao = null;

/*
Quando chegamos a este ponto de script, a ligação já foi feita,
já foi executada a query que foi buscar TODOS os daods da tabela produtos.

Vamos analisar o que foi guardado nos $resultados
*/

echo '<pre>';
print_r($resultados);

/*
[0] => Array
        (
            [id] => 1
            [0] => 1
            [produto] => Abacate
            [1] => Abacate
            [preco_unidade] => 12.55
            [2] => 12.55
        )
O primeiro produto da coleção (assim como os restantes), vem
em formato de array que, simultaneamente, tem chaves númericas
e chaves alfanuméricas um array associativo.

Não precisamos dessa repetição.
Então vamos dizer ao PDO, como queremos que os dados venham.
*/