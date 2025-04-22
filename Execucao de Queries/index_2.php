<?php

// OBTER RESULTADOS COM EXECUÇÃO DE QUERIES

/*
Os métodos fetch() e fetchAll() diferem no seguinte aspecto:
    fetch() vai buscar o próximo elemento da coleção de dados.
    fetchAll() vai buscar todos de uma vez.

Vejamos a diferença entre os dois.
*/

// configurações
$database = 'udemy_loja_online';
$username = 'root';

// ligação
$ligacao = new PDO("mysql:host=localhost;dbname=$database", $username);

// utilização do fetch
$resultados = $ligacao->query("SELECT * FROM produtos")->fetch();

echo '<pre>';
print_r($resultados);

// Com o fetch() fomos apenas buscar o primeiro elemento da coleção.

// fecho da ligaçaõ
$ligacao = null;