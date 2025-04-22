<?php

// CONECTAR VIA PDO E CONTROLE DE ERROS

// Vamos colocar propositalmente um erro nas configurações.
// Devemos ter sempre em conta a possibilidade de ter erros na execução.

// definir as propriedades da ligação
$database = 'udemy_loja_onlinexxxx';
$username = 'root';

// efetuar a ligação
$ligacao = new PDO("mysql:host=localhost;dbname=$database", $username);

$estado = $ligacao->getAttribute(PDO::ATTR_CONNECTION_STATUS);
echo $estado;

$ligacao = null;

/*
Vamos ser surpreendidos por um erro.
Vejamos o que o erro nos diz
*/