<?php

// OBTER DADOS EM DIFERENTES FORMATOS

/*
Uma nota final sobre esta matéria.
Existem outras formas de indicar ao PDO como deve devolver
os resultados. 
*/

$database = 'udemy_loja_online';
$username = 'root';

$ligacao = new PDO("mysql:host=localhost;dbname=$database", $username);
$resultado = $ligacao->query("SELECT * FROM produtos");
$resultado->setFetchMode(PDO::FETCH_ASSOC);

$ligacao = null;

while($linha = $resultado->fetch())
{
    echo $linha['produto'] . ' - Preço: ' . $linha['preco_unidade']. '<br>';
}