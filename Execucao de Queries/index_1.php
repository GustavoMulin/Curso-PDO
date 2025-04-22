<?php

// OBTER RESULTADOS COM EXECUÇÃO DE QUERIES

/*
Vamos obter dados a partir da base de dados, e ver
como o PHP os pode receber.
*/

// Configurações
$database = 'udemy_loja_online';
$username = 'root';

// ligação
$ligacao = new PDO("mysql:host=localhost;dbname=$database", $username);

// ----------------------------
// comunicação simples
// $resultados = $ligacao->query("SELECT * FROM produtos");
// echo '<pre>';
// print_r($resultados);

// O retorno é um objeto PDOStatement. Aparentemente não contém os resultados.

// -----------------------------
// Podemos ter acesso aos resultados de várias formas:
$resultados = $ligacao->query("SELECT * FROM produtos")->fetchAll();
echo '<pre>';
print_r($resultados);

// fecho da ligação
$ligacao = null;