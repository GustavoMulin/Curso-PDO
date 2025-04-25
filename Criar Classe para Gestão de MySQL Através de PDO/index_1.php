<?php

/*
Esta foi a estrutura que usámos durante os primeiros vídeos deste módulo.
*/

// dados de ligação
$database = 'udemy_loja_online';
$username = 'root';

// ligação
$ligacao = new PDO("mysql:host=localhost;dbname=$database", $username);