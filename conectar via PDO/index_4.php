<?php

// CONECTAR VIA PDO E CONTROLE DE ERROS

/*
Por padrão, o PDO vai emitir uma exceção sempre que
acontece um erro.
*/

$database = 'udemy_loja_onlinexxxx';
$username = 'root';

try {
    $ligacao = new PDO("mysql:host=localhost;dbname=$database", $username);

    // definir o modo como os erros serão tratados
    // neste caso, sendo o padrão, indica que o modo de erro é
    // a apresentaçãp de execeções.
    $ligacao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $estado = $ligacao->getAttribute(PDO::ATTR_CONNECTION_STATUS);
    echo $estado;

    $ligacao = null;
} catch(PDOException $err){

    // vamos ver o que o $err contém
    echo '<pre>';
    print_r($err);

    echo '<hr>';
    print_r($err->errorInfo);
}

/*
Prepara o nosso código contra os erros é fundamental.
Não iremos por agora aprofunda muito esta matéria, mas sempre
que necessário iremos voltar aos erros.

Vejamos contudo ainda o exemplo seguinte.
*/