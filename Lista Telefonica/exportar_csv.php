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
header('Content-Description: File Transfer');
header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=' . $filename . '"');
header('Expires: 0');
header('cache-control: must-revalidate');
header('pragma: public');
header('Content-lenght: ' . filesize($filename));
readfile($filename);