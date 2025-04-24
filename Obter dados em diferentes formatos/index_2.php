<?php

// OBTER DADOS EM DIFERENTES FORMATOS

/*
Em vez do método fetchAll sem qualquer parâmetro,
podemos especificar de que forma queremos os dados,

NOTA: este parametrização também vale para o fetch()

PDO::FETCH_BOTH - É a opção padrão. Por isso existerem
                  chaves numéricas e alfanuméricas misturadas
                  
PDO::FETCH_NUM  - Apenas o array com chaves numéricas com índice 0.
                  É atribuída uma chave numérica sequencial a cada coluna.

PDO::FETCH_ASSOC - Apenas o array associativo.
                   As chaves são os nomes das colunas da tabela.

PDO::FETCH_OBJ - Retorna os valores organizados num objeto anônimo
                 em que cada elemento contém as propriedades com os
                 nomes das colunas da tabela.

Existem outras opções, mas estas são as mais comuns.

*/

$database = 'udemy_loja_online';
$username = 'root';

$ligacao = new PDO("mysql:host=localhost;dbname=$database", $username);

$resultado = $ligacao->query("SELECT * FROM produtos")->fetchAll(PDO::FETCH_ASSOC);

$ligacao = null;

echo '<pre>';
print_r($resultado);