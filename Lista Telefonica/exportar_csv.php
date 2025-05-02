<?php

// exportar todos os dados para arquivo CSV

use sys4soft\Database;

require_once('config.php');
require_once('libraries/Database.php');

$database = new Database(MYSQL_CONFIG);

// obter resultados
$results = $database->execute_query("SELECT * FROM contactos");

$rows = $results->results;

// armazenar dados em arquivo csv
$filename ="contatos_" . time() . '.csv';

$file = fopen($filename, 'w');

// armazenar o cabeçalho
$headers = [];
foreach($rows[0] as $key => $value) {
    $headers[] = $key;
}

fputcsv($file, $headers);

// armazenar as linhas
$tmp = [];
foreach($rows as $row) {
    $dados = (array)$row;
    fputcsv($file, $dados);
}

fclose($file);

// dowload do ficheiro
//Essa linha diz ao navegador que o conteúdo que vem a seguir é uma transferência de arquivo.
header('Content-Description: File Transfer');

// Isso define o tipo de conteúdo como binário genérico.
header('Content-Type: application/octet-stream');

// Essa linha força o download e define o nome do arquivo que será baixado.
header('Content-Disposition: attachment; filename=' . $filename . '"');

// Diz ao navegador que o arquivo não deve ser guardado em cache.
// Ou seja, sempre que acessar, será baixado de novo.
header('Expires: 0');

// Exige que o navegador revalide com o servidor antes de usar qualquer versão em cache.
header('cache-control: must-revalidate');

// Compatibilidade antiga: permite o uso de cache por navegadores mais antigos.
header('pragma: public');

// Define o tamanho do arquivo (em bytes), o que ajuda o navegador a exibir a barra de progresso corretamente.
header('Content-lenght: ' . filesize($filename));
readfile($filename);