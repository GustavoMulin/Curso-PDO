<?php

// OBTER RESULTADOS COM EXECUÇÃO DE QUERIES

/*
Podemos usar o fetch para fazer o seguinte
*/

// configurações
$database = 'udemy_loja_online';
$username = 'root';

// ligação
$ligacao = new PDO("mysql:host=localhost;dbname=$database", $username);
$resultado = $ligacao->query("SELECT * FROM produtos");

while($linha = $resultado->fetch())
{
    echo 'Produto: <strong>' . $linha['produto'] . '</strong><br>';
}

// fecho da ligação
$ligacao = null;

/*
O que aconteceu aqui?
A query devolve um conjunto de resultados.
O ciclo while percorreu cade uma das linhas do resultado usadno o método fetch()
Em cada volta do ciclo, o método vai buscar o registro seguinte.
*/