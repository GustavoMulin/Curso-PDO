<?php

// CONECTAR VIA PDO E CONTROLE DE ERROS

/*
Não temos qualquer erro na conexão.
Deixamos de ter o bloco try... catch.
*/

$database = 'udemy_loja_online';
$username = 'root';

$ligacao = new PDO("mysql:host=localhost;dbname=$database", $username);
$ligacao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Temos um erro na query. Está isntrução não está completa.
$resultados = $ligacao->query("SELECT");

$ligacao = null;

/*
PDO::ERRMODE_SILENT - Não apresenta erros
PDO::ERROMODE_WARNING - Apresentar avisos
PDO::ERROMODE_EXCEPTION - Dispara exceções que podem ser captadas no catch

Como referi, voltaremos aos erros sempre que necessário.
*/