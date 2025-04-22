<?php

// CONECTAR VIA PDO E CONTROLE DE ERROS

/*
O PDO contém mecanismos que nos permitem identificar e tratar
oa erros de conexão, para a eventualidade de acontecerem.
*/

// definir as propiedades de ligação
$database = 'udemy_loja_online';
$username = 'root';

// vamos colocar a ligação dentro de um bloco try... catch
try {

    // efetuar a ligação
    $ligacao = new PDO("mysql:host=localhost;dbname=$database", $username);

    // ver o status da ligação
    $estado = $ligacao->getAttribute(PDO::ATTR_CONNECTION_STATUS);
    echo $estado;

    $ligacao = null;
} catch(PDOException $err){
    echo 'ERRO: ' . $err->getMessage();
}

// Vamos deliberadamente colocar um erro no nome da base de dados

/*
O bloco catch apanhou uma PDOException.
Está execeção contém informações precisas sobre o erro.
Já não é uma mensagem gigante. Ela contém um código e uma mensagem.
*/